<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   /* public function _construct(){
        parent::__construct();  
    }*/

    public function index(){

        return view('home', ['halaman' => 'Home']);
      
    }


    public function test(Request $request){
        
        return $request;
        //return view('pages.mesin.detail');

    }


   
}
