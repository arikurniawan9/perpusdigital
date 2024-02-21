<!-- resources/views/peminjaman/form.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        {{ isset($peminjaman) ? 'Edit Peminjaman' : 'Tambah Peminjaman' }}
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($peminjaman) ? route('peminjaman.update', $peminjaman->id) : route('peminjaman.store') }}" method="POST">
                            @csrf
                            @if (isset($peminjaman))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="user_id">Member</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($users as $s)
                                        <option value="{{ $s->id }}" {{ isset($peminjaman) && $peminjaman->user_id == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="buku_id">Buku</label>
                                <select name="buku_id" id="buku_id" class="form-control">
                                    @foreach ($buku as $b)
                                        <option value="{{ $b->id }}" {{ isset($peminjaman) && $peminjaman->buku_id == $b->id ? 'selected' : '' }}>{{ $b->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ isset($peminjaman) ? $peminjaman->tanggal_pinjam : old('tanggal_pinjam') }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kembali">Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ isset($peminjaman) ? $peminjaman->tanggal_kembali : old('tanggal_kembali') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ isset($peminjaman) ? 'Update' : 'Simpan' }}</button>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
