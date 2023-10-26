<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    // dibuat tampilan view nya dulu

    public function login(){
        
        

        return view('pages.user.login');
    }

    public function akun(){
        return view('pages.user.akun');
    }

    public function index(Request $request){
        
        //gawekke nganggo datatable ben penak

        if($request->ajax()){
            $user = User::query();

            return DataTables::of($user)  
            ->addColumn('aksi', function($u){
                return view('partials.tombolAksiUser', ['id'=> $u->id]);
            })
            ->rawColumns(['aksi'])
            ->addIndexColumn()
            ->toJson();
        }


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
