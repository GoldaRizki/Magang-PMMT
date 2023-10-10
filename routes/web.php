<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SetupFormController;
use App\Http\Controllers\SetupMaintenanceController;
use App\Http\Controllers\SetupMesinController;
use App\Http\Controllers\SparepartController;
use App\Models\Maintenance;
use App\Models\SetupMaintenance;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/jadwal', [JadwalController::class, 'index']);


Route::get('/mesin', [MesinController::class, 'index']);
Route::get('/mesin/create', [MesinController::class, 'create']);
Route::post('/mesin/create', [MesinController::class, 'tambah']);
Route::get('/mesin/detail/{id}', [MesinController::class, 'detail']);
Route::get('/mesin/edit/{id}', [MesinController::class, 'edit']);

Route::put('/mesin/update', [MesinController::class, 'update']);
Route::delete('/mesin/destroy', [MesinController::class, 'destroy']);




Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/create', [KategoriController::class, 'create']);
Route::put('/kategori/update', [KategoriController::class, 'updateOnKategori']);
Route::delete('/kategori/destroy', [KategoriController::class, 'destroy']);

Route::post('/kategori/setupMaintenance/create', [SetupMaintenanceController::class, 'createPadaKategori']);
Route::put('/kategori/setupMaintenance/edit', [SetupMaintenanceController::class, 'editPadaKategori']);
Route::delete('/kategori/setupMaintenance/destroy', [SetupMaintenanceController::class, 'hapusPadaKategori']);


Route::get('/setupMaintenance/{id}', [SetupMaintenanceController::class, 'setup']);
Route::post('/setupMaintenance/create', [SetupMaintenanceController::class, 'createPadaSetup']);
Route::put('/setupMaintenance/edit', [SetupMaintenanceController::class, 'editPadaSetup']);
Route::delete('/setupMaintenance/destroy', [SetupMaintenanceController::class, 'hapusPadaSetup']);
Route::put('/setupMaintenance/kategori/update', [KategoriController::class, 'updateOnSetup']);


Route::post('/setupForm/create/', [SetupFormController::class, 'createPadaSetup']);
Route::put('/setupForm/edit/', [SetupFormController::class, 'editPadaSetup']);
Route::delete('/setupForm/delete/', [SetupFormController::class, 'deletePadaSetup']);

Route::post('/kategori/setupForm/create/', [SetupFormController::class, 'createPadaKategori']);
Route::put('/kategori/setupForm/edit/', [SetupFormController::class, 'editPadaKategori']);
Route::delete('/kategori/setupForm/delete/', [SetupFormController::class, 'deletePadaKategori']);

Route::get('/ruang', [RuangController::class, 'index']);
Route::post('/ruang/create', [RuangController::class, 'create']);
Route::put('/ruang/update', [RuangController::class, 'update']);
Route::delete('/ruang/destroy', [RuangController::class, 'destroy']);



Route::post('/maintenance/form/pilih/', [SetupMesinController::class, 'pilih_template']);
Route::post('/maintenance/form/pilih/kirim/', [SetupMesinController::class, 'ambil_template']);
Route::get('/maintenance/form/pilih/', [SetupMesinController::class, 'tampil_template']);

Route::post('/maintenance/ubah_template/', [SetupMesinController::class, 'ubah_template']);

Route::post('/maintenance/create/', [SetupMesinController::class, 'create_maintenance']);
Route::post('/maintenance/edit/', [SetupMesinController::class, 'edit_maintenance']);
Route::post('/maintenance/delete/', [SetupMesinController::class, 'delete_maintenance']);

Route::put('/maintenance/submit/', [MaintenanceController::class, 'update']);

Route::post('/maintenance/form/create/', [SetupMesinController::class, 'create_maintenance_form']);
Route::post('/maintenance/form/update/', [SetupMesinController::class, 'update_maintenance_form']);
Route::post('/maintenance/form/delete/', [SetupMesinController::class, 'delete_maintenance_form']);




Route::get('/sparepart', [SparepartController::class, 'index']);
Route::get('/sparepart/create', [SparepartController::class, 'create']);
Route::post('/sparepart/create', [SparepartController::class, 'tambah']);
Route::get('/sparepart/edit/{id}', [SparepartController::class, 'edit']);
Route::put('/sparepart/update', [SparepartController::class, 'update']);
Route::delete('/sparepart/destroy', [SparepartController::class, 'destroy']);    

Route::get('/sparepart/maintenance/{id}', [MaintenanceController::class, 'tampil_sparepart']);
Route::post('/sparepart/maintenance/', [MaintenanceController::class, 'tambah_sparepart']);
Route::delete('/sparepart/maintenance/delete/', [MaintenanceController::class, 'hapus_sparepart']);


Route::get('/jadwal/{id}', [JadwalController::class, 'index']);
Route::get('/jadwal/detail/{id}', [JadwalController::class, 'detail']);
Route::put('/jadwal/update/', [JadwalController::class, 'update']);




Route::get('/test', [HomeController::class, 'test']);
Route::post('/test', [HomeController::class, 'test2']);
Route::get('/test_load', [SetupMesinController::class, 'select_template']);
Route::get('/test/calendar', [HomeController::class, 'tes_kalender']);

Route::get('/test/jadwal/{id}', function($id){


    // Ngoprek Membuat Logika buat jadwal

    // bootstrap-year-calendar (refrensi library)
    $maintenance = Maintenance::find($id);
    //$maintenance = Maintenance::all();
    //dd($maintenance);
    $tahun = 2023;
    

    $waktu = Carbon::parse($maintenance->start_date);
    echo "Awalnya adalah " . $waktu->format('d-m-Y') . "<br>";

    $periode = $maintenance->periode;
    $satuan_periode = $maintenance->satuan_periode;
    
    echo "periode : " . $periode . " " . $satuan_periode . "<br>";

    switch ($satuan_periode) {
        case 'Jam':
            while($waktu->year === $tahun){
                echo $waktu->format('d-m-Y') . "<br>";
        
                $waktu->addHour($periode);
            }            
            break;
        case 'Hari':
            while($waktu->year === $tahun){
                echo $waktu->format('d-m-Y') . "<br>";
        
                $waktu->addDays($periode);
            }            
            break;

        case 'Minggu':
                while($waktu->year === $tahun){
                    echo $waktu->format('d-m-Y') . "<br>";
            
                    $waktu->addWeeks($periode);
                }            
            break;

        case 'Bulan':
                while($waktu->year === $tahun){
                    echo $waktu->format('d-m-Y') . "<br>";
            
                    $waktu->addMonths($periode);
                }            
                break;
        
        case 'Tahun':
            while($waktu->year === $tahun){
                echo $waktu->format('d-m-Y') . "<br>";
        
                $waktu->addYears($periode);
            }            
            break;

        default:
            # code...
            break;
    }

    
    echo "<br>";
    echo "Hasil akhir adalah " . $waktu->format('d-m-Y') . "<br>";

    //return redirect('/home');
});