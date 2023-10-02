<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MaintenanceController extends Controller
{
    //
    public function update(){
        
        $setup = collect(Cache::get('setup'));
        $mesin = collect(Cache::get('mesin'));

        if(collect($mesin->get('maintenance'))->isEmpty()){
            foreach($setup as $s){
                $maintenance = Maintenance::create([
                    'nama_maintenance' => $s->get('nama_setup'),
                    'mesin_id' => $mesin->get('id'),
                    'periode' => $s->get('periode'),
                    'satuan_periode' => $s->get('satuan_periode'),
                ]);
                foreach($s->get('setupForm') as $form){
                    Form::create([
                        'maintenance_id' => $maintenance['id'],
                        'nama_form' => $form->get('nama_setup_form')
                    ]);
                }
            }
        }else{
            Maintenance::where('mesin_id', $mesin->get('id'))->delete();

            foreach($setup as $s){
                $maintenance = Maintenance::create([
                    'nama_maintenance' => $s->get('nama_setup'),
                    'mesin_id' => $mesin->get('id'),
                    'periode' => $s->get('periode'),
                    'satuan_periode' => $s->get('satuan_periode'),
                ]);
                foreach($s->get('setupForm') as $form){
                    Form::create([
                        'maintenance_id' => $maintenance['id'],
                        'nama_form' => $form->get('nama_setup_form')
                    ]);
                }
            }
        }

        return redirect('/maintenance/form/pilih/');

        
    }
}
