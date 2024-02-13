<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
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
});

Route::get('/home', function () {
    return redirect('/user');
});
Route::middleware(['auth'])->group(function (){
    Route::get('/user',[AdminController::class,'index']);
    Route::get('/user/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/user/petugas',[AdminController::class,'petugas'])->middleware('userAkses:petugas');
    Route::get('/user/member',[AdminController::class,'member'])->middleware('userAkses:member');
    Route::get('/logout',[SesiController::class,'logout']);
});
