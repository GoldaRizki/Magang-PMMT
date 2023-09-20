<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SetupMaintenance;
use Illuminate\Http\Request;

class SetupMaintenanceController extends Controller
{
    //

    public function setup($id){
        
        
        $setup = Kategori::with(['setupMaintenance'])->find($id);
        $nama_kategori = $setup->nama_kategori;

        $setup = $setup->setupMaintenance()->get();

        return view('pages.setupMaintenance.setup', [
            'setup' => $setup,
            'nama_kategori' => $nama_kategori,
            'id' => $id
        ]);
        //return dd($setup);

    }

    public function create(Request $request){
    
        $dataValid = $request->validate([
            'kategori_id' => 'required|numeric',
            'nama_setup_maintenance' => 'required',
            'periode' => 'required|numeric',
            'satuan_periode' => 'required',
        ]);


        SetupMaintenance::create($dataValid);

        return redirect('/setupMaintenance/' . $dataValid['kategori_id'])->with('tambah', 'p');
    }
}
