<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = [];

        // Admin & Dosen: Melihat semua data mahasiswa di Dashboard
        if ($user->role == 'Admin' || $user->role == 'Dosen') {
            $mahasiswa = Mahasiswa::with('prodi')->get();
        }

        // Mahasiswa: Dashboard hanya greeting, data diambil di menu masing-masing
        
        return view('dashboard', compact('mahasiswa'));
    }
}