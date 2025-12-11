<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        // Middleware 'guest' diterapkan pada form login, tapi dikecualikan untuk logout.
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi dasar
        $request->validate([
            'identity' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $identity = $request->input('identity');
        $password = $request->input('password');

        // Logic penentuan field login (email atau nim_nip)
        $fieldType = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'nim_nip';

        // Sanitasi input NIM/NIP jika bukan email
        if ($fieldType === 'nim_nip') {
            $identity = str_replace([' ', '-', '.'], '', strtoupper($identity));
        }

        // Mencoba otentikasi
        if (Auth::attempt([$fieldType => $identity, 'password' => $password], $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirect ke halaman HOME/DASHBOARD setelah login berhasil
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal
        return back()->withErrors([
            'identity' => 'Kombinasi Email/NIM/NIP dan Password tidak cocok atau akun tidak ditemukan.',
        ])->onlyInput('identity');
    }

    public function logout(Request $request)
    {
        // Logika logout: mengakhiri sesi, membatalkan sesi, dan meregenerasi token
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect kembali ke landing page
        return redirect('/');
    }
}