<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        Identitas::create([
            'gmail' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name
        ]);

        return redirect('/login')->with('success', 'Registration successful!');
    }

    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        if(Auth::attempt([
            'gmail' => $request->email,
            'password' => $request->password
        ])){
            return redirect('/dashboard');
        }

        return back()->with('error', 'Login gagal');
    }

    public function profile(){
        // Get the current logged-in user data
        $user = Auth::user();
        return view('profile', compact('user'));
    }

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:identitas,gmail,' 
                   . $user->kd_identitas . ',kd_identitas',
    ]);

    // UPDATE NAME
    $user->name = $request->name;

    // UPDATE EMAIL
    $user->gmail = $request->email;

    // UPDATE PASSWORD ONLY IF FILLED
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return back()->with('success', 'Profile updated successfully!');
}

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $user = Auth::user();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile', 'public');
            $user->photo = $path;
            $user->save();
        }

        return back()->with('success', 'Photo updated!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function store(Request $request)
    {
        DB::table('donasi')->insert([
            'barang' => $request->barang,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'pengirim' => Auth::user()->name
        ]);

        return redirect('/donasi');
    }
}