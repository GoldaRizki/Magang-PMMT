<?php

namespace App\Http\Controllers;

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
        
        return view('test_page');

    }

    public function test2(Request $request){
        
        return $request;

    }
   
}
