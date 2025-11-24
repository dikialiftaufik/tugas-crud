@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- ADMIN & DOSEN: Tampilkan Tabel Mahasiswa --}}
@if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Dosen')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Mahasiswa</h1>
        
        {{-- Tombol Tambah HANYA untuk Admin --}}
        @if(Auth::user()->role == 'Admin')
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="/input_mhs" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Data
            </a>
        </div>
        @endif
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Prodi</th>
                            <th>Foto</th>
                            {{-- Kolom Aksi HANYA untuk Admin --}}
                            @if(Auth::user()->role == 'Admin')
                            <th class="text-center">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswa as $m)
                        <tr>
                            <td>{{ $m->NIM }}</td>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->email }}</td>
                            <td>{{ $m->prodi->nama_prodi ?? 'Tidak ada prodi' }}</td>
                            <td><span class="badge bg-secondary">No</span></td>
                            
                            {{-- Tombol Aksi HANYA untuk Admin --}}
                            @if(Auth::user()->role == 'Admin')
                            <td class="text-center">
                                <a href="/edit_mhs/{{ $m->NIM }}" class="btn btn-warning btn-sm text-white"><i class="bi bi-pencil-square"></i></a>
                                <a href="/hapus_mhs/{{ $m->NIM }}" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')"><i class="bi bi-trash"></i></a>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center text-muted">Belum ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

{{-- MAHASISWA: Tampilan Selamat Datang --}}
@else
    <div class="alert alert-success shadow-sm">
        <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p>Anda login sebagai Mahasiswa.</p>
        <hr>
        <p class="mb-0">Silakan pilih menu <strong>Biodata Saya</strong> untuk melihat data diri atau <strong>Nilai Saya</strong> untuk melihat transkrip nilai.</p>
    </div>
@endif

@endsection