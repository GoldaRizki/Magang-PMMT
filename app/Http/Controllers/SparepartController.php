<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    //
    public function index(){
        
        $parts = Sparepart::all();


        return view('pages.spareparts.index', [
            'halaman' => 'Spareparts',
            'spareparts' => $parts
        ]);
        
    }
}
