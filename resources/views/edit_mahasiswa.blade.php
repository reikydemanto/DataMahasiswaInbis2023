@extends('layouts.app')

@section('title', 'Sunting Mahasiswa')

@section('styles')
    <style>
        .error_message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('mahasiswa.edit', ['mahasiswa' => $daftarMahasiswa->id]) }}">
        @method('PUT')
        @csrf
        <div>
            <label for="nama_lengkap">
                Nama Lengkap
            </label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                value="{{ $daftarMahasiswa->nama_lengkap }}">
            @error('nama_lengkap')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="alamat" class="mt-1">
                Alamat
            </label>
            <textarea name="alamat" class="form-control" id="alamat" rows="5">{{ $daftarMahasiswa->alamat }}</textarea>
            @error('alamat')
                <p class=" error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="angkatan" class="mt-1">
                Angkatan
            </label>
            <input type="number" class="form-control" name="angkatan" id="angkatan"
                value="{{ $daftarMahasiswa->angkatan }}">
            @error('angkatan')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button class="btn btn-primary m-r-5 mt-3" type="submit">Sunting Mahasiswa</button>
        </div>
    </form>
@endsection
