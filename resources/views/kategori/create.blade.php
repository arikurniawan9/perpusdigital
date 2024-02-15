@if ($errors->any())
        <div>
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <label for="nama_kategori">Nama Kategori:</label>
    <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }} required>

    <label for="deskripsi">Deskripsi:</label>
    <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }} required>

    <input type="submit" value="Simpan">
</form>