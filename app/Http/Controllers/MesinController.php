<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Mesin;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Cache;


class MesinController extends Controller
{
    //
    public function index(Request $request){

    

    if($request->ajax()){
        
        $mesin = Mesin::with(['kategori', 'ruang']);
        return DataTables::of($mesin)
        ->editColumn('nama_mesin', function($m){
            return '<a class="text-dark" href="/mesin/detail/' . $m->id . '">' . $m->nama_mesin . '</a>';
        })
        ->editColumn('kategori', function(Mesin $mesin){
            if(isset($mesin->kategori)){
                return $mesin->kategori->nama_kategori;
            }else{
                return "Tak Terkategori";
            }
        })
        ->editColumn('ruang', function(Mesin $mesin){
            return $mesin->ruang->nama_ruang;
        })
        ->addColumn('aksi', function($m){
            return view('partials.tombolAksiMesin', ['editPath' => '/mesin/edit/', 'id'=> $m->id, 'deletePath' => '/mesin/destroy/' ]);
        })
        ->rawColumns(['nama_mesin','aksi'])
        ->addIndexColumn()
        ->toJson();
    }

    //return $mesin;  
    return view('pages.mesin.index', ['halaman' => 'Mesin',
      'link_to_create' => '/mesin/create'
    
    ]);
    }


    public function create(){
    
        //dd("abdwjgakwd");
        return view('pages.mesin.create',
        [
            'ruang' => Ruang::all(),
            'halaman' => 'Mesin'
        ]
    );
    }

    public function tambah(Request $request){
    

        $validData = $request->validate([
            'nama_mesin' => 'required|max:255',
            'no_asset' => 'required|max:25',
            'ruang_id' => 'required|numeric',
            'spesifikasi' => 'nullable'
        ]);


        $m = Mesin::create($validData);

        //return redirect()->intended('/maintenance/form/pilih/')->with('tambah', 'p');
        $mesin = Mesin::with(['maintenance', 'ruang', 'kategori'])->find($m->id);

        $kategori = Kategori::all(); 
        Cache::put('mesin', $mesin, now()->addMinutes(30));
        return view('pages.maintenance.select_template', ['mesin' => $mesin, 'kategori' => $kategori]);
    }


    public function detail($id){

        $mesin = Mesin::findOrFail($id);
    
        return view('pages.mesin.detail', ['halaman' => 'Mesin', 'mesin' => $mesin]);
    }

    public function edit($id){
        
        $mesin = Mesin::with(['ruang'])->findOrFail($id);
        $ruang = Ruang::all();
        $kategori = Kategori::all();

        return view('pages.mesin.update', 
        ['halaman' => 'Mesin',
         'mesin' => $mesin,
         'kategori' => $kategori,
         'ruang' => $ruang
        ]);

    }


    public function update(Request $request){
        
        $dataValid = $request->validate([
            'id' => 'required|numeric',
            'nama_mesin' => 'required|max:255',
            'no_asset' => 'required|max:25',
            'ruang_id' => 'required|numeric',
            'spesifikasi' => 'nullable'
        ]);

        Mesin::find($dataValid['id'])->update($dataValid);

        return redirect('/mesin')->with('edit', 'p');
    }

    public function destroy(Request $request){
        
        $id = $request->validate([
            'id' => 'required|numeric'
        ]);

        Mesin::destroy($id);

        return redirect('/mesin')->with('hapus', 'p');

    }
}
