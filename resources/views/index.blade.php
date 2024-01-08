@extends('layouts.app')

@section('title', 'Daftar Mahasiswa Inbis')

@section('content')
    <nav class="mb-4">
        <a class="font-medium text-gray-700 underline" href="{{ route('mahasiswa.adds') }}"><button
                class="btn btn-primary m-r-5">Tambah Mahasiswa</button></a>
    </nav>

    <table id="data-table" class="table">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($daftarMahasiswa as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->nama_lengkap }}</td>
                    <td class="text-center">
                        <a href="{{ route('mahasiswa.detail', ['mahasiswa' => $mahasiswa->id]) }}"><button
                                class="btn btn-primary m-r-5">Edit</button></a>
                        {{-- <a href="{{ route('mahasiswa.delete', ['mahasiswa' => $daftarMahasiswa]) }}"><button
                                class="btn btn-danger m-r-5">Hapus</button></a> --}}
                    </td>
                </tr>
            @empty
                <div>Kosong</div>
            @endforelse
        </tbody>
    </table>

    {{-- @if ($daftarMahasiswa->count())
        <nav class="mt-4"> --}}
    {{ $daftarMahasiswa->links() }}
    {{-- </nav>
    @endif --}}

@endsection
