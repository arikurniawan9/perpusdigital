<!-- resources/views/buku/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Daftar Buku
                        <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm float-right">Tambah Buku</a>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($buku as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                    <td>{{ $item->pengarang }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>
                                        @if ($item->gambar)
                                            <img src="{{ asset('storage/images/'.$item->gambar) }}" alt="{{ $item->judul }}" style="max-width: 50px;" class="rounded">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('buku.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
