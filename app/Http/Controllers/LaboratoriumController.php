<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    // Konstruktor untuk menerapkan middleware
    // Pastikan hanya Admin dan Dosen yang bisa mengakses (sesuai routes/web.php)
    public function __construct()
    {
        // Middleware 'auth' dan 'role' sudah diterapkan di routes/web.php
        // Jadi di sini cukup memastikan auth saja sebagai tambahan keamanan
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar semua laboratorium.
     */
    public function index()
    {
        // Mengambil semua data lab, diurutkan terbaru
        $laboratoriums = Laboratorium::latest()->get();

        return view('laboratorium.index', compact('laboratoriums'));
    }

    /**
     * Menampilkan form untuk membuat laboratorium baru.
     */
    public function create()
    {
        return view('laboratorium.create');
    }

    /**
     * Menyimpan data laboratorium baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_lab' => 'required|string|max:100|unique:laboratorium,nama_lab',
            'kapasitas' => 'required|integer|min:1',
            'fasilitas' => 'nullable|string',
            'kondisi' => 'required|in:baik,perbaikan,rusak',
        ]);

        // Simpan data
        Laboratorium::create($validatedData);

        return redirect()->route('laboratorium.index')
            ->with('success', 'Laboratorium berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit laboratorium.
     */
    public function edit(Laboratorium $laboratorium)
    {
        return view('laboratorium.edit', compact('laboratorium'));
    }

    /**
     * Memperbarui data laboratorium di database.
     */
    public function update(Request $request, Laboratorium $laboratorium)
    {
        // Validasi input
        $validatedData = $request->validate([
            // unique:table,column,except,id
            'nama_lab' => 'required|string|max:100|unique:laboratorium,nama_lab,'.$laboratorium->id,
            'kapasitas' => 'required|integer|min:1',
            'fasilitas' => 'nullable|string',
            'kondisi' => 'required|in:baik,perbaikan,rusak',
        ]);

        // Update data
        $laboratorium->update($validatedData);

        return redirect()->route('laboratorium.index')
            ->with('success', 'Data laboratorium berhasil diperbarui.');
    }

    /**
     * Menghapus laboratorium dari database.
     */
    public function destroy(Laboratorium $laboratorium)
    {
        // Hapus data
        $laboratorium->delete();

        return redirect()->route('laboratorium.index')
            ->with('success', 'Laboratorium berhasil dihapus.');
    }
}
