<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\RuangController;
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


Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/create', [KategoriController::class, 'create']);
Route::put('/kategori/update', [KategoriController::class, 'update']);



Route::get('/ruang', [RuangController::class, 'index']);
Route::get('/ruang/create', [RuangController::class, 'create']);
Route::post('/ruang/create', [RuangController::class, 'tambah']);



Route::get('/test', [HomeController::class, 'test']);

