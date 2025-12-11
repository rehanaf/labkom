<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth; // Tambahkan ini agar Auth::id() berfungsi

class UsersController extends Controller
{
    public function __construct()
    {
        // Middleware 'auth' memastikan hanya user login yang bisa akses.
        $this->middleware(['auth']);
    }

    /**
     * Menampilkan daftar pengguna.
     */
    public function index()
    {
        $users = User::latest()->get();
        // Memanggil file: resources/views/users/index.blade.php
        return view('users.index', compact('users'));
    }

    /**
     * Menampilkan form tambah pengguna.
     */
    public function create()
    {
        // ERROR terjadi di sini karena file Anda bernama 'create.index.php'.
        // Silakan RENAME file tersebut menjadi 'create.blade.php'.
        return view('users.create');
    }

    /**
     * Menyimpan data pengguna baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', Rule::in(['mahasiswa', 'dosen', 'admin_labkom'])],
            'nim_nip' => 'nullable|string|max:50|unique:users,nim_nip',
            'jurusan' => 'nullable|string|max:100',
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit pengguna.
     */
    public function edit(User $user)
    {
        // Memanggil file: resources/views/users/edit.blade.php
        return view('users.edit', compact('user'));
    }

    /**
     * Memperbarui data pengguna.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', Rule::in(['mahasiswa', 'dosen', 'admin_labkom'])],
            'nim_nip' => ['nullable', 'string', 'max:50', Rule::unique('users')->ignore($user->id)],
            'jurusan' => 'nullable|string|max:100',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Menghapus pengguna.
     */
    public function destroy(User $user)
    {
        // Mencegah admin menghapus diri sendiri
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}