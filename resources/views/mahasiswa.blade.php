@extends('layouts.app')

@section('title', $daftarMahasiswa->nama_lengkap)

@section('content')
    <p><b>Alamat</b>: {{ $daftarMahasiswa->alamat }}</p>
    <p><b>Angkatan</b>: {{ $daftarMahasiswa->angkatan }}</p>

    <div>
        <a href="{{ route('mahasiswa.edits', ['mahasiswa' => $daftarMahasiswa]) }}"><button
                class="btn btn-primary m-r-5">Edit</button></a>
    </div>

    <div>
        <form action="{{ route('mahasiswa.delete', ['mahasiswa' => $daftarMahasiswa]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger m-r-5 mt-2" type="submit">Delete</button>
        </form>
    </div>
@endsection
