<?php

use App\Http\Controllers\KlinikHewan;
use App\Http\Requests\MahasiswaRequest;
use App\Models\Mahasiswa;
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

// Route::get('/', [\App\Http\Controllers\Mahasiswa::class, 'index']);

Route::get('/mahasiswa', [\App\Http\Controllers\Mahasiswa::class, 'tampilMahasiswa'])->name('mahasiswa.index');

Route::view('/mahasiswa/add', 'add_mahasiswa')->name('mahasiswa.adds');

Route::get('/mahasiswa/{mahasiswa}/edit', [\App\Http\Controllers\Mahasiswa::class, 'editMahasiswa'])->name('mahasiswa.edits');

Route::get('/mahasiswa/{mahasiswa}', [\App\Http\Controllers\Mahasiswa::class, 'tampilDetailMahasiswa'])->name('mahasiswa.detail');

Route::post('/mahasiswa/add', [\App\Http\Controllers\Mahasiswa::class, 'tambahMahasiswa'])->name('mahasiswa.add');

Route::put('/mahasiswa/add/{mahasiswa}', [\App\Http\Controllers\Mahasiswa::class, 'editMahasiswaPut'])->name('mahasiswa.edit');

Route::delete('/mahasiswa/delete/{mahasiswa}', [\App\Http\Controllers\Mahasiswa::class, 'deleteMahasiswa'])->name('mahasiswa.delete');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/klinik',[KlinikHewan::class,'index'] )->name('klinik.index');
Route::get('/',function(){return redirect()->route('klinik.index');});
Route::get('/klinik/add',[KlinikHewan::class,'addPasien'] )->name('klinik.add');
Route::post('/klinik/add',[KlinikHewan::class,'addPasienAction'] )->name('klinik.addAction');
Route::put('/klinik/add/{pasien}', [KlinikHewan::class, 'editPasienPut'])->name('pasien.edits');
Route::get('/klinik/{pasien}/edit', [KlinikHewan::class, 'editPasien'])->name('pasien.edit');
Route::delete('/klinik/delete/{pasien}', [KlinikHewan::class, 'deletePasien'])->name('pasien.delete');
Route::get('/klinik/{pasien}',[KlinikHewan::class,'detailPasien'])->name('klinik.pasien');

Route::get('/sendEmail',[\App\Http\Controllers\SendEmail::class,'index']);
Route::post('/sendEmail/send',[\App\Http\Controllers\SendEmail::class,'send']);


