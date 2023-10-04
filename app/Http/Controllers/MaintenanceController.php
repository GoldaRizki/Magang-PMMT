<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Form;
use App\Models\Mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class MaintenanceController extends Controller
{
    //
    public function update(){
        
        $setup = collect(Cache::get('setup'));
        $mesin = collect(Cache::get('mesin'));

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
            }
        
        

        return redirect('/mesin');

        
    }
}
