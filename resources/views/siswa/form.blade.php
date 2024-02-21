<!-- resources/views/siswa/form.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        {{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($siswa) ? route('siswa.update', $siswa->id) : route('siswa.store') }}" method="POST">
                            @csrf
                            @if (isset($siswa))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ isset($siswa) ? $siswa->nama : old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control" value="{{ isset($siswa) ? $siswa->kelas : old('kelas') }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control">{{ isset($siswa) ? $siswa->alamat : old('alamat') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ isset($siswa) ? 'Update' : 'Simpan' }}</button>
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
