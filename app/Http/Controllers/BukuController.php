<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data buku
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('buku.form', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('gambar')) {
            $imageName = $request->file('gambar')->store('public/images');
            $imageName = basename($imageName);
        }

        Buku::create([
            'judul' => $validatedData['judul'],
            'kategori_id' => $validatedData['kategori_id'],
            'pengarang' => $validatedData['pengarang'],
            'tahun_terbit' => $validatedData['tahun_terbit'],
            'gambar' => $imageName,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        return view('buku.form', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = $request->file('gambar')->store('public/images');
            $imageName = basename($imageName);
        } else {
            $imageName = $buku->gambar;
        }

        $buku->update([
            'judul' => $validatedData['judul'],
            'kategori_id' => $validatedData['kategori_id'],
            'pengarang' => $validatedData['pengarang'],
            'tahun_terbit' => $validatedData['tahun_terbit'],
            'gambar' => $imageName,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->gambar) {
            Storage::delete('public/images/' . $buku->gambar);
        }
        
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
