<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
         $namaFile = null;

        // proses upload berkas (PDF, doc, dll.) ke public/dokumen
        if ($request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $namaFile = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('dokumen'), $namaFile);
        }

        $nilai = new Nilai();
        $nilai->NIM = $request->NIM;
        $nilai->id_mk = $request->id_mk;
        $nilai->nilai = $request->nilai;
        $nilai->berkas = $namaFile;
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
        $nilai = Nilai::findOrFail($id);

        // jika ada upload file baru, hapus file lama lalu simpan file baru
        if ($request->hasFile('berkas')) {
            if ($nilai->berkas) {
                $oldPath = public_path('dokumen/' . $nilai->berkas);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $file = $request->file('berkas');
            $namaFile = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('dokumen'), $namaFile);
            $nilai->berkas = $namaFile;
        }

        $nilai->NIM = $request->NIM;
        $nilai->id_mk = $request->id_mk;
        $nilai->nilai = $request->nilai;
        $nilai->save();

        return redirect('/nilai');
    }

    public function hapus($id)
    {
         $nilai = Nilai::findOrFail($id);

        // hapus berkas terkait jika ada
        if ($nilai->berkas) {
            $path = public_path('dokumen/' . $nilai->berkas);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $nilai->delete();

        return redirect('/nilai');
    }
}