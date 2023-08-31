<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    //
    public function index(){

    $mesin = Mesin::all();

    //return $mesin;  
    return view('pages.mesin.index', ['halaman' => 'Mesin', 'mesin' => $mesin, 'link_to_create' => '/mesin/create']);
    }


    public function create(){
    
        //dd("abdwjgakwd");
        return view('pages.mesin.create');
    }

    public function tambah(Request $request){
    
        Mesin::create([
            'nama_mesin' => $request->nama_mesin,
            'kategori_id' => $request->kategori_id,
            'spesifikasi' => $request->spesifikasi,
            'ruang_id' => $request->ruang_id
        ]);

        return redirect()->intended('/mesin');
    }

}
