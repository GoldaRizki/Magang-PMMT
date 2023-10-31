<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    // dibuat tampilan view nya dulu

    public function login(){
        
        return view('pages.user.login');
    }


    public function masuk(Request $request){
        
        $data_valid = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data_valid)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'login' => 'Login Gagal! Pastikan username dan password benar!',
        ]);
        
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


        return view('pages.user.index', ['halaman' => 'User', 'link_to_create' => '/user/create']);
    }


    public function create(){
        

        return view('pages.user.create', ['halaman' => 'User']);
    }

    public function store(Request $request){
        
        $data_valid = $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'level' => 'required',

        ]);

        User::create($data_valid);

        return redirect('/user/all')->with('tambah', 'p');
    }

    public function edit(){
        

        return view('pages.user.edit', ['halaman' => 'User']);
    }


    public function update(Request $request){
        


        return redirect('/user/all')->with('edit', 'p');
    }

    public function delete(Request $request){
        

    }

}
