<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class MahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // LOGIKA: 
        // Jika Mahasiswa, hanya ambil data dirinya sendiri berdasarkan email login.
        // Jika Admin/Dosen, ambil semua data.
        
        if ($user->role == 'Mahasiswa') {
            $mahasiswa = Mahasiswa::where('email', $user->email)->with('prodi')->get();
        } else {
            $mahasiswa = Mahasiswa::with('prodi')->get();
        }

        return view('mahasiswa', compact('mahasiswa'));
    }

    public function input() { return view('input_mahasiswa'); }


    public function simpan(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa');
    }

    public function hapus($NIM)
    {
        $mhs = Mahasiswa::find($NIM);
        $mhs->delete();
        return redirect('/mahasiswa');
    }

    public function edit($NIM)
    {
        $data = Mahasiswa::find($NIM);
        return view('edit_mahasiswa', compact('data'));
    }

    public function update(Request $request)
    {
        $mhs = Mahasiswa::find($request->NIM);
        $mhs->update($request->all());
        return redirect('/mahasiswa');
    }
}