<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SparepartController;
use App\Models\Kategori;
use App\Models\Mesin;

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
//Route::get('/mesin/edit/{id}', [MesinController::class, 'edit']);
Route::get('/mesin/edit/{id}', function(){
    dd('ya ndak tau');
});
Route::put('/mesin/update', [MesinController::class, 'update']);
Route::delete('/mesin/destroy', [MesinController::class, 'destroy']);




Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/create', [KategoriController::class, 'create']);
Route::put('/kategori/update', [KategoriController::class, 'update']);
Route::delete('/kategori/destroy', [KategoriController::class, 'destroy']);




Route::get('/ruang', [RuangController::class, 'index']);
Route::post('/ruang/create', [RuangController::class, 'create']);
Route::put('/ruang/update', [RuangController::class, 'update']);
Route::delete('/ruang/destroy', [RuangController::class, 'destroy']);



Route::get('/sparepart', [SparepartController::class, 'index']);
Route::get('/sparepart/create', [SparepartController::class, 'create']);
Route::post('/sparepart/create', [SparepartController::class, 'tambah']);
Route::get('/sparepart/edit/{id}', [SparepartController::class, 'edit']);
Route::put('/sparepart/update', [SparepartController::class, 'update']);
    







Route::get('/test', [HomeController::class, 'test']);
Route::post('/test', [HomeController::class, 'test2']);

