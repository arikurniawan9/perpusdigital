<!-- resources/views/peminjaman/pengembalian_form.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Pengembalian Buku
                    </div>
                    <div class="card-body">
                        <form action="{{ route('peminjaman.kembalikan', $peminjaman->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" value="{{ old('tanggal_pengembalian') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Kembalikan</button>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
