<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    function index() {
        return view('home');
    }
    function admin() {
        return view('home');
    }
    function petugas() {
        return view('home');
    }
    function member() {
        // echo "Hello Member";
        $bukus = Buku::all();
        return view('member.index', compact('bukus'));
    }
}
