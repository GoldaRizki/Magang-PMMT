<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // dibuat tampilan view nya dulu

    public function login(){
        
        

        return view('pages.user.login');
    }

    public function index(){
        
        //gawekke nganggo datatable ben penak

        return view('pages.user.index');
    }


    public function create(){
        

        return view('pages.user.create', ['halaman' => 'User']);
    }

    public function edit(){
        
        return view('pages.user.edit', ['halaman' => 'User']);
    }

    public function delete(Request $request){
        

    }

}
