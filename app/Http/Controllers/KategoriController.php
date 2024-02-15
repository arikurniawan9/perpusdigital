<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data kategori
        $data = Kategori::all();
        return view('kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ke form kategori
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //simpan data kategori
        $request->validate(
            [
                'nama_kategori' => 'required|unique:kategoris,nama_kategori',
                'deskripsi' => 'required'
            ],[
                'nama_kategori.required|required|unique' => 'Nama Katagori Sudah terdaftar',
                'deskripsi.required' => 'Deskripsi masih kosong'
            ]
        );

        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //menuju ke form edit
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //proses edit
        $request->validate([
            'nama_kategori' => 'required|unique:kategori,name,' . $kategori->id,
            'deskripsi' => 'required'
        ]);

        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //menghapus data kategori
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
