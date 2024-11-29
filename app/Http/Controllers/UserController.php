<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Fungsi untuk memperbarui profil pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        // Memperbarui nama dan email pengguna yang sedang login
        auth()->user()->update($request->only('name', 'email'));

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully!');
    }
}

