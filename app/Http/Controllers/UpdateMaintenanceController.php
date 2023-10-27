<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Jadwal;
use App\Models\Mesin;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class UpdateMaintenanceController extends Controller
{
    public function create(Request $request){
        $mesin = Mesin::with(['maintenance', 'ruang', 'kategori', 'form'])->find($request->mesin_id);
        
        $setup = collect([]);  
        $attach = collect(['aksi' => 'tambah']);

        Cache::put('setup', $setup, now()->addMinutes(30));
        Cache::put('mesin', $mesin, now()->addMinutes(30));
        Cache::put('attach', $attach, now()->addMinutes(30));

        return redirect('/maintenance/form/pilih/');

    }

    public function edit(Request $request){

        $data_valid = $request->validate([
            'mesin_id' => 'required|numeric',
            'maintenance_id' => 'required|numeric'
        ]);

        $mesin = Mesin::with(['maintenance', 'ruang', 'kategori', 'form'])->find($data_valid['mesin_id']);

        $maintenance = Maintenance::find($data_valid['maintenance_id']);
        $setup = collect([$maintenance])->map(function($item){
               
            return collect([
               'nama_setup' => $item->nama_maintenance, 
               'periode' => $item->periode,
               'satuan_periode' => $item->satuan_periode,
               'start_date' => $item->start_date,
               'warna' => $item->warna,
               
               'setupForm' => $item->form->map(function($i) {
                   return collect([
                       'nama_setup_form' => $i->nama_form,
                       'syarat_setup_form' => $i->syarat,
                       'value' => $i->value,
                   ]);
                   }) 
           ]);
           });
           //ddd('aku rapopo');
           $attach = collect(['aksi' => 'edit', 'maintenance_id' => $data_valid['maintenance_id']]);

           Cache::put('attach', $attach, now()->addMinutes(30));
           Cache::put('setup', $setup, now()->addMinutes(30));
           Cache::put('mesin', $mesin, now()->addMinutes(30));
           return redirect('/maintenance/form/pilih/');

    }

    public function submit_create(){
        $setup = collect(Cache::pull('setup'));
        $mesin = collect(Cache::pull('mesin'));
        Cache::forget('attach');

        $objectJadwal = new JadwalController();


        
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
        
        return redirect('/jadwal/'.$mesin['id']);

    }


    public function submit_edit(){
        $setup = collect(Cache::pull('setup'));
        $mesin = collect(Cache::pull('mesin'));
        $attach = collect(Cache::pull('attach'));

        $objectJadwal = new JadwalController();

        
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

            $start_date = Carbon::parse($setup[0]->get('start_date'))->toDateTimeString();
            //ddd($start_date);
            Jadwal::where('maintenance_id', $attach['maintenance_id'])->where('tanggal_rencana', '>=', $start_date)->forceDelete();

            $jadwal = Jadwal::where('maintenance_id', $attach['maintenance_id'])->where('tanggal_rencana', '<', $start_date);
            $jadwal->increment('status', 20);

            Maintenance::destroy($attach['maintenance_id']);
            // DATA YANG SEBELUMNYA DILAKUKAN SOFT DELETE, TARUH LOGIKANNYA DISINI
            // SILAHKAN DITENTUKAN APAKAH DATA YANG SEBELUMNYA PERLU DITAMPILKAN ATAU TIDAK. 

            //$maintenance->forceDelete();


            return redirect('/jadwal/'.$mesin['id']);
            

    }


    public function delete(Request $request){

        

        $data_valid = $request->validate([
            'maintenance_id' => 'required|numeric',
            'mesin_id' => 'required|numeric'
        ]);


        Maintenance::destroy($data_valid['maintenance_id']);
        
        return redirect('/jadwal/'.$data_valid['mesin_id']);
    }
    



}
