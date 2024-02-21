<!-- resources/views/gallery.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($bukus as $buku)
        <div class="col-md-2">
            <div class="card mb-2 shadow-sm">
                <img src="{{ asset('storage/images/' . $buku->gambar) }}" class="card-img-top" width="100px" height="200px" alt="...">
                <div class="card-body">
                    <p class="card-text">{{ $buku->judul }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
