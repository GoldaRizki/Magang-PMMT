<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Mesin;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //

    public function laporan_general_inspection(Request $request){
    /*
        $data_valid = $request->validate([
            'mesin_id' => 'required|numeric', 
            'tanggal_awal' => 'required|date_format:d-m-Y',
            'tanggal_akhir' => 'required|date_format:d-m-Y',
        ]);
        */

        $maintenance = Maintenance::with(['jadwal' => function($query){
                        $query->where('tanggal_realisasi', '>=', '2023-8-20')->where('tanggal_realisasi', '<=', '2023-12-31');
        }, 'jadwal.isi_form', 'jadwal.isi_form.form'])->where('id', 5)->get();



        return ddd($maintenance);        
    }
    
}
