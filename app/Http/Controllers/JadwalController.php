<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    //
    function index() {
        return view('jadwal', ['halaman' => 'Jadwal']);
    }

}
