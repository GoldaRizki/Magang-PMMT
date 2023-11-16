<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalApproveController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalSparepartController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SetupFormController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\SetupMesinController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\SetupMaintenanceController;
use App\Http\Controllers\UpdateDbController;
use App\Http\Controllers\UpdateMaintenanceController;
use App\Http\Controllers\UserController;

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

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::post('/masuk', [UserController::class, 'masuk']);

Route::get('/akun', [UserController::class, 'akun'])->middleware('auth');
Route::put('/user/akun/update/', [UserController::class, 'update_akun'])->middleware('auth');
Route::put('/user/akun/update/password/', [UserController::class, 'ganti_password'])->middleware('auth');



Route::get('/user/all/', [UserController::class, 'index'])->middleware('superuser');
Route::get('/user/create/', [UserController::class, 'create']);
Route::post('/user/store/', [UserController::class, 'store']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::put('/user/update/', [UserController::class, 'update']);
Route::delete('/user/delete/', [UserController::class, 'delete']);



Route::get('/mesin', [MesinController::class, 'index']);
Route::get('/mesin/create', [MesinController::class, 'create']);
Route::post('/mesin/create', [MesinController::class, 'tambah']);
Route::get('/mesin/detail/{id}', [MesinController::class, 'detail']);
Route::get('/mesin/edit/{id}', [MesinController::class, 'edit']);

Route::put('/mesin/update', [MesinController::class, 'update']);
Route::delete('/mesin/destroy', [MesinController::class, 'destroy']);
Route::post('/mesin/ruang/create', [MesinController::class, 'create_ruang']);


Route::get('/mesin/maintenance/{id}', [MaintenanceController::class, 'maintenance_mesin']);
Route::post('/mesin/maintenance/create/', [UpdateMaintenanceController::class, 'create']);
Route::put('/mesin/maintenance/create/submit/', [UpdateMaintenanceController::class, 'submit_create']);
Route::put('/mesin/maintenance/edit/', [UpdateMaintenanceController::class, 'edit']);
Route::put('/mesin/maintenance/edit/submit', [UpdateMaintenanceController::class, 'submit_edit']);
Route::delete('/mesin/maintenance/delete/', [UpdateMaintenanceController::class, 'delete']);


Route::get('/kategori', [KategoriController::class, 'index'])->middleware('admin');
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


Route::get('/approve', [JadwalApproveController::class, 'index']);
Route::post('/approve/jadwal', [JadwalApproveController::class, 'approve']);
Route::put('/approve/jadwal/tetap', [JadwalApproveController::class, 'approve_tetap']);
Route::put('/approve/jadwal/ubah', [JadwalApproveController::class, 'approve_ubah']);



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


//Route::post('/maintenance/action/create/', [MaintenanceController::class, 'maintenance_add']);


Route::get('/sparepart', [SparepartController::class, 'index']);
Route::get('/sparepart/create', [SparepartController::class, 'create']);
Route::post('/sparepart/create', [SparepartController::class, 'tambah']);
Route::get('/sparepart/edit/{id}', [SparepartController::class, 'edit']);
Route::put('/sparepart/update', [SparepartController::class, 'update']);
Route::delete('/sparepart/destroy', [SparepartController::class, 'destroy']);    

/*
diilangin, diganti pake model jadwal biasa
Route::get('/sparepart/maintenance/{id}', [MaintenanceController::class, 'tampil_sparepart']);
Route::post('/sparepart/maintenance/', [MaintenanceController::class, 'tambah_sparepart']);
Route::delete('/sparepart/maintenance/delete/', [MaintenanceController::class, 'hapus_sparepart']);
*/

Route::post('/sparepart/jadwal/', [JadwalSparepartController::class, 'tambah_sparepart']);
Route::delete('/sparepart/jadwal/delete/', [JadwalSparepartController::class, 'hapus_sparepart']);


Route::get('/jadwal/{id}', [JadwalController::class, 'index']);
Route::get('/jadwal/detail/{id}', [JadwalController::class, 'detail']);
Route::put('/jadwal/update/', [JadwalController::class, 'update']);
Route::put('/jadwal/update_alasan/', [JadwalController::class, 'update_with_alasan']);
Route::post('/jadwal/update_alasan_batal/', [JadwalController::class, 'update_with_alasan_batal']);


Route::get('/update_tahunan', [UpdateDbController::class, 'index']);
Route::post('/update_tahunan', [UpdateDbController::class, 'update_jadwal']);


Route::get('/laporan', [LaporanController::class, 'index']);
Route::post('/laporan/inspeksi', [LaporanController::class, 'laporan_general_inspection']);


Route::get('/test', [LaporanController::class, 'laporan_general_inspection']);
Route::post('/test', [HomeController::class, 'test2']);
Route::get('/test_load', [SetupMesinController::class, 'select_template']);
Route::get('/test/calendar', [HomeController::class, 'tes_kalender']);
Route::get('/test/pdf', [HomeController::class, 'test_pdf']);



