<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identitas;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
public function login(Request $request)
{
    $user = Identitas::where('gmail', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Login gagal');
    }

    session([
        'user' => [
            'name' => $user->name,
            'role' => $user->role,
            'gmail' => $user->gmail,
        ]
    ]);

    return redirect('/dashboard');
}
    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }
}