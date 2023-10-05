<?php

namespace App\Http\Controllers;

use App\Models\SetupForm;
use Illuminate\Http\Request;

class SetupFormController extends Controller
{
    //
    private function create($request){
        $data_valid = $request->validate([
            'setup_maintenance_id' => 'required|numeric',
            'nama_setup_form' => 'required',
            'syarat' => 'required'
        ]);

        SetupForm::create($data_valid);


    }


    private function edit($request){
        $data_valid = $request->validate([
            'id' => 'required|numeric',
            'nama_setup_form' => 'required',
            'syarat' => 'required'
        ]);

        SetupForm::find($data_valid['id'])->update($data_valid);
    }

    private function delete($request){
        $data_valid = $request->validate([
            'id' => 'required|numeric',
        ]);

        SetupForm::destroy($data_valid['id']);

    }


    public function createPadaSetup(Request $request){
        $this->create($request);

        return redirect('/setupMaintenance/' . $request->kategori_id)->with('tambah', 'p');
    }
    

    public function editPadaSetup(Request $request){
        $this->edit($request);

        return redirect('/setupMaintenance/' . $request->kategori_id)->with('edit', 'p');
    }

    public function createPadaKategori(Request $request){
        $this->create($request);

        return redirect('/kategori')->with('tambah', 'p');
    }

    public function editPadaKategori(Request $request){
        $this->edit($request);

        return redirect('/kategori')->with('edit', 'p');
    }

    public function deletePadaKategori(Request $request){
        $this->delete($request);

        return redirect('/kategori')->with('hapus', 'p');
    }

    public function deletePadaSetup(Request $request){
        $this->delete($request);

        return redirect('/setupMaintenance/' . $request->kategori_id)->with('hapus', 'p');
    }
}
