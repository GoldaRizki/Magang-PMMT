<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    //

    public function index(){
        $ruang = Ruang::all();

        return view('pages.ruang.index', 
        ['ruang' => $ruang, 'halaman' => 'Ruang']);
    }
    
    public function create(){
        //halaman create

        
    
    }

    public function tambah(Request $request){
        // nambahke
        $dataValid = $request->validate([
        ]);

    }
}
