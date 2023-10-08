<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class JadwalController extends Controller
{
    //
    function index() {
        //return view('jadwal', ['halaman' => 'Jadwal', 'link_to_create' => '/jadwal/create/']);
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

}
