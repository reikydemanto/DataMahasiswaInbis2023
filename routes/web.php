<?php

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

Route::get('/', [\App\Http\Controllers\Mahasiswa::class, 'index']);

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
