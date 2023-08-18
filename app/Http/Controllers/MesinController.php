<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    //
    public function index(){

    $mesin = Mesin::all();

    //return $mesin;  
    return view('mesin', ['halaman' => 'Mesin', 'mesin' => $mesin ]);
    }
}
