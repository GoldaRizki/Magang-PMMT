<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index(){
        $kategori = Kategori::all();

        return view('pages.kategori.index', ['halaman' => 'Kategori', 'kategori' => $kategori]);
    }

    public function create(Request $request){
        
        $dataValid = $request->validate([
            'nama_kategori' => 'required|max:100|unique:kategoris'
        ]);

        Kategori::create($dataValid);

        return redirect('/kategori');   
    }

    public function update(Request $request){
            
        $dataValid = $request->validate([
            'id' => 'required',
            'nama_kategori' => 'required|max:100|unique:kategoris'
        ]);

        Kategori::find($dataValid['id'])->update($dataValid);

        return redirect('/kategori');
    }

    public function destroy(Request $request){
        $dataValid = $request->validate([
                'id' => 'required'
            ]);

        Kategori::destroy($dataValid);

        return redirect('/kategori');
    }

}
