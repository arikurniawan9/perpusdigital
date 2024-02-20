<h1>DATA KATEGORI</h1>
@if (session('success'))
<div>
    {{ session('success') }}
</div>
@endif
<a href="{{ route('kategori.create') }}">Tambah Data</a>
<table border="1">
    <tr>
        <th>NO</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>
    @foreach ($data as $item)
    <tr>
        <td> {{$loop->iteration}} </td>
        <td> {{$item->nama_kategori}} </td>
        <td>
            <a href="{{ route('kategori.edit', $item->id) }}">Ubah</a>
            <form method="POST" action="{{ route('kategori.destroy', $item->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Kamu yakin ingin menghapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
