<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    //
    public function index(Request $request){

        /*
        if($request->ajax()){
            
            $kategori = Kategori::query();
            return DataTables::of($kategori)
            ->addColumn('aksi', function($k){
                return view('partials.tombolAksiKategori', ['k' => $k]);
            })->addIndexColumn()
            ->toJson();

        }
        */  

        return view('pages.kategori.index', ['halaman' => 'Kategori']);
    }

    public function create(Request $request){
        
        $dataValid = $request->validate([
            'nama_kategori' => 'required|max:100|unique:kategoris'
        ]);

        Kategori::create($dataValid);

        return redirect('/kategori')->with('tambah', 'p');   
    }

    public function update(Request $request){
            
        $dataValid = $request->validate([
            'id' => 'required',
            'nama_kategori' => 'required|max:100|unique:kategoris'
        ]);

        Kategori::find($dataValid['id'])->update($dataValid);

        return redirect('/kategori')->with('edit', 'p');
    }

    public function destroy(Request $request){
        $dataValid = $request->validate([
                'id' => 'required'
            ]);

        Kategori::destroy($dataValid);

        return redirect('/kategori')->with('hapus', 'p');
    }

}
