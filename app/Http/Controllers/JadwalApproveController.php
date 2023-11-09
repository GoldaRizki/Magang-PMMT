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

}
