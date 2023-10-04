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


    public function createPadaSetup(Request $request){
        $this->create($request);

        return redirect('/setupMaintenance/' . $request->kategori_id);
    }
    


}
