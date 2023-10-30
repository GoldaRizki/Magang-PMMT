<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalSparepartController extends Controller
{
    //

    public function tambah_sparepart(Request $request){
        $data_valid = $request->validate([
            'jadwal_id' => 'required|numeric',
            'sparepart_id' => 'required|numeric',
            'jumlah' => 'required|numeric',
        ]); 

        //pengecekan manual

        $sparepart = Jadwal::find($data_valid['jadwal_id'])->sparepart()->get();
        if($sparepart->where('id',$data_valid['sparepart_id'])->isNotEmpty()){
            return back()->withErrors(['sparepart' => 'Spareparts sudah ditambahkan, tidak perlu ditambahkan lagi']);
        }

        Jadwal::find($data_valid['jadwal_id'])->sparepart()->attach($data_valid['sparepart_id'], ['jumlah' => $data_valid['jumlah']]);

        return redirect()->back();  
    }

    public function hapus_sparepart(Request $request){
        $data_valid = $request->validate([
            'sparepart_id' => 'required|numeric',
            'jadwal_id' => 'required|numeric'
        ]);

        Jadwal::find($data_valid['jadwal_id'])->sparepart()->detach($data_valid['sparepart_id']);


        return redirect()->back();
    }

}
