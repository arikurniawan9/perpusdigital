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
    <a href="{{ route('kategori.index')}}">Kembali</a>
<form action="{{ route('kategori.update',$kategori->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nama_kategori">Nama Kategori:</label>
    <input type="text" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>

    <input type="submit" value="Ubah">
</form>