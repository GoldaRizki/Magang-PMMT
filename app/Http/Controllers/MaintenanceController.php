<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Mesin;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\JadwalController;
use App\Models\Sparepart;

class MaintenanceController extends Controller
{
    //
    public function update(){
        
        $setup = collect(Cache::pull('setup'));
        $mesin = collect(Cache::pull('mesin'));


        $objectJadwal = new JadwalController();

        Mesin::find($mesin['id'])->update(['kategori_id' => $mesin['kategori_id']]);

        if(collect($mesin->get('maintenance'))->isNotEmpty()){
            Maintenance::where('mesin_id', $mesin->get('id'))->delete();
        }
            foreach($setup as $s){
                $maintenance = Maintenance::create([
                    'nama_maintenance' => $s->get('nama_setup'),
                    'mesin_id' => $mesin->get('id'),
                    'periode' => $s->get('periode'),
                    'satuan_periode' => $s->get('satuan_periode'),
                    'start_date' => Carbon::parse($s->get('start_date')),
                    'warna' => $s->get('warna')
                ]);
                foreach($s->get('setupForm') as $form){
                    Form::create([
                        'maintenance_id' => $maintenance['id'],
                        'nama_form' => $form->get('nama_setup_form'),
                        'syarat' => $form->get('syarat_setup_form'),
                    ]);
                }
                $objectJadwal->create_jadwal($maintenance->id);


            }
        
        return redirect('/jadwal/'. $mesin['id']);

    }


  


   



    public function maintenance_mesin($id){

        $mesin = Mesin::with(['maintenance', 'ruang', 'kategori', 'form'])->find($id);

        $maintenance = $mesin->maintenance;
        $form = $mesin->form;


        return view('pages.maintenance.maintenance', [
            'halaman' => 'Maintenace',
            'mesin' => $mesin,
            'maintenance' => $maintenance,
            'form' => $form
           ]);
    }


    public function maintenance_add(Request $request){
        //maintenance ditambahkan bersama form nya
        
        $objectJadwal = new JadwalController();
    
        $data_valid = $request->validate([
            'mesin_id' => 'required|numeric',
            'nama_maintenance' => 'required',
            'periode' => 'required|numeric',
            'satuan_periode' => 'required',
            'start_date' => 'required|date_format:d-m-Y',
            'warna' => 'required'
        ]);


        $data_valid['start_date'] = Carbon::parse($data_valid['start_date']);

        $maintenance = Maintenance::create($data_valid);

        $objectJadwal->create_jadwal($maintenance->id);

    }



}
