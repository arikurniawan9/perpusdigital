<!-- resources/views/buku/form.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ isset($buku) ? 'Edit Buku' : 'Tambah Buku' }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ isset($buku) ? route('buku.update', $buku->id) : route('buku.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($buku))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="judul">Judul:</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ isset($buku) ? $buku->judul : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori:</label>
                                <select class="form-control" id="kategori_id" name="kategori_id">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}" {{ isset($buku) && $buku->kategori_id == $item->id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang:</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ isset($buku) ? $buku->pengarang : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit:</label>
                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ isset($buku) ? $buku->tahun_terbit : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ isset($buku) ? 'Simpan Perubahan' : 'Tambah Buku' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
