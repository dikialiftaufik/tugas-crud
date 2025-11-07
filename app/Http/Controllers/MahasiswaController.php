<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    function index()
    {
        $data_mhs = Mahasiswa::all();
        return view('mahasiswa', ['mhs' => $data_mhs]);
    }

    function input()
    {
    $data_prodi = Prodi::all(); // ambil semua data prodi
    return view('input_mahasiswa', compact('data_prodi'));
    }



    function simpan(Request $x)
    {
        Mahasiswa::create(
            [
                'NIM' => $x->nim,
                'nama' => $x->nama,
                'email' => $x->email,
                'id_prodi' => $x->prodi
            ]
        );
        return redirect('/mahasiswa');
    }

    function hapus($NIM)
    {
        $data_mhs = Mahasiswa::find($NIM);
        $data_mhs->delete();

        return redirect('/mahasiswa');
    }

    function edit($NIM)
    {
        $data_mhs = Mahasiswa::find($NIM);
        $data_prodi = Prodi::all();
        return view('/edit_mahasiswa', compact('data_mhs', 'data_prodi'));
    }

    function update(request $a)
    {
        Mahasiswa::where('NIM', $a->nim)->update(
            [
                'NIM' => $a->nim,
                'nama' => $a->nama,
                'email' => $a->email,
                'id_prodi' => $a->prodi
            ]
        );
        return redirect('/mahasiswa');
    }
}


