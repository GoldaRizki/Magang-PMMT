<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Maintenance;
use App\Models\SetupMaintenance;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   /* public function _construct(){
        parent::__construct();  
    }*/

    public function index(){

        return view('home', ['halaman' => 'Home']);
      
    }


    public function test(){
        
        return view('test_page.tray_layout');

    }

    public function test2(Request $request){
        
        return $request;

    }
   
    public function load_test(){
        
        $setup = Kategori::with(['SetupMaintenance'])->find(1)->get();
        $setup->forget(['id']);
        dd($setup->flatten()->toArray());
        $maintenance = new Maintenance($setup->toArray());
        dd($maintenance);
       // dd($kategori);
        return view('test_page.load_setup')->with('setup',$setup);

    }
}
