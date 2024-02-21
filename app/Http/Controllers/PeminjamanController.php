<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Menampilkan semua peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::whereNull('tanggal_pengembalian')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    // Menampilkan form untuk menambahkan peminjaman baru
    public function create()
    {
        // $siswa = Siswa::all();
        $users = User::where('role', 'member')->get();
        $buku = Buku::all();
        return view('peminjaman.form', compact('users', 'buku'));
    }

    // Menyimpan peminjaman baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        Peminjaman::create($validatedData);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    // Menampilkan detail peminjaman
    public function show(Peminjaman $peminjaman)
    {
        return view('peminjaman.show', compact('peminjaman'));
    }

    // Menampilkan form untuk mengedit peminjaman
    public function edit(Peminjaman $peminjaman)
    {
        // $siswa = Siswa::all();
        $users = User::where('role', 'member')->get();
        $buku = Buku::all();
        return view('peminjaman.form', compact('peminjaman', 'users', 'buku'));
    }

    // Menyimpan perubahan pada peminjaman
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        $peminjaman->update($validatedData);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    // Menghapus peminjaman
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }

    // Menampilkan form untuk mengembalikan buku
    public function pengembalian()
    {
        $pengembalian = Peminjaman::whereNotNull('tanggal_pengembalian')->get();
        return view('peminjaman.pengembalian', compact('pengembalian'));
    }
    public function pengembalianform()
    {
        $pengembalian = Peminjaman::whereNotNull('tanggal_pengembalian')->get();
        return view('peminjaman.pengembalian_form', compact('pengembalian'));
    }

    // Metode untuk mengembalikan buku
    public function kembalikanBuku(Request $request, Peminjaman $peminjaman)
    {
        // Lakukan validasi atau operasi lain yang dibutuhkan untuk proses pengembalian buku
        // Misalnya, menghitung denda jika terlambat mengembalikan
        $tanggalPengembalian = now();
        $peminjaman->tanggal_pengembalian = $tanggalPengembalian;
        
        // Hitung jumlah hari keterlambatan
        $tanggalKembali = Carbon::parse($peminjaman->tanggal_kembali);
        $hariKeterlambatan = $tanggalKembali->diffInDays($tanggalPengembalian, false);

        // Hitung denda (misalnya, setiap hari keterlambatan dikenakan denda Rp 2000)
        $denda = $hariKeterlambatan > 0 ? $hariKeterlambatan * 2000 : 0;
        $peminjaman->denda = $denda;
        // Menghapus angka nol di belakang koma
        $denda = number_format($denda, 2, '.', '');
        
        $peminjaman->denda = $denda;

        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dikembalikan.');
    }
}
