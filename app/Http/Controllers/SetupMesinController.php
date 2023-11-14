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


        $mesin = Mesin::with(['maintenance', 'ruang', 'kategori', 'form'])->find($data_valid['id']);


        if($mesin->maintenance->isNotEmpty()){
            // tampilkan semua maintenance mesin apa adanya disini.
            Cache::forget('attach');
            Cache::put('mesin', $mesin, now()->addMinutes(30));
            return redirect('/mesin/maintenance/' . $data_valid['id']);
            
            
        
            /*
            $setup = $mesin->maintenance->map(function($item){
               
                return collect([
                   'nama_setup' => $item->nama_maintenance, 
                   'periode' => $item->periode,
                   'satuan_periode' => $item->satuan_periode,
                   'start_date' => $item->start_date,
                   'warna' => $item->warna,
                   
                   'setupForm' => $item->form->map(function($i) {
                       return collect([
                           'nama_setup_form' => $i->nama_form,
                           'syarat_setup_form' => $i->syarat,
                           'value' => $i->value,
                       ]);
                       }) 
               ]);
               });
            
               Cache::put('setup', $setup, now()->addMinutes(30));
               Cache::put('mesin', $mesin, now()->addMinutes(30));
               */

            
        }else{
            Cache::put('mesin', $mesin, now()->addMinutes(30));
            return $this->aksi_pilih_template();
          
        
        }

    }

    public function ubah_template(){
        return $this->aksi_pilih_template();
    }


    private function aksi_pilih_template(){
       // $mesin = Mesin::with(['maintenance', 'ruang', 'kategori'])->find($Idmesin);
        $mesin = collect(Cache::get('mesin'));
        $kategori = Kategori::all(); 
        Cache::forget('attach');
        Cache::put('mesin', $mesin, now()->addMinutes(30));
        return view('pages.maintenance.select_template', ['mesin' => $mesin, 'kategori' => $kategori]);
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
                'start_date' => now()->format('d-m-Y'),
                'warna' => $item->warna,
           

                
                'setupForm' => $item->setupForm->map(function($i) {
                    return collect([
                        'nama_setup_form' => $i->nama_setup_form,
                        'syarat_setup_form' => $i->syarat,
                        'value' => $i->value,
                    ]);
                    }) 
            ]);
            });


            $mesin = collect(Cache::get('mesin'));
            $mesin['kategori_id'] = $data_valid['id'];

            $mesin['kategori'] = Kategori::find($data_valid['id'])->toArray();
            //dd($mesin);
            //dd($a->get('a'));
            Cache::forget('attach');
            Cache::put('setup', $setup, now()->addMinutes(30));
            Cache::put('mesin', $mesin, now()->addMinutes(30));


        return redirect('/maintenance/form/pilih/');
    }

    public function tampil_template() {

        $setup = collect(Cache::get('setup'));
        $mesin = collect(Cache::get('mesin'));
        $attach = collect(Cache::get('attach'));

        return view('pages.maintenance.form', ['setup' => $setup, 'mesin' => $mesin, 'attach' => $attach]);
    }

    public function create_maintenance(Request $request){
        
        $setup = collect(Cache::get('setup'));
        

        //dd($request);
        $data_valid = $request->validate([
            'nama_setup' => 'required',
            'periode' => 'required|numeric|min:1',
            'satuan_periode' => 'required',
            'start_date' => 'required|date_format:d-m-Y',
            'warna' => 'required'
        ]);


        $data_valid['setupForm'] = collect([]);

        $setup->push(collect($data_valid));


        $mesin = collect(Cache::get('mesin'));
        $attach = collect(Cache::get('attach'));

        Cache::put('attach', $attach, now()->addMinutes(30));
        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));

        return redirect('/maintenance/form/pilih/')->with('reminder', 'p');

    }


    public function edit_maintenance(Request $request){

        $setup = collect(Cache::get('setup'));

        $data_valid = collect($request->validate([
            'index' => 'required|numeric',
            'nama_setup' => 'required',
            'periode' => 'required|numeric|min:1',
            'satuan_periode' => 'required',
            'start_date' => 'required|date_format:d-m-Y',
            'warna' => 'required'
        ]));

        $index_maintenance = $data_valid['index'];

        $maintenance = $setup[$index_maintenance];

        $data_valid->forget('index');
        
        $maintenance = $maintenance->replace($data_valid);

        $setup[$index_maintenance] = $maintenance;
        
        $mesin = collect(Cache::get('mesin'));
        $attach = collect(Cache::get('attach'));

        Cache::put('attach', $attach, now()->addMinutes(30));
        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));

        return redirect('/maintenance/form/pilih/')->with('reminder', 'p');
    }

    public function delete_maintenance(Request $request){

        $setup = collect(Cache::get('setup'));

        $data_valid = $request->validate([
            'index' => 'required|numeric',
        ]);

        $setup = $setup->forget($data_valid['index'])->values();

        $mesin = collect(Cache::get('mesin'));
        $attach = collect(Cache::get('attach'));

        Cache::put('attach', $attach, now()->addMinutes(30));
        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));



        return redirect('/maintenance/form/pilih/')->with('reminder', 'p');
    }


    public function create_maintenance_form(Request $request){
        
        $setup = collect(Cache::get('setup'));

        $data_valid = $request->validate([
            'maintenance_index' => 'required|numeric',
            'nama_setup_form' => 'required',
            'syarat_setup_form' => 'required',
        ]);
        $setup[$data_valid['maintenance_index']]->get('setupForm')
        ->push(collect([
            'nama_setup_form' => $data_valid['nama_setup_form'], 
            'syarat_setup_form' => $data_valid['syarat_setup_form']
        ]));

        $mesin = collect(Cache::get('mesin'));

        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));        

        return redirect('/maintenance/form/pilih/')->with('reminder', 'p');

    }

    public function update_maintenance_form(Request $request){
    
        $setup = collect(Cache::get('setup'));

        $data_valid = $request->validate([
            'maintenance_index' => 'required|numeric',
            'form_index' => 'required|numeric',
            'nama_setup_form' => 'required',
            'syarat_setup_form' => 'required',
        ]);

        $form = $setup[$data_valid['maintenance_index']]->get('setupForm')[$data_valid['form_index']];
        
        $form = $form->replace(collect([
            'nama_setup_form' => $data_valid['nama_setup_form'],
            'syarat_setup_form' => $data_valid['syarat_setup_form']
        ])); 
        
        $setup[$data_valid['maintenance_index']]->get('setupForm')[$data_valid['form_index']] = $form;
        // dd($setup[$data_valid['maintenance_index']]->get('setupForm')[$data_valid['form_index']]->get('nama_setup_form'));
 
       $mesin = collect(Cache::get('mesin'));
       $attach = collect(Cache::get('attach'));

        Cache::put('attach', $attach, now()->addMinutes(30));    
        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));        
        return redirect('/maintenance/form/pilih/')->with('reminder', 'p');
        

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
        $attach = collect(Cache::get('attach'));

        Cache::put('attach', $attach, now()->addMinutes(30));
        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));        

        return redirect('/maintenance/form/pilih/')->with('reminder', 'p');
    }


    

}
