<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class JadwalController extends Controller
{
    //
    function index($id) {
        //return view('jadwal', ['halaman' => 'Jadwal', 'link_to_create' => '/jadwal/create/']);

        //id mesin
        $maintenance = Maintenance::with(['jadwal'])->where('mesin_id', $id)->get();
        
       // ddd($maintenance->jadwal);
        //return view('pages.jadwal.index');
        return view('pages.jadwal.index', ['halaman' => 'Jadwal', 'maintenance' => $maintenance]);
    }

    public function create_jadwal($id_maintenance){
    

    $maintenance = Maintenance::find($id_maintenance);
    $tahun = Carbon::now()->year;
    

    $waktu = Carbon::parse($maintenance->start_date);
    //echo "Awalnya adalah " . $waktu->format('d-m-Y') . "<br>";

    $periode = $maintenance->periode;
    $satuan_periode = $maintenance->satuan_periode;
    
    //echo "periode : " . $periode . " " . $satuan_periode . "<br>";

    switch ($satuan_periode) {
        case 'Jam':
            while($waktu->year === $tahun){
                //echo $waktu->format('d-m-Y') . "<br>";
        
                Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);

                $waktu->addHour($periode);
            }            
            break;
        case 'Hari':
            while($waktu->year === $tahun){
                //echo $waktu->format('d-m-Y') . "<br>";
        
                Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);


                $waktu->addDays($periode);
            }            
            break;

        case 'Minggu':
                while($waktu->year === $tahun){
                    //echo $waktu->format('d-m-Y') . "<br>";
            
                    Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);

                    $waktu->addWeeks($periode);
                }            
            break;

        case 'Bulan':
                while($waktu->year === $tahun){
                    //echo $waktu->format('d-m-Y') . "<br>";
            
                    Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);
                
                    $waktu->addMonths($periode);
                }            
                break;
        
        case 'Tahun':
            while($waktu->year === $tahun){
                //echo $waktu->format('d-m-Y') . "<br>";
        
                Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);

                $waktu->addYears($periode);
            }            
            break;

        default:
            # code...
            break;
    }

    
    //echo "<br>";
    //echo "Hasil akhir adalah " . $waktu->format('d-m-Y') . "<br>";

    //return redirect('/home');
    }


    public function detail($id){
        $jadwal = Jadwal::find($id);
       // ddd($jadwal);

        return view('pages.jadwal.detail', ['halaman' => 'Jadwal', 'jadwal' => $jadwal]);
    }   


    public function update(Request $request) {

        $data_valid = $request->validate([
            'id' => 'required|numeric',
            'tanggal_rencana' => 'required|date_format:d-m-Y',
            'tanggal_realisasi' => 'required|date_format:d-m-Y',
            'keterangan' => 'nullable',
            'konfirmasi' => 'nullable'
        ]);

        $jadwal = Jadwal::find($data_valid['id']);

        $data_valid['tanggal_rencana'] = Carbon::parse($data_valid['tanggal_rencana']);
        $data_valid['tanggal_realisasi'] = Carbon::parse($data_valid['tanggal_realisasi']);

        $jadwal->update($data_valid);

        return redirect('/jadwal/' . $jadwal->maintenance->mesin_id);
    }

}
