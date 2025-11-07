<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

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
        Dosen::create(
            [
                'NIP' => $a->NIP,
                'nama' => $a->nama,
                'email' => $a->email,
            ]
        );
        return redirect('/dosen');
    }

    function hapus($NIP)
    {
        $data_dosen = Dosen::find($NIP);
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
        Dosen::where('NIP', $a->NIP)->update(
            [
                'NIP' => $a->NIP,
                'nama' => $a->nama,
                'email' => $a->email,
            ]
        );
        return redirect('/dosen');
    }
}
