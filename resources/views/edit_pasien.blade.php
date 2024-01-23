@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('styles')
<style>
    .error_message {
        color: red;
        font-size: 0.8rem;
    }

</style>
@endsection

@section('content')
<form method="POST"
    action="{{ route('pasien.edits', ['pasien' => $daftarPasien->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div>
        <label for="nama">
            Nama
        </label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ $daftarPasien->nama }}" required>
        @error('nama')
            <p class="error_message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="jenis_hewan" class="mt-1">
            Jenis Hewan
        </label>
        <input type="text" class="form-control" name="jenis_hewan" id="jenis_hewan"
            value="{{ $daftarPasien->jenis_hewan }}" required>
        @error('alamat')
            <p class=" error_message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="diagnosa" class="mt-1">
            Diagnosa
        </label>
        <input type="text" class="form-control" name="diagnosa" id="diagnosa" value="{{ $daftarPasien->diagnosa }}"
            required>
        @error('diagnosa')
            <p class="error_message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="foto" class="mt-1">
            Foto
        </label>
        <img style="padding:12px;" src="{{$daftarPasien->foto}}">
        <input type="file" class="form-control" name="foto" id="foto">
        @error('diagnosa')
            <p class="error_message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button class="btn btn-primary m-r-5 mt-3" type="submit">Edit Pasien</button>
    </div>
</form>
@endsection
