<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Support\Facades\Storage;

class KlinikHewan extends Controller
{
    public function index()
    {
        return view('klinik', ['daftarPasien' => Pasien::latest()->get(),'title' => 'Daftar Pasien']);
    }

    public function detailPasien(Pasien $pasien)
    {
        return view('pasien', ['daftarPasien' => $pasien]);
    }
    public function addPasien()
    {
        return view('add_pasien',);
    }
    public function addPasienAction(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $extension = pathinfo($fileName,PATHINFO_EXTENSION);
        $s3 = Storage::disk('s3')->getClient();
        $bucket = config('filesystems.disks.s3.bucket');

        $movedName = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
        
        $path = 'Coba_Upload' . '/' . $movedName;
        $s3->putObject([
            'Bucket' => $bucket,
            'Key' => $path,
            'SourceFile' => $file->path(),
            'ACL' => 'public-read',
            'ContentType' => $file->getMimeType(),
            'ContentDisposition' => 'inline; filename="' . $fileName . '"',
        ]);

        $pasien = new Pasien;

        $pasien->nama = $request->nama;
        $pasien->jenis_hewan = $request->jenis_hewan;
        $pasien->diagnosa = $request->diagnosa;
        $pasien->foto = Storage::disk('s3')->url($path);

        $pasien->save();
        return redirect()->route('klinik.index');
    }

    public function deletePasien(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()
            ->route('klinik.index')
            ->with('success', 'Pasien Berhasil di Hapus!');
    }

    public function editPasien(Pasien $pasien){
        return view('edit_pasien', ['daftarPasien' => $pasien]);
    }

    public function editPasienPut(Pasien $pasien, Request $request){
        $filefoto = $request->file('foto');

        if($filefoto){
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $extension = pathinfo($fileName,PATHINFO_EXTENSION);
            $s3 = Storage::disk('s3')->getClient();
            $bucket = config('filesystems.disks.s3.bucket');

            $movedName = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
            
            $path = 'Coba_Upload' . '/' . $movedName;
            $s3->putObject([
                'Bucket' => $bucket,
                'Key' => $path,
                'SourceFile' => $file->path(),
                'ACL' => 'public-read',
                'ContentType' => $file->getMimeType(),
                'ContentDisposition' => 'inline; filename="' . $fileName . '"',
            ]);

            $pasien->nama = $request->nama;
            $pasien->jenis_hewan = $request->jenis_hewan;
            $pasien->diagnosa = $request->diagnosa;
            $pasien->foto = Storage::disk('s3')->url($path);

            $pasien->save();
            return redirect()->route('klinik.index');
        }else{
            $filefoto = $pasien->foto;
            $pasien->foto = $filefoto;
            $pasien->nama = $request->nama;
            $pasien->jenis_hewan = $request->jenis_hewan;
            $pasien->diagnosa = $request->diagnosa;
            $pasien->save();
            return redirect()->route('klinik.index');
        }
    }
}
