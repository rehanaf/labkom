<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        // Middleware 'auth' memastikan hanya user login yang bisa akses
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar peminjaman.
     * Admin/Dosen: Lihat semua.
     * Mahasiswa: Lihat milik sendiri.
     */
    public function index()
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin_labkom', 'dosen'])) {
            // Admin & Dosen melihat semua data, urut dari terbaru
            $peminjamans = Peminjaman::with(['user', 'laboratorium'])->latest()->get();
        } else {
            // Mahasiswa hanya melihat data miliknya sendiri
            $peminjamans = Peminjaman::with(['laboratorium'])
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Menampilkan form pengajuan peminjaman (Khusus Mahasiswa).
     */
    public function create()
    {
        // Cegah Admin/Dosen mengajukan peminjaman (opsional, tergantung kebijakan)
        if (Auth::user()->role !== 'mahasiswa') {
            return redirect()->route('peminjaman.index')
                ->with('error', 'Hanya Mahasiswa yang dapat mengajukan peminjaman.');
        }

        // Ambil data lab untuk dipilih di form
        $laboratoriums = Laboratorium::all();
        
        return view('peminjaman.create', compact('laboratoriums'));
    }

    /**
     * Menyimpan data pengajuan peminjaman baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'laboratorium_id' => 'required|exists:laboratorium,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'keperluan' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        // PENTING: Mapping 'laboratorium_id' dari form ke 'lab_id' di database
        Peminjaman::create([
            'user_id' => Auth::id(),
            'lab_id' => $request->laboratorium_id, // Sesuaikan dengan kolom DB
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keperluan' => $request->keperluan,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Pengajuan peminjaman berhasil dikirim. Menunggu verifikasi.');
    }

    /**
     * Menampilkan form verifikasi/edit peminjaman (Khusus Admin/Dosen).
     */
    public function edit(Peminjaman $peminjaman)
    {
        // Pastikan hanya Admin atau Dosen yang bisa akses halaman ini
        if (!in_array(Auth::user()->role, ['admin_labkom', 'dosen'])) {
            return redirect()->route('peminjaman.index')
                ->with('error', 'Anda tidak memiliki hak akses untuk memverifikasi peminjaman.');
        }

        return view('peminjaman.edit', compact('peminjaman'));
    }

    /**
     * Memperbarui data peminjaman (Biasanya untuk update status oleh Dosen).
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        // Pastikan hanya Admin atau Dosen yang bisa update
        if (!in_array(Auth::user()->role, ['admin_labkom', 'dosen'])) {
            return redirect()->route('peminjaman.index')
                ->with('error', 'Akses ditolak.');
        }

        $validatedData = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'keterangan_dosen' => 'nullable|string',
        ]);

        $peminjaman->update($validatedData);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Status peminjaman berhasil diperbarui.');
    }

    /**
     * Menghapus/Membatalkan peminjaman.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $user = Auth::user();

        // Logika Hapus:
        // 1. Admin bisa hapus apa saja.
        // 2. Mahasiswa hanya bisa hapus miliknya SENDIRI dan jika status masih PENDING.
        
        if ($user->role === 'mahasiswa') {
            if ($peminjaman->user_id !== $user->id) {
                return back()->with('error', 'Anda tidak berhak menghapus data ini.');
            }
            if ($peminjaman->status !== 'pending') {
                return back()->with('error', 'Peminjaman yang sudah diproses tidak dapat dibatalkan.');
            }
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus/dibatalkan.');
    }
}