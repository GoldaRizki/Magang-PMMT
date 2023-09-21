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
            'id' => $id,
            'halaman' => 'Setup Maintenance'
        ]);
        //return dd($setup);

    }

    private function create($request){
    
        $dataValid = $request->validate([
            'kategori_id' => 'required|numeric',
            'nama_setup_maintenance' => 'required',
            'periode' => 'required|numeric',
            'satuan_periode' => 'required',
        ]);


        SetupMaintenance::create($dataValid);

    }


    private function delete($request){
        
        $dataValid = $request->validate([
            'id' => 'required|numeric',
        ]);

        SetupMaintenance::destroy($dataValid);
    }

    private function edit($request){
        $dataValid = $request->validate([
            'id' => 'required|numeric',
            'nama_setup_maintenance' => 'required',
            'periode' => 'required|numeric',
            'satuan_periode' => 'required'
        ]);

        SetupMaintenance::find($dataValid['id'])->update($dataValid);
    }

    public function createPadaSetup(Request $request){
    
        $this->create($request);
        return redirect('/setupMaintenance/' . $request->kategori_id)->with('tambah', 'p');
    }

    public function hapusPadaSetup(Request $request){
        $this->delete($request);

        return redirect('/setupMaintenance/' . $request->kategori_id)->with('hapus', 'p');
    }

    public function editPadaSetup(Request $request){
        $this->edit($request);

        return redirect('/setupMaintenance/'. $request->kategori_id)->with('edit', 'p');
    }



    public function createPadaKategori(Request $request){
        $this->create($request);

        return redirect('/kategori')->with('tambah', 'p');
    }

    public function hapusPadaKategori(Request $request){
        $this->delete($request);

        return redirect('/kategori')->with('hapus', 'p');
    }


}
