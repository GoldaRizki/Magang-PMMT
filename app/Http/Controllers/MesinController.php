<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MesinController extends Controller
{
    //
    public function index(){
    return view('tabel', ['halaman' => 'Mesin']);
    }
}
