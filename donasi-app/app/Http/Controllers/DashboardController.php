<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $notifDonasi = [];
        
        $donasi = DB::table('donasi')->orderBy('kd_barang', 'desc')->get();
        return view('dashboard', compact('donasi'));
    }
}