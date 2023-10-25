<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;

use Illuminate\Support\Facades\Cache;
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
        
        return view('test_page.test_page');

    }

    public function test2(Request $request){
        
        return $request;

    }
   
    public function load_test(){
        

//dd($collection);

        $setup = Kategori::with(['SetupMaintenance'])->find(1)->setupMaintenance;
        //$setup->forget(['id']);
        
        $setup = $setup->map(function($item){
             return collect([
                'nama_setup' => $item->nama_setup_maintenance, 
                'periode' => $item->periode,
                'satuan_periode' => $item->satuan_periode,
                
                'setupForm' => $item->setupForm->map(function($i) {
                    return collect([
                        'nama_setup_form' => $i->nama_setup_form,
                        'setup_maintenance_id' => $i->setup_maintenance_id,
                        'value' => $i->value,
                    ]);
                    }) 
            ]);
            });

 
            //dd($a->get('a'));
            Cache::put('setup', $setup, 60);
          

        //$maintenance = new Maintenance($setup->toArray());
        //dd($maintenance);
       // dd($kategori);
        return view('test_page.load_setup');
    }

    public function tes_kalender(){
        return view('test_page.test_calendar');
    }

    public function test_pdf(){


        $data = [
            'title' => 'Ya ndak tau kok tanya saia',
            'date' => 56575675,
        ];
          
        $pdf = PDF::loadView('test_page.test_for_pdf', $data);

        return $pdf->download('invoice.pdf');
    }
}
