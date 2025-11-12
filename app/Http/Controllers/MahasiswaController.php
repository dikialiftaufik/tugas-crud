<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class MahasiswaController extends Controller
{
    function index()
    {
        $data_mhs = Mahasiswa::with('prodi')->get();
        return view('mahasiswa', ['mhs' => $data_mhs]);
    }

    function input()
    {
    $data_prodi = Prodi::all(); // ambil semua data prodi
    return view('input_mahasiswa', compact('data_prodi'));
    }


    function simpan(Request $x)
    {

        $namaFile = null;

        // proses upload foto
        if ($x->hasFile('foto')) {
            $file = $x->file('foto'); // cara nangkap inputan berupa file
            $namaFile = time() . ' _ ' . $file->getClientOriginalName();
            $file->move(public_path('images'), $namaFile); // file diupload ke folder images    
        }

        Mahasiswa::create(
            [
                'NIM' => $x->nim,
                'nama' => $x->nama,
                'email' => $x->email,
                'id_prodi' => $x->prodi,
                'foto' => $namaFile
            ]
        );
        return redirect('/mahasiswa');
    }

    function hapus($NIM)
    {
        $data_mhs = Mahasiswa::find($NIM);

        if ($data_mhs->foto) {
            $path = public_path('/images/' . $data_mhs->foto);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

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

        $mhs = Mahasiswa::findOrFail($a->nim);

        if ($a->hasFile('foto')) {
            if ($mhs->foto) {
                $oldPath = public_path('/images/' . $mhs->foto);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }


        $file = $a->file('foto');
        $namaFile = time() . ' _ ' . $file->getClientOriginalName();
        $file->move(public_path('images'), $namaFile);
        }else{
            $namaFile = $mhs->foto;
        }

        Mahasiswa::where('NIM', $a->nim)->update(
            [
                'NIM' => $a->nim,
                'nama' => $a->nama,
                'email' => $a->email,
                'id_prodi' => $a->prodi,
                'foto' => $namaFile
            ]
        );
        return redirect('/mahasiswa');
    }
}