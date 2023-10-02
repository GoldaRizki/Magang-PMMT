<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SetupMesinController extends Controller
{
    //


    public function pilih_template(Request $request){

        $data_valid = $request->validate([
            'id' => 'required|numeric',
        ]);


        $mesin = Mesin::with(['maintenance'])->find($data_valid['id']);


        if($mesin->maintenance->isNotEmpty()){


            $setup = $mesin->maintenance->map(function($item){
                return collect([
                   'nama_setup' => $item->nama_maintenance, 
                   'periode' => $item->periode,
                   'satuan_periode' => $item->satuan_periode,
                   
                   'setupForm' => $item->form->map(function($i) {
                       return collect([
                           'nama_setup_form' => $i->nama_form,
                           'value' => $i->value,
                       ]);
                       }) 
               ]);
               });
            
               Cache::put('setup', $setup, now()->addMinutes(30));
               Cache::put('mesin', $mesin, now()->addMinutes(30));

               return redirect('/maintenance/form/pilih/');
            
        }else{
            
            $kategori = Kategori::all(); 
            Cache::put('mesin', $mesin, now()->addMinutes(30));

            return view('pages.maintenance.select_template', ['mesin' => $mesin, 'kategori' => $kategori]);
        
        }



    }

    public function ambil_template(Request $request){
        $data_valid = $request->validate([
            'id' => 'required|numeric',
        ]); 

        $setup = Kategori::with(['SetupMaintenance'])->find($data_valid['id'])->setupMaintenance;
        //$setup->forget(['id']);
        
        $setup = $setup->map(function($item){
             return collect([
                'nama_setup' => $item->nama_setup_maintenance, 
                'periode' => $item->periode,
                'satuan_periode' => $item->satuan_periode,
                
                'setupForm' => $item->setupForm->map(function($i) {
                    return collect([
                        'nama_setup_form' => $i->nama_setup_form,
                        'value' => $i->value,
                    ]);
                    }) 
            ]);
            });

 
            $mesin = collect(Cache::get('mesin'));
            //dd($a->get('a'));
            Cache::put('setup', $setup, now()->addMinutes(30));
            Cache::put('mesin', $mesin, now()->addMinutes(30));


        return redirect('/maintenance/form/pilih/');
    }

    public function tampil_template() {

        $setup = collect(Cache::get('setup'));
        $mesin = collect(Cache::get('mesin'));

        return view('pages.maintenance.form', ['setup' => $setup, 'mesin' => $mesin]);
    }

    public function create_maintenance(Request $request){
        
        $setup = collect(Cache::get('setup'));

        $data_valid = $request->validate([
            'nama_setup' => 'required',
            'periode' => 'required',
            'satuan_periode' => 'required'
        ]);

        $data_valid['setupForm'] = collect([]);

        $setup->push(collect($data_valid));


        $mesin = collect(Cache::get('mesin'));

        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));

        return redirect('/maintenance/form/pilih/');

    }


    public function edit_maintenance(Request $request){

        $setup = collect(Cache::get('setup'));

        $data_valid = collect($request->validate([
            'index' => 'required|numeric',
            'nama_setup' => 'required',
            'periode' => 'required',
            'satuan_periode' => 'required'
        ]));

        $index_maintenance = $data_valid['index'];

        $maintenance = $setup[$index_maintenance];

        $data_valid->forget('index');
        
        $maintenance = $maintenance->replace($data_valid);

        $setup[$index_maintenance] = $maintenance;
        
        $mesin = collect(Cache::get('mesin'));

        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));

        return redirect('/maintenance/form/pilih/');
    }

    public function delete_maintenance(Request $request){

        $setup = collect(Cache::get('setup'));

        $data_valid = $request->validate([
            'index' => 'required|numeric',
        ]);

        $setup = $setup->forget($data_valid['index'])->values();

        $mesin = collect(Cache::get('mesin'));

        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));



        return redirect('/maintenance/form/pilih/');
    }


    public function create_maintenance_form(Request $request){
        
        $setup = collect(Cache::get('setup'));

        $data_valid = $request->validate([
            'maintenance_index' => 'required|numeric',
            'nama_setup_form' => 'required',
        ]);
        $setup[$data_valid['maintenance_index']]->get('setupForm')->push(collect(['nama_setup_form' => $data_valid['nama_setup_form']]));

        $mesin = collect(Cache::get('mesin'));

        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));        

        return redirect('/maintenance/form/pilih/');

    }

    public function update_maintenance_form(Request $request){
    
        $setup = collect(Cache::get('setup'));

        $data_valid = $request->validate([
            'maintenance_index' => 'required|numeric',
            'form_index' => 'required|numeric',
            'nama_setup_form' => 'required',
        ]);

        $form = $setup[$data_valid['maintenance_index']]->get('setupForm')[$data_valid['form_index']];
        $form = $form->replace(collect(['nama_setup_form' => $data_valid['nama_setup_form']])); 
        $setup[$data_valid['maintenance_index']]->get('setupForm')[$data_valid['form_index']] = $form;
        // dd($setup[$data_valid['maintenance_index']]->get('setupForm')[$data_valid['form_index']]->get('nama_setup_form'));
 
       $mesin = collect(Cache::get('mesin'));

        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));        
        return redirect('/maintenance/form/pilih/');
        

    }
    
    public function delete_maintenance_form(Request $request){
        $setup = collect(Cache::get('setup'));

        $data_valid = $request->validate([
            'maintenance_index' => 'required|numeric',
            'form_index' => 'required|numeric',
        ]);

        $temp = $setup[$data_valid['maintenance_index']]->get('setupForm')->forget($data_valid['form_index']);
        $setup[$data_valid['maintenance_index']]['setupForm'] = $temp->values();



        $mesin = collect(Cache::get('mesin'));

        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));        

        return redirect('/maintenance/form/pilih/');
    }

}
