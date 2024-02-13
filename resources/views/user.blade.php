@if (Auth::user()->role == 'admin')
    <h1>Halaman admin</h1>
    <a href="/logout">Logout</a>
@endif
@if (Auth::user()->role == 'petugas')
    <h1>Halaman Petugas</h1>
    <a href="/logout">Logout</a>
@endif
@if (Auth::user()->role == 'member')
    <h1>Halaman Member</h1>
    <a href="/logout">Logout</a>
@endif