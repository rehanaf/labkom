<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;
use App\Models\Laboratorium;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return match ($user->role) {
            'admin_labkom' => $this->showAdminDashboard(),
            'dosen'        => $this->showDosenDashboard($user),
            'mahasiswa'    => $this->showMahasiswaDashboard($user),
            default        => $this->handleInvalidRole(),
        };
    }

    private function showAdminDashboard()
    {
        $data = [
            'totalUsers' => User::count(),
            'totalLabs' => Laboratorium::count(),
            'pendingPeminjaman' => Peminjaman::where('status', 'pending')->count(),
            'approvedPeminjaman' => Peminjaman::where('status', 'approved')->count(),
        ];

        return view('dashboard.admin_labkom', $data);
    }

    private function showDosenDashboard($user)
    {
        $pendingVerifications = Peminjaman::with(['user', 'laboratorium'])
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('dashboard.dosen', compact('pendingVerifications'));
    }

    private function showMahasiswaDashboard($user)
    {
        $myPeminjaman = Peminjaman::with('laboratorium')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('dashboard.mahasiswa', compact('myPeminjaman'));
    }

    private function handleInvalidRole()
    {
        Auth::logout();
        return redirect('/login')->withErrors(['error' => 'Role tidak valid. Silakan hubungi administrator.']);
    }
}