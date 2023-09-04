<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Mesin;
use App\Models\Ruang;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    //
    public function index(){

    $mesin = Mesin::all();

    //return $mesin;  
    return view('pages.mesin.index', ['halaman' => 'Mesin',
     'mesin' => $mesin,
      'link_to_create' => '/mesin/create',
    
    ]);
    }


    public function create(){
    
        //dd("abdwjgakwd");
        return view('pages.mesin.create',
        [
            'ruang' => Ruang::all(),
            'kategori' => Kategori::all(),
            'halaman' => 'Mesin'
        ]
    );
    }

    public function tambah(Request $request){
    

        $validData = $request->validate([
            'nama_mesin' => 'required|max:255',
            'kategori_id' => 'required|numeric',
            'ruang_id' => 'required|numeric',
            'spesifikasi' => 'nullable'
        ]);


        Mesin::create($validData);

        return redirect()->intended('/mesin');
    }


    public function detail($id){

        $mesin = Mesin::findOrFail($id);
    
        return view('pages.mesin.detail', ['halaman' => 'Mesin', 'mesin' => $mesin]);
    }

}
