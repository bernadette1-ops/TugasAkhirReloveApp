<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    // SHOW PAGE + TABLE
    public function index()
    {
        $donasi = DB::table('donasi')->get();
        return view('donasi', compact('donasi'));
    }

    // CREATE DATA
    public function store(Request $request)
    {
        DB::table('donasi')->insert([
            'barang' => $request->barang,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'pengirim' => Auth::user()->name
        ]);

        return redirect('/donasi')->with('success', 'Data berhasil dikirim');
    }

    public function delete($id)
    {
        DB::table('donasi')
            ->where('kd_barang', $id)
            ->where('pengirim', Auth::user()->name)
            ->delete();

        return redirect('/donasi');
    }

    public function edit($id)
    {
        $donasi = DB::table('donasi')->where('kd_barang', $id)->first();
    }

    public function update(Request $request, $id)
    {
        DB::table('donasi')
            ->where('kd_barang', $id)
            ->where('pengirim', Auth::user()->name)
            ->update([
                'barang' => $request->barang,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan
            ]);

        return redirect('/donasi');
    }
}