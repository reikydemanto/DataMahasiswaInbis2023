<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan as pesan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = pesan::all();
        return response()->json($pesanan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'iduser' => 'required',
            'produk' => 'required',
            'jumlah' => 'required'
        ]);

        $request = pesan::create([
            'iduser' => $request->iduser,
            'produk' => $request->produk,
            'jumlah' => $request->jumlah
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pesan = pesan::where('idPesanan',$id)->get();
        return $pesan;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {      
        $request->validate([
            'produk' => 'sometimes',
            'jumlah' => 'sometimes'
        ]);
 
        $hasil = pesan::where('idPesanan',$id)->update([
            // 'produk' => $request->produk[0]->produk,
            'produk' => $request->produk ? : $request->produk = pesan::where('idPesanan',$id)->get('produk')[0]->produk,
            'jumlah' => $request->jumlah ? : $request->jumlah = pesan::where('idPesanan',$id)->get('jumlah')[0]->jumlah
        ]);

        return $hasil;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hasil = pesan::where('idPesanan',$id)->delete();
        return $hasil;
    }
}
