<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
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


        $terlambat = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->where('status', '<', 3)->where('tanggal_rencana', '<', now()->toDateString())->get();
        $hari_ini = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->where('status', '<', 3)->where('tanggal_rencana', now()->toDateString())->get();
        $seminggu = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->where('status', '<', 3)->where('tanggal_rencana', '>', now()->toDateString())->where('tanggal_rencana', '<=', now()->addDays(7)->toDateString())->get();
        $sebulan = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->where('status', '<', 3)->where('tanggal_rencana', '>', now()->addDays(7)->toDateString())->where('tanggal_rencana', '<=', now()->addDays(30)->toDateString())->get();


        return view('home', ['halaman' => 'Home',
         'terlambat' => $terlambat,
         'hari_ini' => $hari_ini,
         'seminggu' => $seminggu,
         'sebulan' => $sebulan,
        ]);
      
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


    public function test_laporan(){
        $jadwal = Jadwal::find(4);
        $mesin = $jadwal->maintenance->mesin;


        $data = ['mesin' => $mesin, 'jadwal' => $jadwal];

        //return view('reports.inspeksi', $data);
        
        $pdf = PDF::loadView('reports.inspeksi', $data);

        return $pdf->download('invoice.pdf');
    }



}
