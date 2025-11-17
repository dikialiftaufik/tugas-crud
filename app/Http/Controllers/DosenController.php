<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DosenController extends Controller
{
    public function index()
    {
        $data_dosen = Dosen::all();
        return view('dosen', ['dosen' => $data_dosen]);
    }

    public function input()
    {
        return view('input_dosen');
    }

    public function simpan(Request $a)
    {

        $namaFile = null;

        // proses upload foto
        if ($a->hasFile('foto')) {
            $file = $a->file('foto'); // cara nangkap inputan berupa file
            $namaFile = time() . ' _ ' . $file->getClientOriginalName();
            $file->move(public_path('images'), $namaFile); // file diupload ke folder images    
        }

        Dosen::create(
            [
                'NIP' => $a->NIP,
                'nama' => $a->nama,
                'email' => $a->email,
                'foto' => $namaFile
            ]
        );
        return redirect('/dosen');
    }

    function hapus($NIP)
    {
        $data_dosen = Dosen::find($NIP);

        if ($data_dosen->foto) {
            $path = public_path('/images/' . $data_dosen->foto);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $data_dosen->delete();

        return redirect('/dosen');
    }

    function edit($NIP)
    {
        $data_dosen = Dosen::find($NIP);
        return view('edit_dosen', compact('data_dosen'));
    }

    function update(Request $a)
    {

        $dsn = Dosen::findOrFail($a->NIP);

        if ($a->hasFile('foto')) {
            if ($dsn->foto) {
                $oldPath = public_path('/images/' . $dsn->foto);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }


        $file = $a->file('foto');
        $namaFile = time() . ' _ ' . $file->getClientOriginalName();
        $file->move(public_path('images'), $namaFile);
        }else{
            $namaFile = $dsn->foto;
        }

        Dosen::where('NIP', $a->NIP)->update(
            [
                'NIP' => $a->NIP,
                'nama' => $a->nama,
                'email' => $a->email,
                'foto' => $namaFile
            ]
        );
        return redirect('/dosen');
    }
}
