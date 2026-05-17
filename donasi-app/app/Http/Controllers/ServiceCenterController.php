<?php

namespace App\Http\Controllers;

use App\Models\ServiceCenter;
use Illuminate\Http\Request;

class ServiceCenterController extends Controller
{
    public function index()
    {
        $tickets = ServiceCenter::all();
        return view('service-center', compact('tickets'));
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