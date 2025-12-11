<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi dasar
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:mahasiswa,dosen,admin_labkom'],
        ];

        // Validasi kondisional berdasarkan role
        if ($request->role !== 'admin_labkom') {
            $rules['nim_nip'] = ['required', 'string', 'max:50', 'unique:users'];
            $rules['jurusan'] = ['required', 'string', 'max:100'];
        }

        $request->validate($rules);

        // Siapkan data untuk disimpan
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nim_nip' => $request->role === 'admin_labkom' ? null : $request->nim_nip,
            'jurusan' => $request->role === 'admin_labkom' ? null : $request->jurusan,
        ];

        // Buat user
        $user = User::create($userData);

        // Login otomatis
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Pendaftaran berhasil! Selamat datang.');
    }
}