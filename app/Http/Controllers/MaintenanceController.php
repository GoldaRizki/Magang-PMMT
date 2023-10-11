<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Mesin;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\JadwalController;
use App\Models\Sparepart;

class MaintenanceController extends Controller
{
    //
    public function update(){
        
        $setup = collect(Cache::get('setup'));
        $mesin = collect(Cache::get('mesin'));


        $objectJadwal = new JadwalController();

        Mesin::find($mesin['id'])->update(['kategori_id' => $mesin['kategori_id']]);

        if(collect($mesin->get('maintenance'))->isNotEmpty()){
            Maintenance::where('mesin_id', $mesin->get('id'))->delete();
        }
            foreach($setup as $s){
                $maintenance = Maintenance::create([
                    'nama_maintenance' => $s->get('nama_setup'),
                    'mesin_id' => $mesin->get('id'),
                    'periode' => $s->get('periode'),
                    'satuan_periode' => $s->get('satuan_periode'),
                    'start_date' => Carbon::parse($s->get('start_date')),
                    'warna' => $s->get('warna')
                ]);
                foreach($s->get('setupForm') as $form){
                    Form::create([
                        'maintenance_id' => $maintenance['id'],
                        'nama_form' => $form->get('nama_setup_form'),
                        'syarat' => $form->get('syarat_setup_form'),
                    ]);
                }
                $objectJadwal->create_jadwal($maintenance->id);


            }
        
        return redirect('/mesin');

    }


    public function tampil_sparepart($id){
        $maintenance = Maintenance::with('sparepart')->where('mesin_id', $id)->get();

        $sparepart = Sparepart::all();
        //return ddd($maintenance);
        //ddd($maintenance);
        return view('pages.maintenance.sparepart', ['halaman' => 'Daftar Sparepart', 'maintenance' => $maintenance, 'sparepart' => $sparepart]);
        
    }

    public function tambah_sparepart(Request $request){
        $data_valid = $request->validate([
            'maintenance_id' => 'required|numeric',
            'sparepart_id' => 'required|numeric',
            'jumlah' => 'required|numeric',
        ]); 

        //pengecekan manual

        $sparepart = Maintenance::find($data_valid['maintenance_id'])->sparepart()->get();
        
        if($sparepart->where('id',$data_valid['sparepart_id'])->isNotEmpty()){
            return back()->withErrors(['sparepart' => 'Spareparts sudah ditambahkan, tidak perlu ditambahkan lagi']);
        }

        Maintenance::find($data_valid['maintenance_id'])->sparepart()->attach($data_valid['sparepart_id'], ['jumlah' => $data_valid['jumlah']]);

        return redirect()->back();  
    }


    public function hapus_sparepart(Request $request){
        $data_valid = $request->validate([
            'sparepart_id' => 'required|numeric',
            'maintenance_id' => 'required|numeric'
        ]);

        Maintenance::find($data_valid['maintenance_id'])->sparepart()->detach($data_valid['sparepart_id']);


        return redirect()->back();

    }

}
