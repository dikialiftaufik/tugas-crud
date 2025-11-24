@extends('layouts.app')
@section('title', 'Data Mahasiswa')

@section('content')

{{-- Judul Halaman --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        @if(Auth::user()->role == 'Mahasiswa') Biodata Saya @else Data Mahasiswa @endif
    </h1>
    
    {{-- Tombol Tambah HANYA muncul untuk Admin --}}
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
                        {{-- Kolom Aksi HANYA muncul untuk Admin --}}
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
                        <td>{{ $m->prodi->nama_prodi ?? '-' }}</td>
                        <td>
                            <span class="badge bg-secondary">No</span>
                        </td>
                        
                        {{-- Tombol Aksi HANYA muncul untuk Admin --}}
                        @if(Auth::user()->role == 'Admin')
                        <td class="text-center">
                            <a href="/edit_mhs/{{ $m->NIM }}" class="btn btn-warning btn-sm text-white">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="/hapus_mhs/{{ $m->NIM }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Data tidak ditemukan. (Pastikan email akun login sama dengan email di data mahasiswa)
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection