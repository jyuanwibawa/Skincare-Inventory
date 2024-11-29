<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard'); // Ganti dengan route dashboard admin
        }
    
        return redirect()->route('user.dashboard'); // Ganti dengan route dashboard pengguna
    }
    
}
