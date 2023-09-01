<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index(){
        $kategori = Kategori::all();

        return view('pages.kategori.index', ['halaman' => 'Kategori', 'link_to_create' => '/kategori/create', 'kategori' => $kategori]);
    }
}
