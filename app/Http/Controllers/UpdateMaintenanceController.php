<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;
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

    public function edit(){
        
    }
}
