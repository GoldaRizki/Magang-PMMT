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
}
