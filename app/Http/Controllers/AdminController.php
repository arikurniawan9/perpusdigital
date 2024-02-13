<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    function index() {
        return view('user');
    }
    function admin() {
        return view('user');
    }
    function petugas() {
        return view('user');
    }
    function member() {
        return view('user');
    }
}
