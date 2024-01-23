@extends('layouts.app')

@section('title', $daftarPasien->nama)

@section('content')

<table id="data-table" class="table">
    <tr>
        <td>
            <p><b>Jenis Hewan</b></p>
        </td>
        <td>
            <p>: {{ $daftarPasien->jenis_hewan }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p><b>Diagnosa</b></p>
        </td>
        <td>
            <p>: {{ $daftarPasien->diagnosa }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p><b>Foto</b></p>
        </td>
        <td><img src="{{ $daftarPasien->foto }}"></td>
    </tr>
    <tr>
        <td>
            <div>
                <a
                    href="{{ route('pasien.edit', ['pasien' => $daftarPasien]) }}"><button
                        class="btn btn-primary m-r-5">Edit</button></a>
            </div>
        </td>
        <td>
            <div>
                <form
                    action="{{ route('pasien.delete', ['pasien' => $daftarPasien]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger m-r-5 mt-2" type="submit">Delete</button>
                </form>
            </div>
        </td>
    </tr>
</table>



@endsection
