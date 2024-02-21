<!-- resources/views/peminjaman/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Detail Peminjaman
                    </div>
                    <div class="card-body">
                        <p><strong>Nama Member:</strong> {{ $peminjaman->user->name }}</p>
                        <p><strong>Buku:</strong> {{ $peminjaman->buku->judul }}</p>
                        <p><strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_pinjam }}</p>
                        <p><strong>Tanggal Kembali:</strong> {{ $peminjaman->tanggal_kembali }}</p>
                        @if ($peminjaman->tanggal_pengembalian)
                            <p><strong>Tanggal Pengembalian:</strong> {{ $peminjaman->tanggal_pengembalian }}</p>
                            <p><strong>Status Pengembalian:</strong> Sudah dikembalikan</p>
                        @else
                            <p><strong>Status Pengembalian:</strong> <p class="text-danger">Belum dikembalikan</p></p>
                            <!-- Perbarui link untuk menggunakan metode PUT -->
                            <form action="{{ route('peminjaman.kembalikan', $peminjaman->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
                            </form>
                        @endif
                        @if ($peminjaman->tanggal_pengembalian && $peminjaman->denda > 0)
                            <p><strong>Denda:</strong> Rp {{ number_format($peminjaman->denda, 2) }}</p>
                        @endif
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
