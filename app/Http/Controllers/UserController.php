<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    // dibuat tampilan view nya dulu

    public function login(){
        
        return view('pages.user.login');
    }


    public function logout(Request $request){
        
        
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');

    }


    public function masuk(Request $request){
        
        $data_valid = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data_valid)) {

            User::find(auth()->user()->id)->update(['last_login' => now('Asia/Bangkok')]);

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

    public function update_akun(Request $request){
        

        $data_valid = $request->validate([
            'id' => 'required|numeric',
            'username' => 'required',
            'nama' => 'required',
            'avatar' => 'image|file|max:1024'
        ]);


        if($request->avatar){
            //nek request dono avatar e
            $data_valid['foto'] = $request->file('avatar')->store('foto-profil');
            if(auth()->user()->foto !== null){
                Storage::delete(auth()->user()->foto);
            }

        }elseif($request->avatar_remove){
            // nek ora ono avatar dan ono permintaan dihapus

            Storage::delete(auth()->user()->foto);
            $data_valid['foto'] = null;
        }


       



        User::find($data_valid['id'])->update($data_valid);        

        return redirect('/akun');

    }



    public function ganti_password(Request $request){
   
        $data_valid = $request->validate([
            'id' => 'required|numeric'
        ]);

        if($request->password_baru){
            $data_valid['password'] = $request->password_lama;
            if(Auth::attempt($data_valid)){
                $data_valid['password'] = bcrypt($request->password_baru);
                User::find($data_valid['id'])->update($data_valid);        
                return $this->logout($request)->with(['ganti password' => 'Silahkan login dengan password yang baru']);
            }else{
                return redirect()->back()->withInput()->withErrors(['password_lama' => 'Pastikan password lamanya sesuai!']);
            }
        }else{
            return redirect()->back()->withInput()->withErrors(['password_baru' => 'Password baru tidak ada isinya!']);
        }
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

    public function edit($id){
        
        $user = User::find($id);

        return view('pages.user.edit', ['halaman' => 'User', 'user' => $user]);
    }


    public function update(Request $request){
        
        $data_valid = $request->validate([
            'id' => 'required|numeric',
            'username' => 'required',
            'nama' => 'required',
            'level' => 'required',

        ]);

        User::find($data_valid['id'])->update($data_valid);

        return redirect('/user/all')->with('edit', 'p');
    }

    public function delete(Request $request){
        
        $data_valid = $request->validate([
            'id' => 'required|numeric',
        ]);

        User::destroy($data_valid['id']);

        return redirect('/user/all')->with('hapus', 'p');

    }

}
