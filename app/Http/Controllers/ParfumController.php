<?php

namespace App\Http\Controllers;

use App\Models\Parfum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParfumController extends Controller
{
    /**
     * Menampilkan daftar semua parfum. (READ)
     */
    public function index()
    {
        $parfums = Parfum::latest()->get();
        return view('parfums.index', compact('parfums'));
    }

    /**
     * Menampilkan form untuk menambah parfum baru. (CREATE - Form)
     */
    public function create()
    {
        return view('parfums.create');
    }

    /**
     * Menyimpan data parfum baru ke database. (CREATE - Store)
     */
    public function store(Request $request)
    {
        // 1. Validasi Data: MENAMBAHKAN 'deskripsi'
        $validated = $request->validate([
            'nama_parfum' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string', // <-- DITAMBAHKAN
        ]);

        // 2. Manajemen Foto (Upload)
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('parfum', 'public');
        }

        // 3. Simpan data ke Database
        Parfum::create($validated);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('parfums.index')->with('success', 'Parfum berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman detail parfum saat diklik.
     */
    public function show(Parfum $parfum)
    {
        // METHOD BARU UNTUK TAMPILAN DETAIL
        return view('parfums.show', compact('parfum')); 
    }
    
    /**
     * Menampilkan form untuk mengedit parfum tertentu. (UPDATE - Form)
     */
    public function edit(Parfum $parfum)
    {
        return view('parfums.edit', compact('parfum'));
    }

    /**
     * Menyimpan perubahan data parfum yang diedit. (UPDATE - Store)
     */
    public function update(Request $request, Parfum $parfum)
    {
        // 1. Validasi Data: MENAMBAHKAN 'deskripsi'
        $validated = $request->validate([
            'nama_parfum' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string', // <-- DITAMBAHKAN
        ]);

        // 2. Manajemen Foto (Upload dan Hapus Lama)
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($parfum->foto && Storage::disk('public')->exists($parfum->foto)) {
                Storage::disk('public')->delete($parfum->foto);
            }
            // Simpan foto baru ke folder 'parfum'
            $validated['foto'] = $request->file('foto')->store('parfum', 'public');
        }
        
        // 3. Perbarui data di Database
        $parfum->update($validated);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('parfums.index')->with('success', 'Parfum berhasil diperbarui!');
    }

    /**
     * Menghapus parfum dari database. (DELETE)
     */
    public function destroy(Parfum $parfum)
    {
        // 1. Manajemen Foto (Hapus)
        if ($parfum->foto && Storage::disk('public')->exists($parfum->foto)) {
            Storage::disk('public')->delete($parfum->foto);
        }

        // 2. Hapus data dari Database
        $parfum->delete();

        // 3. Redirect dengan pesan sukses
        return redirect()->route('parfums.index')->with('success', 'Parfum berhasil dihapus!');
    }
}