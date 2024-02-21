<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function (){
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::post('/',[SesiController::class,'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::get('/home', function () {
    return redirect('/home');
});
Route::middleware(['auth'])->group(function (){
    Route::get('/home',[AdminController::class,'index']);
    Route::get('/home/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/home/petugas',[AdminController::class,'petugas'])->middleware('userAkses:petugas');
    Route::get('/home/member',[AdminController::class,'member'])->middleware('userAkses:member');
    Route::get('/logout',[SesiController::class,'logout']);

    Route::resource('kategori',KategoriController::class);
    Route::resource('buku',BukuController::class)->middleware('userAkses:admin');
    Route::resource('siswa',SiswaController::class)->middleware('userAkses:admin');
    Route::resource('peminjaman',PeminjamanController::class)->middleware('userAkses:petugas');
    // Route untuk menampilkan daftar pengembalian
    Route::get('/pengembalian', [PeminjamanController::class, 'pengembalian'])->name('peminjaman.pengembalian')->middleware('userAkses:admin');
    
    // Route untuk mengembalikan buku
    Route::put('/kembalikan/{peminjaman}', [PeminjamanController::class, 'kembalikanBuku'])->name('peminjaman.kembalikan');
    
    // tambah
    Route::resource('kategori',KategoriController::class);
});

Route::resource('users',UsersController::class);
