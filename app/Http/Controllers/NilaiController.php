<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'Mahasiswa') {
            // 1. Cari data mahasiswa berdasarkan email user yang login
            $mhs = Mahasiswa::where('email', $user->email)->first();

            // 2. Jika data mahasiswa ditemukan, ambil nilai berdasarkan NIM-nya
            if ($mhs) {
                $nilai = Nilai::where('NIM', $mhs->NIM)->with(['mahasiswa', 'matakuliah'])->get();
            } else {
                // Jika tidak ada data mahasiswa yang cocok dengan email login
                $nilai = []; 
            }
        } else {
            // Admin & Dosen melihat semua nilai
            $nilai = Nilai::with(['mahasiswa', 'matakuliah'])->get();
        }

        return view('nilai', compact('nilai'));
    }

    // ... method input, simpan, edit, update, hapus biarkan standar
    public function input() { return view('input_nilai'); }
    
    public function simpan(Request $request) {
        Nilai::create($request->all());
        return redirect('/nilai');
    }

    public function edit($id) {
        $data = Nilai::find($id);
        return view('edit_nilai', compact('data'));
    }

    public function update(Request $request, $id) {
        $nilai = Nilai::find($id);
        $nilai->update($request->all());
        return redirect('/nilai');
    }

    public function hapus($id) {
        $nilai = Nilai::find($id);
        $nilai->delete();
        return redirect('/nilai');
    }
}