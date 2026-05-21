<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;

class DonasiController extends Controller
{
    public function create()
    {
        $notifDonasi = collect();

        return view('donasi_create', compact('notifDonasi'));
    }

    public function index()
    {
        $donasi = Donasi::latest()->get();

        $user = session('user');

        $notifDonasi = collect();

        if (!$user) {
            return view('donasi', compact('donasi', 'notifDonasi'));
        }

        $email = $user['email'] ?? null;
        $name = $user['name'] ?? null;

        if ($email === 'admin@gmail.com') {

            $notifDonasi = Donasi::where(function ($q) {
                $q->where('notif_read', 0)
                    ->orWhereNull('notif_read');
            })
                ->latest()
                ->get();

        } else {

            $notifDonasi = Donasi::where('pengirim', $name)
                ->where(function ($q) {
                    $q->where('notif_read', 0)
                        ->orWhereNull('notif_read');
                })
                ->latest()
                ->get();
        }

        return view('donasi', compact('donasi', 'notifDonasi'));
    }

    public function store(Request $request)
    {
        $fileName = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('donasi_img'), $fileName);
        }

        $donasi = new Donasi();
        $donasi->barang = $request->barang;
        $donasi->jumlah = $request->jumlah;
        $donasi->keterangan = $request->keterangan;
        $donasi->daerah = $request->daerah;
        $donasi->gambar = $fileName;

        $donasi->pengirim = session('user')['name'] ?? null;

        $donasi->tracking_status = 'pending';

        $donasi->save();

        return redirect('/donasi')->with('success', 'Donasi berhasil dikirim!');
    }

    public function delete($id)
    {
        $donasi = Donasi::where('kd_barang', $id)->firstOrFail();

        if (
            session('user')['role'] !== 'admin' &&
            session('user')['name'] !== $donasi->pengirim
        ) {
            abort(403);
        }

        $donasi->delete();

        return redirect('/donasi');
    }

    public function edit($id)
    {
        $donasi = Donasi::where('kd_barang', $id)->firstOrFail();
        return view('donasi_edit', compact('donasi'));
    }

    public function update(Request $request, $id)
    {
        $donasi = Donasi::where('kd_barang', $id)->firstOrFail();

        $donasi->barang = $request->barang;
        $donasi->daerah = $request->daerah;
        $donasi->jumlah = $request->jumlah;
        $donasi->keterangan = $request->keterangan;

        $donasi->save();

        return redirect()->back()->with('success', 'Donasi berhasil diupdate');
    }

    public function tracking(Request $request, $id)
    {
        $donasi = Donasi::where('kd_barang', $id)->firstOrFail();

        if ($request->has('read')) {
            $donasi->notif_read = 1;
            $donasi->save();
        }

        $notifDonasi = Donasi::where('pengirim', session('user')['name'] ?? '')
            ->where(function ($q) {
                $q->where('notif_read', 0)
                    ->orWhereNull('notif_read');
            })
            ->latest()
            ->get();

        return view('donasi_tracking', compact('donasi', 'notifDonasi'));
    }

    public function show($id)
    {
        $donasi = Donasi::where('kd_barang', $id)->firstOrFail();

        $notifDonasi = Donasi::where('pengirim', session('user')['name'] ?? '')
            ->where(function ($q) {
                $q->where('notif_read', 0)
                    ->orWhereNull('notif_read');
            })
            ->latest()
            ->get();

        return view('donasi.detail', compact('donasi', 'notifDonasi'));
    }

    public function updateTracking($id)
    {
        $donasi = Donasi::where('kd_barang', $id)->firstOrFail();

        if (session('user')['role'] !== 'admin') {
            abort(403);
        }

        $current = (int) $donasi->status;

        if ($current < 4) {
            $donasi->status = $current + 1;
        }

        $donasi->save();

        return redirect()->back()->with('success', 'Tracking updated!');
    }
}