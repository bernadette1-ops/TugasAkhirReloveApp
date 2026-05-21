<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identitas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        Identitas::create([
            'gmail'    => $request->email,
            'password' => Hash::make($request->password),
            'name'     => $request->name,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function profile()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $notifDonasi = collect();

        $userName = session('user')['name'] ?? null;
        if ($userName) {
            $notifDonasi = \App\Models\Donasi::where('pengirim', $userName)
                ->where(function ($q) {
                    $q->where('notif_read', 0)->orWhereNull('notif_read');
                })
                ->latest()
                ->get();
        }

        return view('profile', compact('notifDonasi'));
    }

    public function updateProfile(Request $request)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $gmail = session('user')['gmail'];

        $user = Identitas::where('gmail', $gmail)->firstOrFail();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:identitas,gmail,' . $user->kd_identitas . ',kd_identitas',
        ]);

        $user->name  = $request->name;
        $user->gmail = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        session([
            'user' => [
                'name'  => $user->name,
                'role'  => $user->role,
                'gmail' => $user->gmail,
            ]
        ]);

        return back()->with('success', 'Profile berhasil diperbarui!');
    }

    public function updatePhoto(Request $request)
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $gmail = session('user')['gmail'];
        $user  = Identitas::where('gmail', $gmail)->firstOrFail();

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            $path = $request->file('photo')->store('profile', 'public');
            $user->photo = $path;
            $user->save();
        }

        return back()->with('success', 'Foto profil berhasil diperbarui!');
    }

    public function logout(Request $request)
    {
        session()->forget('user');
        return redirect('/login');
    }
}