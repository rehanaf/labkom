<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        // Cari user dengan perbandingan case-insensitive
        // (email & NIM/NIP tidak peka huruf besar/kecil)
        $user = null;
        if ($fieldType === 'email') {
            $user = User::whereRaw('LOWER(email) = ?', [strtolower(trim($identity))])->first();
        } else {
            // Normalisasi NIM/NIP: hapus spasi, strip, dan titik, lalu samakan case
            $sanitized = str_replace([' ', '-', '.'], '', strtoupper($identity));
            $user = User::whereRaw('LOWER(nim_nip) = ?', [strtolower($sanitized)])->first();
        }

        // Verifikasi password dengan hash yang tersimpan
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user, $request->boolean('remember'));
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
