<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['mahasiswa', 'mataKuliah'])->get();
        return view('nilai', ['nilai' => $nilai]);
    }

    public function input()
    {
        $mahasiswa = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        return view('input_nilai', [
            'mahasiswa' => $mahasiswa,
            'matakuliah' => $matakuliah
        ]);
    }

    public function simpan(Request $request)
    {
        $nilai = new Nilai();
        $nilai->NIM = $request->NIM;
        $nilai->id_mk = $request->id_mk;
        $nilai->nilai = $request->nilai;
        $nilai->save();

        return redirect('/nilai');
    }

    public function edit($id)
    {
        $nilai = Nilai::find($id);
        $mahasiswa = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        return view('edit_nilai', [
            'nilai' => $nilai,
            'mahasiswa' => $mahasiswa,
            'matakuliah' => $matakuliah
        ]);
    }

    public function update(Request $request, $id)
    {
        $nilai = Nilai::find($id);
        $nilai->NIM = $request->NIM;
        $nilai->id_mk = $request->id_mk;
        $nilai->nilai = $request->nilai;
        $nilai->save();

        return redirect('/nilai');
    }

    public function hapus($id)
    {
        $nilai = Nilai::find($id);
        $nilai->delete();

        return redirect('/nilai');
    }
}