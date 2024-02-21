<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    // Menampilkan semua siswa
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    // Menampilkan form untuk menambahkan siswa baru
    public function create()
    {
        return view('siswa.form');
    }

    // Menyimpan siswa baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            // tambahkan validasi untuk kolom lain di sini
        ]);

        Siswa::create($validatedData);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    // Menampilkan detail siswa
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    // Menampilkan form untuk mengedit siswa
    public function edit(Siswa $siswa)
    {
        return view('siswa.form', compact('siswa'));
    }

    // Menyimpan perubahan pada siswa
    public function update(Request $request, Siswa $siswa)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            // tambahkan validasi untuk kolom lain di sini
        ]);

        $siswa->update($validatedData);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    // Menghapus siswa
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
