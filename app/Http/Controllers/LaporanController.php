<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Maintenance;
use App\Models\Mesin;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    //

    public function index(Request $request){

        if($request->ajax()){
            
            $maintenance = Maintenance::with(['mesin']);
    
            return DataTables::of($maintenance)
            ->addColumn('nama_mesin', function($m){
                return $m->mesin->nama_mesin;
            })
            ->addColumn('aksi', function($m){
                return view('partials.tombolDownloadLaporan', ['id' => $m->id]);
            })
            ->rawColumns(['aksi'])
            ->addIndexColumn()
            ->toJson();
        }
        //return $mesin;  
        return view('pages.laporan.index', ['halaman' => 'Laporan']);
        }

    public function laporan_general_inspection(Request $request){
    
        $data_valid = $request->validate([
            'maintenance_id' => 'required|numeric', 
            'tanggal_awal' => 'required|date_format:d-m-Y',
            'tanggal_akhir' => 'required|date_format:d-m-Y',
        ]);

        $tgl_awal = Carbon::parse($data_valid['tanggal_awal'], 7);
        $tgl_akhir = Carbon::parse($data_valid['tanggal_akhir'], 7);

        if($tgl_awal->greaterThan($tgl_akhir)){
            return back()->withErrors(['tanggal_error'=>'Tanggal awal tidak boleh mendahului tanggal akhir']);
        }

        $maintenance = Maintenance::with(['jadwal' => function($query) use ($tgl_awal, $tgl_akhir){
                        $query->where('tanggal_realisasi', '>=', $tgl_awal)->where('tanggal_realisasi', '<=', $tgl_akhir);
        }, 'jadwal.isi_form', 'form', 'jadwal.sparepart'])->find($data_valid['maintenance_id']);

        $mesin = Mesin::find($maintenance->mesin_id);

       // return $maintenance->toArray();
       //return view('pages.laporan.inspeksi', ['maintenance' => $maintenance, 'mesin' => $mesin]);
        
        $pdf = PDF::loadView('pages.laporan.inspeksi', ['maintenance' => $maintenance, 'mesin' => $mesin, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir])->setPaper('a4', 'potrait')->setWarnings(false);

        return $pdf->download('Inspeksi_' . $mesin->nama_mesin .'_' . $data_valid['tanggal_awal'] .'_' . $data_valid['tanggal_akhir'] .'.pdf');
    }

    public function laporan_rencana_realisasi(){
        

        $awal = now(7)->isoWeek(1)->startOfWeek();
        $akhir = $awal->copy()->endOfWeek();

        $mesin = Mesin::with(['maintenance', 'maintenance.jadwal'=>function($query){
                $query->whereYear('tanggal_rencana', now(7)->year)->orWhereYear('tanggal_realisasi', now(7)->year);
        }])->get();

        

        $data = [
            'awal' => $awal,
            'akhir' => $akhir,
            'mesin' => $mesin
        ];

        //return view('pages.laporan.rencana_dan_realisasi', $data);
        $pdf = PDF::loadView('pages.laporan.rencana_dan_realisasi', $data)->setPaper('a3', 'landscape')->setWarnings(false);

        return $pdf->download('Laporan Rencana dan Realisasi Tahun '. now(7)->year .'.pdf');
    }


    public function laporan_maintenance(Request $request){
        
        $data_valid = $request->validate([
            'jadwal_id' => 'required|numeric'
        ]);


        $jadwal = Jadwal::with(['sparepart', 'maintenance' =>function($query){
            $query->withTrashed();
        }, 'maintenance.mesin' => function($query){
            $query->withTrashed();
        }, 'maintenance.mesin.ruang' => function($query){
            $query->withTrashed();
        }])->withTrashed()->find($data_valid['jadwal_id']);
        

        //return $jadwal->toArray();

        $data = [
            'jadwal' => $jadwal,
        ];

        //return view('pages.laporan.maintenance', $data);
        $pdf = PDF::loadView('pages.laporan.maintenance', $data)->setPaper('a4', 'potrait')->setWarnings(false);

        return $pdf->download('laporan_maintenance_' . $jadwal->maintenance->mesin->nama_mesin . '_'. $jadwal->maintenance->nama_maintenance .'.pdf');
    }
    
}
