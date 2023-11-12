<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mesin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalApproveController extends Controller
{
    //

    public function index(){
        
        $jadwal = Jadwal::with(['maintenance', 'maintenance.mesin'])->where('status', 3)->get()->groupBy(['maintenance.mesin.nama_mesin', 'maintenance.nama_maintenance']);

        // $jadwal = collect($jadwal);

        //ddd(Carbon::getAvailableLocalesInfo());

        $tglawal = now(7)->subDays(30);
        $tglakhir = now(7);

        return view('pages.jadwal.close_jadwal', 
        ['jadwal' => $jadwal, 
        'tglAwal' => $tglawal, 
        'tglAkhir' => $tglakhir]);

    }

    public function approve(Request $request){
        $data_valid = $request->validate([
            'jadwal_id' => 'required|numeric',
        ]);

        return redirect()->back()->with('approve', $data_valid['jadwal_id']);
    }


    public function approve_tetap(Request $request){
        $data_valid = $request->validate([
            'jadwal_id' => 'required|numeric',
        ]);

        Jadwal::find($data_valid['jadwal_id'])->increment('status');

        return redirect()->back()->with('approve_berhasil', 'p');
    }


    public function approve_ubah(Request $request){
        $data_valid = $request->validate([
            'jadwal_id' => 'required|numeric',
        ]);

        //logika reset jadwal disini
        $maintenance_id = Jadwal::find($data_valid['jadwal_id'])->maintenance_id;

        $jadwal = Jadwal::with('maintenance')->where('maintenance_id', $maintenance_id)->where('status', 3)->orderBy('tanggal_rencana', 'DESC')->get();
        
        if($data_valid['jadwal_id'] === $jadwal[0]->id){
            ddd('bener');
        }else{
            return redirect()->back()->withErrors(['reset_gagal' => 'Sudah tidak bisa mereset jadwal setelah tanggal ini, sudah terlambat!']);
        }

        //Jadwal::find($data_valid['jadwal_id'])->increment('status');

        return redirect()->back()->with('approve_berhasil', 'p');
    }

}
