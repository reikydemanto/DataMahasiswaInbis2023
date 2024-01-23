@extends('layouts.app')

@section('title', 'Daftar Pasien Klinik Dokter Hewan')

@section('content')
<nav class="mb-4">
    <a class="font-medium text-gray-700 underline" href="{{ route('klinik.add') }}"><button
            class="btn btn-primary m-r-5">Tambah Pasien</button></a>
</nav>

<table id="data-table" class="table">
    <thead>
        <tr>
            <th class="text-center">Nama Pasien</th>
            <th class="text-center">Jenis Hewan</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($daftarPasien as $pasien)
            <tr>
                <td class="text-center">{{ $pasien->nama }}</td>
                <td class="text-center">{{ $pasien->jenis_hewan }}</td>
                <td class="text-center"><img src="{{ $pasien->foto }}"></td>
                <td class="text-center">
                    <a
                        href="{{ route('klinik.pasien', ['pasien' => $pasien->id]) }}"><button
                            class="btn btn-primary m-r-5">Edit</button></a>
                </td>
            </tr>
        @empty
            <div>Kosong</div>
        @endforelse
    </tbody>
</table>

{{-- @if ($daftarPasien->count())
        <nav class="mt-4"> --}}
{{ $daftarPasien->links() }}
{{-- </nav>
@endif--}}

@endsection
