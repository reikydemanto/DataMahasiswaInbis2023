@extends('layouts.app')

@section('title', 'Tambah Anabul')

@section('styles')
<style>
    .error_message {
        color: red;
        font-size: 0.8rem;
    }

</style>
@endsection

@section('content')
<form method="POST" action="{{ route('klinik.addAction') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="nama">
            Nama
        </label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" required>
        @error('nama')
            <p class="error_message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="jenis_hewan" class="mt-1">
            Jenis Hewan
        </label>
        <input type="text" name="jenis_hewan" class="form-control" id="jenis_hewan" value="{{ old('jenis_hewan') }}" required>{{ old('jenis_hewan') }}</textarea>
        @error('jenis_hewan')
            <p class="error_message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="diagnosa" class="mt-1">
            Diagnosa
        </label>
        <input type="text" class="form-control" name="diagnosa" id="diagnosa"
            value="{{ old('diagnosa') }}" required>
        @error('diagnosa')
            <p class="error_message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="foto" class="mt-1">
            Foto
        </label>
        <input type="file", class="form-control" name="file" id="foto" required>
    </div>
    <div>
        <button class="btn btn-primary m-r-5 mt-3" type="submit">Tambah Pasien</button>
    </div>
</form>
@endsection
