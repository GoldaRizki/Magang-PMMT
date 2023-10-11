<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SparepartController extends Controller
{
    //
    public function index(Request $request){
        
        if($request->ajax()){
            
            $parts = Sparepart::query();
            return DataTables::of($parts)

            ->addColumn('aksi', function($p){
                return view('partials.tombolAksi', ['editPath' => '/sparepart/edit/', 'id'=> $p->id, 'deletePath' => '/sparepart/destroy/' ]);
            })
            ->rawColumns(['aksi'])
            ->toJson();

        }


        return view('pages.spareparts.index', [
            'halaman' => 'Spareparts',
            'link_to_create' => '/sparepart/create'       
            
        ]);
        
    }

    public function create(){
        

        return view('pages.spareparts.create', [
            'halaman' => 'Spareparts'
        ]);
    }

    public function tambah(Request $request){
        
        $dataValid = $request->validate([
            'id' => 'required|numeric|unique:spareparts,id',
            'nama_sparepart' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'satuan' => 'required'
        ]);

        Sparepart::create($dataValid);

        return redirect('/sparepart')->with('tambah', 'p');
    }


    public function edit($id){
    
        $sparepart = Sparepart::findOrFail($id);


        return view('pages.spareparts.update', [
            'halaman' => 'Spareparts',
            'sparepart' => $sparepart
        ]);


    }


    public function update(Request $request){
    
        $dataValid = $request->validate([
            'id' => 'required|numeric|unique:spareparts,id',
            'nama_sparepart' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'satuan' => 'required'
        ]);

        Sparepart::findOrFail($request->id_old)->update($dataValid);

        return redirect('/sparepart')->with('edit', 'p');
        
    }

    public function destroy(Request $request){  
        $dataValid = $request->validate([
            'id' => 'required|numeric',
        ]);

        Sparepart::destroy($dataValid);

        return redirect('/sparepart')->with('hapus', 'p');
    }

}
