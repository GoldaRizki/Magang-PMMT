<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RuangController extends Controller
{
    //

    public function index(Request $request){
        if($request->ajax()){
            $ruang = Ruang::query();

            return DataTables::of($ruang)
            ->addColumn('aksi', function($r){
                return view('partials.tombolAksiRuang', ['r' => $r]);
            })
            ->rawColumns(['aksi'])
            ->addIndexColumn()
            ->toJson();
        }

        return view('pages.ruang.index', 
        ['halaman' => 'Ruang']);
    }
    

    public function create(Request $request){
        // nambahke

        $dataValid = $request->validate([
            'nama_ruang' => 'required',
            'no_ruang' => 'required',
            'bagian' => 'required'
        ]);

        Ruang::create($dataValid);

        return redirect('/ruang')->with('tambah', 'p');
    }


    public function update(Request $request){
        $dataValid = $request->validate([
            'nama_ruang' => 'required',
            'no_ruang' => 'required',
            'bagian' => 'required'
        ]);

        Ruang::find($request->id)->update($dataValid);

        return redirect('/ruang')->with('edit', 'p');
    }

    public function destroy(Request $request){
        $dataValid = $request->validate([
            'id' => 'required|numeric',
        ]);

        Ruang::destroy($dataValid);

        return redirect('/ruang')->with('hapus', 'p');
    }



}
