<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Maintenance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalApproveController extends Controller
{
    //

    public function index(Request $request){
        
        $jadwal = Jadwal::with(['maintenance', 'maintenance.mesin'])->where('status', 3)->get()->groupBy(['maintenance.mesin.nama_mesin', 'maintenance.nama_maintenance']);

        // $jadwal = collect($jadwal);

        
        //ddd(Carbon::getAvailableLocalesInfo());

        if($request->tanggal_awal||$request->tanggal_akhir){
            
            if($request->tanggal_awal && $request->tanggal_akhir){
                $tglawal = Carbon::parse($request->tanggal_awal, 7);
                $tglakhir = Carbon::parse($request->tanggal_akhir, 7);

                if($tglawal->greaterThan($tglakhir)){
                    return redirect()->back()->withErrors(['tanggal_lebih_besar' => 'Tanggal awal tidak boleh mendahului dari tanggal akhir']);
                }

            }else{                
                $tglawal = now(7)->subDays(30);
                $tglakhir = now(7);
                return redirect()->back()->withErrors(['salah_input' => 'Pastikan input tanggal yang anda masukkan benar!']);

            }

           
        }else{
            $tglawal = now(7)->subDays(30);
            $tglakhir = now(7);
        }


        return view('pages.jadwal.close_jadwal', 
        ['jadwal' => $jadwal, 
        'tglAwal' => $tglawal, 
        'tglAkhir' => $tglakhir]);

    }

    public function approve(Request $request){
        $data_valid = $request->validate([
            'jadwal_id' => 'required|numeric',
        ]);

        return redirect()->back()->with('approve', $data_valid['jadwal_id']);
    }


    public function approve_tetap(Request $request){
        $data_valid = $request->validate([
            'jadwal_id' => 'required|numeric',
        ]);

        Jadwal::find($data_valid['jadwal_id'])->increment('status');

        return redirect()->back()->with('approve_berhasil', 'p');
    }


    public function approve_ubah(Request $request){
        $data_valid = $request->validate([
            'jadwal_id' => 'required|numeric',
        ]);

        //logika reset jadwal disini

        $jd = Jadwal::find($data_valid['jadwal_id']);
        $maintenance_id = $jd->maintenance_id;
        //ddd($maintenance_id);

        //$jadwal = Jadwal::with('maintenance')->where('maintenance_id', 7)->where('status', 3)->orWhere('status', 4)->orderBy('tanggal_realisasi', 'DESC')->get();
        $jadwal = Jadwal::with('maintenance')->where('status', 3)->orWhere('status', 4)->where('maintenance_id', 7)->orderBy('tanggal_realisasi', 'DESC')->get();
        if($data_valid['jadwal_id'] == $jadwal[0]->id){

            if(Carbon::parse($jadwal[0]->tanggal_realisasi, 7)->lessThan(Carbon::parse($jadwal[0]->tanggal_rencana, 7))){
                $jadwal_terakhir = $jadwal[0]->tanggal_rencana;
            }else{
                $jadwal_terakhir = $jadwal[0]->tanggal_realisasi;
            }


            Jadwal::where('tanggal_rencana', '>' , $jadwal_terakhir)->where('maintenance_id', $maintenance_id)->forceDelete();

            $this->buat_jadwal($maintenance_id, $jadwal_terakhir);

            $jd->increment('status');


        }else{
            return redirect()->back()->withErrors(['reset_gagal' => 'Sudah tidak bisa mereset jadwal setelah tanggal ini, sudah terlambat!']);
        }

        //Jadwal::find($data_valid['jadwal_id'])->increment('status');

        return redirect()->back()->with('approve_berhasil', 'p');
    }

    private function buat_jadwal($id_maintenance, $start_date){

    
    $maintenance = Maintenance::find($id_maintenance);
    $tahun = Carbon::now()->year;
    
    $jadwalObj = new JadwalController();

    $waktu = Carbon::parse($start_date);
    //echo "Awalnya adalah " . $waktu->format('d-m-Y') . "<br>";

    $periode = $maintenance->periode;
    $satuan_periode = $maintenance->satuan_periode;
    

        switch ($satuan_periode) {
            case 'Jam':
                $waktu->addHour($periode);
                
                while($waktu->year === $tahun){
                    //echo $waktu->format('d-m-Y') . "<br>";
            
                    $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
    
                    $waktu->addHour($periode);
                }            
                break;
            case 'Hari':
                $waktu->addDays($periode);

                while($waktu->year === $tahun){
                    //echo $waktu->format('d-m-Y') . "<br>";
            
                    //Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);
                    $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
    
    
                    $waktu->addDays($periode);
                }            
                break;
    
            case 'Minggu':
                    $waktu->addWeeks($periode);

                    while($waktu->year === $tahun){
                        //echo $waktu->format('d-m-Y') . "<br>";
                
                        //Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);
                        $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
    
    
                        $waktu->addWeeks($periode);
                    }            
                break;
    
            case 'Bulan':
                    $waktu->addMonths($periode);

                    while($waktu->year === $tahun){
                        //echo $waktu->format('d-m-Y') . "<br>";
                
                        //Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);
                        $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
    
                        $waktu->addMonths($periode);
                    }            
                    break;
            
            case 'Tahun':
                $waktu->addYears($periode);

                while($waktu->year === $tahun){
                    //echo $waktu->format('d-m-Y') . "<br>";
            
                    //Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);
                    $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
    
                    $waktu->addYears($periode);
                }            
                break;
    
            default:
                # code...
                break;
        }


    }


}
