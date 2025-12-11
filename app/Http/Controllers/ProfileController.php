<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan import model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Tampilkan profil publik user.
     * Jika tidak ada {user}, tampilkan profil sendiri.
     */
    public function show(User $user = null)
    {
        // Jika tidak ada user di route, tampilkan profil sendiri
        if (!$user) {
            $user = Auth::user();
        }

        return view('profile.index', compact('user'));
    }

    /**
     * Tampilkan form edit profil (hanya untuk profil sendiri).
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update profil user.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'bio' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();
        $data = $request->only(['name', 'email', 'bio', 'phone']);

        // Handle upload avatar
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}