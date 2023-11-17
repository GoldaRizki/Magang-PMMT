<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Form;
use App\Models\Jadwal;
use App\Models\IsiForm;
use App\Models\Maintenance;
use App\Models\Sparepart;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    //
    function index($id) {
        //return view('jadwal', ['halaman' => 'Jadwal', 'link_to_create' => '/jadwal/create/']);

        //id mesin
        $mesin = Mesin::find($id);
        ///ddd($mesin);
        /*
        $maintenance = Maintenance::with(['jadwal' => function($query) {
            $query->withTrashed();
        }])->where('mesin_id', $id)->withTrashed()->get();
        */

        $maintenance = Maintenance::with(['jadwal'])->where('mesin_id', $id)->withTrashed()->get();

        $maintenance2 = Maintenance::with(['jadwal' => function($query) {
            $query->withTrashed()->where('status', '>', 20);
        }])->where('mesin_id', $id)->withTrashed()->get();

        $maintenance = $maintenance->concat($maintenance2);


        //ddd($maintenance);
        //return view('pages.jadwal.index');
        return view('pages.jadwal.index', ['halaman' => 'Jadwal', 'maintenance' => $maintenance, 'mesin' => $mesin]);
    }

    public function create_jadwal($id_maintenance){
    

    $maintenance = Maintenance::find($id_maintenance);
    $tahun = Carbon::now()->year;
    

    $waktu = Carbon::parse($maintenance->start_date, 7);
    //echo "Awalnya adalah " . $waktu->format('d-m-Y') . "<br>";

    $periode = $maintenance->periode;
    $satuan_periode = $maintenance->satuan_periode;
    
    //echo "periode : " . $periode . " " . $satuan_periode . "<br>";

    switch ($satuan_periode) {
        case 'Jam':
            while($waktu->year === $tahun){
                //echo $waktu->format('d-m-Y') . "<br>";
        
                $this->buat_jadwal_dan_isi_form($waktu, $id_maintenance);

                $waktu->addHour($periode);
            }            
            break;
        case 'Hari':
            while($waktu->year === $tahun){
                //echo $waktu->format('d-m-Y') . "<br>";
        
                //Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);
                $this->buat_jadwal_dan_isi_form($waktu, $id_maintenance);


                $waktu->addDays($periode);
            }            
            break;

        case 'Minggu':
                while($waktu->year === $tahun){
                    //echo $waktu->format('d-m-Y') . "<br>";
            
                    //Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);
                    $this->buat_jadwal_dan_isi_form($waktu, $id_maintenance);


                    $waktu->addWeeks($periode);
                }            
            break;

        case 'Bulan':
                while($waktu->year === $tahun){
                    //echo $waktu->format('d-m-Y') . "<br>";
            
                    //Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);
                    $this->buat_jadwal_dan_isi_form($waktu, $id_maintenance);

                    $waktu->addMonths($periode);
                }            
                break;
        
        case 'Tahun':
            while($waktu->year === $tahun){
                //echo $waktu->format('d-m-Y') . "<br>";
        
                //Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);
                $this->buat_jadwal_dan_isi_form($waktu, $id_maintenance);

                $waktu->addYears($periode);
            }            
            break;

        default:
            # code...
            break;
    }

    
    //echo "<br>";
    //echo "Hasil akhir adalah " . $waktu->format('d-m-Y') . "<br>";

    //return redirect('/home');
    }


    public function buat_jadwal_dan_isi_form($waktu, $id_maintenance){
        $jadwal = Jadwal::create(['tanggal_rencana' => $waktu, 'maintenance_id' => $id_maintenance]);

        $form = Form::where('maintenance_id', $id_maintenance)->get();
        foreach ($form as $f) {
            IsiForm::create([
                'jadwal_id' => $jadwal->id,
                'form_id' => $f->id,
            ]);
        }
    }

    public function detail($id){
        $jadwal = Jadwal::withTrashed()->find($id);
        $maintenance = Maintenance::withTrashed()->find($jadwal->maintenance_id);
        $mesin = Mesin::find($maintenance->mesin_id);
        $sparepart = Sparepart::all();

        // ddd($jadwal);
        $isi_form = IsiForm::withTrashed()->with(['form' => function($query) {
            $query->withTrashed();
        }])->where('jadwal_id', $id)->get();

        return view('pages.jadwal.detail', ['halaman' => 'Jadwal', 'jadwal' => $jadwal, 'isi_form' => $isi_form, 'mesin' => $mesin, 'maintenance' => $maintenance, 'sparepart' => $sparepart]);
    }   


    public function update(Request $request){

        $data_valid = $request->validate([
            'id' => 'required|numeric',
            'tanggal_rencana' => 'required|date_format:d-m-Y',
            'tanggal_realisasi' => 'required|date_format:d-m-Y',
            'lama_pekerjaan' => 'required',
            'personel' => 'required',
            'keterangan' => 'nullable|not_regex:/\'/i',
        ]);

        $data_valid['tanggal_rencana'] = Carbon::parse($data_valid['tanggal_rencana']);
        $data_valid['tanggal_realisasi'] = Carbon::parse($data_valid['tanggal_realisasi']);
        $jadwal = Jadwal::find($data_valid['id']);

        if($data_valid['tanggal_realisasi']->greaterThan($data_valid['tanggal_rencana'])){
            // tampilkan modal juga boleh dengan di redirect back 
            //ddd($request);
            if($jadwal->tanggal_realisasi == null){
                return redirect()->back()->withInput()->with('form_alasan', 'p');
            }else{
                if($request->has('alasan')){
                    $data_valid['alasan'] = $request->alasan;
                }                
                return $this->submit($request, $data_valid);
            }
        }else{
            if($request->has('alasan')){
                $data_valid['alasan'] = $request->alasan;
            }
            return $this->submit($request, $data_valid);
        }

    }

    public function update_with_alasan(Request $request){

        $data_valid = $request->validate([
            'id' => 'required|numeric',
            'tanggal_rencana' => 'required|date_format:d-m-Y',
            'tanggal_realisasi' => 'required|date_format:d-m-Y',
            'lama_pekerjaan' => 'required',
            'personel' => 'required',
            'keterangan' => 'nullable|not_regex:/\'/i',
        ]);

        $validator = Validator::make($request->all(), [
            'alasan' => 'required'
        ]);


        if($validator->fails()){
            return redirect()->back()->withInput()->with('form_alasan', 'p')->withErrors(['alasan' => 'Alasan tidak boleh kosong!']);
        }

        $data_valid['alasan'] = $validator->validated()['alasan'];
        $data_valid['tanggal_rencana'] = Carbon::parse($data_valid['tanggal_rencana']);
        $data_valid['tanggal_realisasi'] = Carbon::parse($data_valid['tanggal_realisasi']);
        
        
        return $this->submit($request, $data_valid);

    }




    public function submit($request, $data_valid) {

        
        $jadwal = Jadwal::find($data_valid['id']);

       
        $jadwal->update($data_valid);

        if($jadwal->status == 1){
            $jadwal->increment('status');
        }

        if(isset($request->validasi)){
            $jadwal->increment('status');
        }


        if($request->has('isi_form')){
        foreach($request->isi_form as $key => $value){
            IsiForm::find($key)->update(['nilai' => $value]);
            }
        }

        return redirect('/jadwal/detail/' . $jadwal->id);
    }

}
