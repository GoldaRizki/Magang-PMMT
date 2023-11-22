<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\PDF;

use Illuminate\Support\Facades\Cache;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   /* public function _construct(){
        parent::__construct();  
    }*/

    public function index(){

        if(Auth::user()->level != 'Supervisor'){
            $terlambat = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->where('status', '<', 3)->where('tanggal_rencana', '<', now(7)->toDateString())->get()->sortBy('tanggal_rencana');
            $hari_ini = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->where('status', '<', 3)->where('tanggal_rencana', now(7)->toDateString())->get()->sortBy('tanggal_rencana');
            $seminggu = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->where('status', '<', 3)->where('tanggal_rencana', '>', now(7)->toDateString())->where('tanggal_rencana', '<=', now()->addDays(7)->toDateString())->get()->sortBy('tanggal_rencana');
            $sebulan = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->where('status', '<', 3)->where('tanggal_rencana', '>', now(7)->addDays(7)->toDateString())->where('tanggal_rencana', '<=', now()->addDays(30)->toDateString())->get()->sortBy('tanggal_rencana');
        }else{
            $user_id = Auth::user()->id;
            $terlambat = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->whereRelation('maintenance.mesin','user_id', $user_id)->where('status', '<', 3)->where('tanggal_rencana', '<', now(7)->toDateString())->get()->sortBy('tanggal_rencana');
            $hari_ini = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->whereRelation('maintenance.mesin','user_id', $user_id)->where('status', '<', 3)->where('tanggal_rencana', now(7)->toDateString())->get()->sortBy('tanggal_rencana');
            $seminggu = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->whereRelation('maintenance.mesin','user_id', $user_id)->where('status', '<', 3)->where('tanggal_rencana', '>', now(7)->toDateString())->where('tanggal_rencana', '<=', now()->addDays(7)->toDateString())->get()->sortBy('tanggal_rencana');
            $sebulan = Jadwal::with(['maintenance', 'maintenance.mesin', 'maintenance.mesin.ruang'])->whereRelation('maintenance.mesin','user_id', $user_id)->where('status', '<', 3)->where('tanggal_rencana', '>', now(7)->addDays(7)->toDateString())->where('tanggal_rencana', '<=', now(7)->addDays(30)->toDateString())->get()->sortBy('tanggal_rencana');
        }

        $jadwal_chart_rencana = Jadwal::whereYear('tanggal_rencana', now(7)->year)->get()->groupBy(function($val) {
            return Carbon::parse($val->tanggal_rencana)->month;
            })->sort()->map(function($item){
                return $item->count();
            });
        
        //ddd($jadwal_chart_rencana);    
        $jadwal_chart_realisasi = Jadwal::whereYear('tanggal_realisasi', now(7)->year)->where('status', '=', 4)->get()->groupBy(function($val) {
                return Carbon::parse($val->tanggal_rencana)->month;
            })->sort()->map(function($item){
                return $item->count();
            });


        return view('home', ['halaman' => 'Home',
         'chart_rencana' => $jadwal_chart_rencana,
         'chart_realisasi' => $jadwal_chart_realisasi,
         'terlambat' => $terlambat,
         'hari_ini' => $hari_ini,
         'seminggu' => $seminggu,
         'sebulan' => $sebulan,
        ]);

        
      
    }


    public function test(){
        
        return view('pages.jadwal.close_jadwal');

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
