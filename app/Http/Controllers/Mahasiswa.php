<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Mahasiswa extends Controller
{
    public function index()
    {
        return redirect()->route('mahasiswa.index');
    }

    public function tampilMahasiswa()
    {
        return view('index', ['daftarMahasiswa' => \App\Models\Mahasiswa::latest()->paginate(10),'title' => 'Daftar Mahasiswa']);
    }

    public function editMahasiswa(\App\Models\Mahasiswa $mahasiswa)
    {
        return view('edit_mahasiswa', ['daftarMahasiswa' => $mahasiswa]);
    }

    public function tampilDetailMahasiswa(\App\Models\Mahasiswa $mahasiswa)
    {
        return view('mahasiswa', ['daftarMahasiswa' => $mahasiswa]);
    }

    public function tambahMahasiswa(\App\Http\Requests\MahasiswaRequest $request)
    {
        $mahasiswa = \App\Models\Mahasiswa::create($request->validated());

        return redirect()
            ->route('mahasiswa.detail', ['mahasiswa' => $mahasiswa->id])
            ->with('success', 'Tambah Mahasiswa Berhasil!');
    }

    public function editMahasiswaPut(\App\Models\Mahasiswa $mahasiswa, \App\Http\Requests\MahasiswaRequest $request)
    {
        $mahasiswa->update($request->validated());

        return redirect()
            ->route('mahasiswa.detail', ['mahasiswa' => $mahasiswa->id])
            ->with('success', 'Edit Mahasiswa Berhasil!');
    }

    public function deleteMahasiswa(\App\Models\Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil di Hapus!');
    }
}
