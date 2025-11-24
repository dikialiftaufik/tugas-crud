@extends('layouts.app')
@section('title', 'Data Nilai')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        @if(Auth::user()->role == 'Mahasiswa') Nilai Saya @else Data Nilai Mahasiswa @endif
    </h1>
    
    {{-- Tombol Tambah HANYA Admin & Dosen --}}
    @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Dosen')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/input_nilai" class="btn btn-sm btn-primary">
            <i class="bi bi-plus-lg"></i> Input Nilai
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
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai</th>
                        {{-- Aksi HANYA Admin & Dosen --}}
                        @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Dosen')
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($nilai as $index => $n)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $n->mahasiswa->NIM ?? '-' }}</td>
                        <td>{{ $n->mahasiswa->nama ?? '-' }}</td>
                        <td>{{ $n->matakuliah->nama_mk ?? '-' }}</td>
                        <td>{{ $n->matakuliah->sks ?? '-' }}</td>
                        <td>
                            <span class="badge bg-success fs-6">{{ $n->nilai }}</span>
                        </td>
                        
                        @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Dosen')
                        <td class="text-center">
                            <a href="/edit_nilai/{{ $n->id_nilai }}" class="btn btn-warning btn-sm text-white">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="/hapus_nilai/{{ $n->id_nilai }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus nilai ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data nilai.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection