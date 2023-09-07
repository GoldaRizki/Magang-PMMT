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
    

    public function create(Request $request){
        // nambahke

        $dataValid = $request->validate([
            'nama_ruang' => 'required',
            'no_ruang' => 'required',
            'bagian' => 'required'
        ]);

        Ruang::create($dataValid);

        return redirect('/ruang');
    }


    public function update(Request $request){
        $dataValid = $request->validate([
            'nama_ruang' => 'required',
            'no_ruang' => 'required',
            'bagian' => 'required'
        ]);

        Ruang::find($request->id)->update($dataValid);

        return redirect('/ruang');
    }

    public function destroy(Request $request){
        $dataValid = $request->validate([
            'id' => 'required|numeric',
        ]);

        Ruang::destroy($dataValid);

        return redirect('/ruang');
    }



}
