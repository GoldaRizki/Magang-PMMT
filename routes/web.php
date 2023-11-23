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

Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::post('/masuk', [UserController::class, 'masuk'])->middleware('guest');

Route::get('/akun', [UserController::class, 'akun'])->middleware('auth');
Route::put('/user/akun/update/', [UserController::class, 'update_akun'])->middleware('auth');
Route::put('/user/akun/update/password/', [UserController::class, 'ganti_password'])->middleware('auth');



Route::get('/user/all/', [UserController::class, 'index'])->middleware('auth')->middleware('superuser');
Route::get('/user/create/', [UserController::class, 'create'])->middleware('auth')->middleware('superuser');
Route::post('/user/store/', [UserController::class, 'store'])->middleware('superuser');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('superuser');
Route::put('/user/update/', [UserController::class, 'update'])->middleware('superuser');
Route::delete('/user/delete/', [UserController::class, 'delete'])->middleware('superuser');



Route::get('/mesin', [MesinController::class, 'index'])->middleware('auth')->middleware('teknisi');
Route::get('/mesin/create', [MesinController::class, 'create'])->middleware('auth')->middleware('admin');
Route::post('/mesin/create', [MesinController::class, 'tambah'])->middleware('admin');
Route::get('/mesin/detail/{id}', [MesinController::class, 'detail'])->middleware('auth')->middleware('teknisi');
Route::get('/mesin/edit/{id}', [MesinController::class, 'edit'])->middleware('auth')->middleware('admin');

Route::put('/mesin/update', [MesinController::class, 'update'])->middleware('admin');
Route::delete('/mesin/destroy', [MesinController::class, 'destroy'])->middleware('admin');
Route::post('/mesin/ruang/create', [MesinController::class, 'create_ruang'])->middleware('admin');


Route::get('/mesin/maintenance/{id}', [MaintenanceController::class, 'maintenance_mesin'])->middleware('auth')->middleware('teknisi');
Route::post('/mesin/maintenance/create/', [UpdateMaintenanceController::class, 'create'])->middleware('supervisor');
Route::put('/mesin/maintenance/create/submit/', [UpdateMaintenanceController::class, 'submit_create'])->middleware('supervisor');
Route::put('/mesin/maintenance/edit/', [UpdateMaintenanceController::class, 'edit'])->middleware('supervisor');
Route::put('/mesin/maintenance/edit/submit', [UpdateMaintenanceController::class, 'submit_edit'])->middleware('supervisor');
Route::delete('/mesin/maintenance/delete/', [UpdateMaintenanceController::class, 'delete'])->middleware('supervisor');


Route::get('/kategori', [KategoriController::class, 'index'])->middleware('auth')->middleware('teknisi');
Route::post('/kategori/create', [KategoriController::class, 'create'])->middleware('supervisor');
Route::put('/kategori/update', [KategoriController::class, 'updateOnKategori'])->middleware('supervisor');
Route::delete('/kategori/destroy', [KategoriController::class, 'destroy'])->middleware('supervisor');

Route::post('/kategori/setupMaintenance/create', [SetupMaintenanceController::class, 'createPadaKategori'])->middleware('supervisor');
Route::put('/kategori/setupMaintenance/edit', [SetupMaintenanceController::class, 'editPadaKategori'])->middleware('supervisor');
Route::delete('/kategori/setupMaintenance/destroy', [SetupMaintenanceController::class, 'hapusPadaKategori'])->middleware('supervisor');


Route::get('/setupMaintenance/{id}', [SetupMaintenanceController::class, 'setup'])->middleware('auth')->middleware('teknisi');
Route::post('/setupMaintenance/create', [SetupMaintenanceController::class, 'createPadaSetup'])->middleware('supervisor');
Route::put('/setupMaintenance/edit', [SetupMaintenanceController::class, 'editPadaSetup'])->middleware('supervisor');
Route::delete('/setupMaintenance/destroy', [SetupMaintenanceController::class, 'hapusPadaSetup'])->middleware('supervisor');
Route::put('/setupMaintenance/kategori/update', [KategoriController::class, 'updateOnSetup'])->middleware('supervisor');


Route::post('/setupForm/create/', [SetupFormController::class, 'createPadaSetup'])->middleware('supervisor');
Route::put('/setupForm/edit/', [SetupFormController::class, 'editPadaSetup'])->middleware('supervisor');
Route::delete('/setupForm/delete/', [SetupFormController::class, 'deletePadaSetup'])->middleware('supervisor');

Route::post('/kategori/setupForm/create/', [SetupFormController::class, 'createPadaKategori'])->middleware('supervisor');
Route::put('/kategori/setupForm/edit/', [SetupFormController::class, 'editPadaKategori'])->middleware('supervisor');
Route::delete('/kategori/setupForm/delete/', [SetupFormController::class, 'deletePadaKategori'])->middleware('supervisor');

Route::get('/ruang', [RuangController::class, 'index'])->middleware('auth')->middleware('teknisi');
Route::post('/ruang/create', [RuangController::class, 'create'])->middleware('admin');
Route::put('/ruang/update', [RuangController::class, 'update'])->middleware('admin');
Route::delete('/ruang/destroy', [RuangController::class, 'destroy'])->middleware('admin');


