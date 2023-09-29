<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SetupMesinController extends Controller
{
    //


    public function pilih_template($id){

        $mesin = Mesin::find($id);

        $kategori = Kategori::all();

        return view('pages.maintenance.select_template', ['mesin' => $mesin, 'kategori' => $kategori]);
    }

    public function tampil_template(Request $request){
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
                        'setup_maintenance_id' => $i->setup_maintenance_id,
                        'value' => $i->value,
                    ]);
                    }) 
            ]);
            });

 
            //dd($a->get('a'));
            Cache::put('setup', $setup, 60);


        return view('pages.maintenance.form');
    }
}
