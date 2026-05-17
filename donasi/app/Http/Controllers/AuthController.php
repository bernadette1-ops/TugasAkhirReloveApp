<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){

        Identitas::create([
            'gmail'=>$request->email,
            'password'=>Hash::make($request->password),
            'profile'=>$request->name
        ]);

        return redirect('/login');
    }

    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){

        if(Auth::attempt([
            'gmail'=>$request->email,
            'password'=>$request->password
        ])){
            return redirect('/dashboard');
        }

        return back()->with('error','Login gagal');
    }

    public function profile(){
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('gmail')) {
            $user->gmail = $request->gmail;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success','Profile Updated!');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $gmail = session('gmail');

        if ($request->hasFile('photo')) {

            $path = $request->file('photo')->store('profile', 'public');

            DB::table('identitas')
                ->where('gmail', $gmail)
                ->update([
                    'photo' => $path
                ]);
        }

        return back()->with('success', 'Photo updated!');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}