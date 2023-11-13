<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\UpdateTahunan;
use Illuminate\Support\Carbon;

class UpdateDbController extends Controller
{
    //


    public function index(){
        $tahun_terakhir = UpdateTahunan::latest()->get()->first();
       
        return view('pages.updateTahunan.index', ['tahun_terakhir' => $tahun_terakhir]);
    }

    public function update_jadwal(){
        

        if(UpdateTahunan::where('tahun', now(7))->get()->isEmpty()){
            $maintenance = Maintenance::all();

            foreach ($maintenance as $m) {

                $jadwalObj = new JadwalController();

                $tahun = Carbon::now(7)->year;
    
                $jadwal_terakhir = $m->rencana_terakhir;
                $waktu = Carbon::parse($jadwal_terakhir->tanggal_rencana, 7);
                //echo "Awalnya adalah " . $waktu->format('d-m-Y') . "<br>";
                $id_maintenance = $m->id;
                $periode = $m->periode;
                $satuan_periode = $m->satuan_periode;
                //pengecekan kondisi apakah dia lebih dari 1 tahun atau tidak
                switch ($satuan_periode) {
                    case 'Jam':

                        $waktu = $waktu->addHours($periode);
                        if($waktu->year <= $tahun){

                            while($waktu->year <= $tahun){
                                //echo $waktu->format('d-m-Y') . "<br>";

                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                                $waktu->addHour($periode);

                            }            

                        }else{
                            $jadwal_tahunan = Carbon::parse($jadwal_terakhir->tanggal_rencana, 7);

                            if($jadwal_tahunan->year <= $tahun){
                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                            }

                        }
                               
                        break;
                    case 'Hari':
                            
                        $waktu = $waktu->addDays($periode);
                        if($waktu->year <= $tahun){

                            while($waktu->year <= $tahun){
                                //echo $waktu->format('d-m-Y') . "<br>";

                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                                $waktu->addDays($periode);

                            }            

                        }else{
                            $jadwal_tahunan = Carbon::parse($jadwal_terakhir->tanggal_rencana, 7);
                            
                            if($jadwal_tahunan->year <= $tahun){
                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                            }

                        }
                        break;
            
                    case 'Minggu':
                        $waktu = $waktu->addWeeks($periode);
                        if($waktu->year <= $tahun){

                            while($waktu->year <= $tahun){
                                //echo $waktu->format('d-m-Y') . "<br>";

                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                                $waktu->addWeeks($periode);

                            }            

                        }else{
                            $jadwal_tahunan = Carbon::parse($jadwal_terakhir->tanggal_rencana, 7);
                            
                            if($jadwal_tahunan->year <= $tahun){
                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                            }

                        }       
                        break;
            
                    case 'Bulan':
                        $waktu = $waktu->addMonths($periode);
                        if($waktu->year <= $tahun){

                            while($waktu->year <= $tahun){
                                //echo $waktu->format('d-m-Y') . "<br>";

                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                                $waktu->addMonths($periode);

                            }            

                        }else{
                            $jadwal_tahunan = Carbon::parse($jadwal_terakhir->tanggal_rencana, 7);
                            
                            if($jadwal_tahunan->year <= $tahun){
                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                            }

                        }      
                            break;
                    
                    case 'Tahun':
                        $waktu = $waktu->addYears($periode);
                        if($waktu->year <= $tahun){

                            while($waktu->year <= $tahun){
                                //echo $waktu->format('d-m-Y') . "<br>";

                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                                $waktu->addYears($periode);

                            }            

                        }else{
                            $jadwal_tahunan = Carbon::parse($jadwal_terakhir->tanggal_rencana, 7);
                            
                            if($jadwal_tahunan->year <= $tahun){
                                $jadwalObj->buat_jadwal_dan_isi_form($waktu, $id_maintenance);
                            }

                        }      
                        break;
                    }
                
            }

            // tambah data kalo sudah diupdate tahunan
            
            UpdateTahunan::create(['tahun' => now(7)->year]);
            

            return redirect('/update_tahunan')->with('berhasil_update','p');
        }else{
            return redirect('/update_tahunan')->withErrors(['pernah_update' => 'Sudah Pernah diupdate untuk tahun ini, tidak perlu update lagi']);
        }

    }


    
}
