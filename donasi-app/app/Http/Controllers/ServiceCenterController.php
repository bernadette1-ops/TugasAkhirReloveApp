<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\ServiceCenter;

class ServiceCenterController extends Controller
{
public function index()
{
    $tickets = ServiceCenter::latest()->get();

    $user = session('user');

    $isAdmin = ($user['gmail'] ?? null) === 'admin@gmail.com';

    $notifDonasi = collect();

    if ($user) {

        if ($isAdmin) {
            $notifDonasi = Donasi::where('notif_read', 0)
                ->latest()
                ->get();
        } else {
            $notifDonasi = Donasi::where('pengirim', $user['name'] ?? null)
                ->where(function ($q) {
                    $q->where('notif_read', 0)
                      ->orWhereNull('notif_read');
                })
                ->latest()
                ->get();
        }
    }

    return view('service-center', compact('tickets', 'notifDonasi', 'isAdmin'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gmail' => 'required|email',
            'keluhan' => 'required'
        ]);

        ServiceCenter::create([
            'name' => $request->name,
            'gmail' => $request->gmail,
            'keluhan' => $request->keluhan,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Keluhan terkirim!');
    }

    public function selesai($id)
    {
        ServiceCenter::where('kd_keluhan', $id)
            ->update(['status' => 'selesai']);

        return back();
    }
}