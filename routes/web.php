<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilAyahController;
use App\Http\Controllers\ProfilIbuController;
use App\Http\Controllers\ProfilSaudaraController;
use App\Http\Controllers\ProfilWaliController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[Controller::class,'index'])->name('index');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::middleware('auth')->group(function(){
    Route::middleware('role:mahasiswa')->group(function(){
        Route::prefix('mahasiswa')->group(function () {
            Route::get('dashboard',[MahasiswaController::class,'dashboard']);
            Route::resource('data-calon-mahasiswa',MahasiswaController::class);
            Route::resource('data-pendidikan',PendidikanController::class);
            Route::get('data-keluarga',[Controller::class,'dataKeluarga']);
            Route::resource('data-ayah',ProfilAyahController::class);
            Route::resource('data-ibu',ProfilIbuController::class);
            Route::resource('data-wali',ProfilWaliController::class);
            Route::resource('data-saudara',ProfilSaudaraController::class);
            Route::get('pengumuman',[PengumumanController::class,'mahasiswaPengumuman']);
        });
    });
    Route::middleware('role:admin')->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('dashboard',[Controller::class,'adminDashboard']);
            Route::resource('data-calon-mahasiswa',MahasiswaController::class);
            Route::get('mahasiswa-api',[MahasiswaController::class,'apiMahasiswa'])->name('api-mahasiswa');
            Route::post('cetak',[Controller::class,'cetak']);
        });
    });
});
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'attemp'])->name('login');
Route::get('daftar-mahasiswa',[MahasiswaController::class,'form']);
Route::post('daftar-mahasiswa',[AuthController::class,'postForm']);
Route::resource('kontak',KontakController::class);
Route::get('pengumuman-api',[PengumumanController::class,'getValue'])->name('pengumuman-api');
