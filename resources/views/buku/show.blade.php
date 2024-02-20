<!-- resources/views/buku/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Detail Buku</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Judul</th>
                                <td>{{ $buku->judul }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $buku->kategori->nama }}</td>
                            </tr>
                            <tr>
                                <th>Pengarang</th>
                                <td>{{ $buku->pengarang }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td>{{ $buku->tahun_terbit }}</td>
                            </tr>
                            <tr>
                                <th>Gambar</th>
                                <td>
                                    @if ($buku->gambar)
                                        <img src="{{ asset('storage/images/'.$buku->gambar) }}" alt="{{ $buku->judul }}" style="max-width: 200px;">
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