Route::get('/approve', [JadwalApproveController::class, 'index'])->middleware('auth')->middleware('manager')->middleware('bukan admin');
Route::post('/approve/jadwal', [JadwalApproveController::class, 'approve'])->middleware('manager')->middleware('bukan admin');
Route::put('/approve/jadwal/tetap', [JadwalApproveController::class, 'approve_tetap'])->middleware('manager')->middleware('bukan admin');
Route::put('/approve/jadwal/ubah', [JadwalApproveController::class, 'approve_ubah'])->middleware('manager')->middleware('bukan admin');



Route::post('/maintenance/form/pilih/', [SetupMesinController::class, 'pilih_template'])->middleware('teknisi');
Route::post('/maintenance/form/pilih/kirim/', [SetupMesinController::class, 'ambil_template'])->middleware('supervisor');
Route::get('/maintenance/form/pilih/', [SetupMesinController::class, 'tampil_template'])->middleware('auth')->middleware('supervisor');

Route::post('/maintenance/ubah_template/', [SetupMesinController::class, 'ubah_template'])->middleware('supervisor');

Route::post('/maintenance/create/', [SetupMesinController::class, 'create_maintenance'])->middleware('supervisor');
Route::post('/maintenance/edit/', [SetupMesinController::class, 'edit_maintenance'])->middleware('supervisor');
Route::post('/maintenance/delete/', [SetupMesinController::class, 'delete_maintenance'])->middleware('supervisor');

Route::put('/maintenance/submit/', [MaintenanceController::class, 'update'])->middleware('supervisor');

Route::post('/maintenance/form/create/', [SetupMesinController::class, 'create_maintenance_form'])->middleware('supervisor');
Route::post('/maintenance/form/update/', [SetupMesinController::class, 'update_maintenance_form'])->middleware('supervisor');
Route::post('/maintenance/form/delete/', [SetupMesinController::class, 'delete_maintenance_form'])->middleware('supervisor');


//Route::post('/maintenance/action/create/', [MaintenanceController::class, 'maintenance_add']);


Route::get('/sparepart', [SparepartController::class, 'index'])->middleware('auth')->middleware('teknisi');
Route::get('/sparepart/create', [SparepartController::class, 'create'])->middleware('auth')->middleware('admin');
Route::post('/sparepart/create', [SparepartController::class, 'tambah'])->middleware('admin');
Route::get('/sparepart/edit/{id}', [SparepartController::class, 'edit'])->middleware('auth')->middleware('admin');
Route::put('/sparepart/update', [SparepartController::class, 'update'])->middleware('admin');
Route::delete('/sparepart/destroy', [SparepartController::class, 'destroy'])->middleware('admin');    

/*
diilangin, diganti pake model jadwal biasa
Route::get('/sparepart/maintenance/{id}', [MaintenanceController::class, 'tampil_sparepart']);
Route::post('/sparepart/maintenance/', [MaintenanceController::class, 'tambah_sparepart']);
Route::delete('/sparepart/maintenance/delete/', [MaintenanceController::class, 'hapus_sparepart']);
*/

Route::post('/sparepart/jadwal/', [JadwalSparepartController::class, 'tambah_sparepart'])->middleware('teknisi');
Route::delete('/sparepart/jadwal/delete/', [JadwalSparepartController::class, 'hapus_sparepart'])->middleware('teknisi');


Route::get('/jadwal/{id}', [JadwalController::class, 'index'])->middleware('auth')->middleware('teknisi');
Route::get('/jadwal/detail/{id}', [JadwalController::class, 'detail'])->middleware('auth')->middleware('teknisi');
Route::put('/jadwal/update/', [JadwalController::class, 'update'])->middleware('teknisi')->middleware('bukan admin');
Route::put('/jadwal/update_alasan/', [JadwalController::class, 'update_with_alasan'])->middleware('teknisi')->middleware('bukan admin');
Route::post('/jadwal/update_alasan_batal/', [JadwalController::class, 'update_with_alasan_batal'])->middleware('teknisi')->middleware('bukan admin');


Route::get('/update_tahunan', [UpdateDbController::class, 'index'])->middleware('auth')->middleware('manager');
Route::post('/update_tahunan', [UpdateDbController::class, 'update_jadwal'])->middleware('manager');


Route::get('/laporan', [LaporanController::class, 'index'])->middleware('auth')->middleware('supervisor');
Route::post('/laporan/inspeksi', [LaporanController::class, 'laporan_general_inspection'])->middleware('supervisor');
Route::post('/laporan/maintenance', [LaporanController::class, 'laporan_maintenance'])->middleware('supervisor');
Route::post('/laporan/rencana_realisasi', [LaporanController::class, 'laporan_rencana_realisasi'])->middleware('supervisor');

/*

Route::get('/test', [LaporanController::class, 'laporan_rencana_realisasi']);
Route::post('/test', [HomeController::class, 'test2']);
Route::get('/test_load', [SetupMesinController::class, 'select_template']);
Route::get('/test/calendar', [HomeController::class, 'tes_kalender']);
Route::get('/test/pdf', [HomeController::class, 'test_pdf']);

*/

