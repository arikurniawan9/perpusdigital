<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('member.index', compact('bukus'));
    }
    public function show(User $user)
    {
        return view('member.show', compact('user'));
    }
    
    public function edit(User $user)
    {
        return view('member.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $user->update($request->all());

        return redirect()->route('member.edit', $user)->with('success', 'User updated successfully.');
    }
}
