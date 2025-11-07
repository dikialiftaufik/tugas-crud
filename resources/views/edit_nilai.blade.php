@extends('layouts.app')

@section('title', 'Edit Nilai')

@section('content')
<div class="container mt-4">
    <h1>Edit Data Nilai</h1>
    <div class="card">
        <div class="card-body">
            <form action="/update_nilai/{{ $nilai->id_nilai }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="NIM" class="form-label">Mahasiswa</label>
                    <select name="NIM" id="NIM" class="form-select" required>
                        <option value="">Pilih Mahasiswa</option>
                        @foreach ($mahasiswa as $m)
                            <option value="{{ $m->NIM }}" {{ $nilai->NIM == $m->NIM ? 'selected' : '' }}>
                                {{ $m->NIM }} - {{ $m->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_mk" class="form-label">Mata Kuliah</label>
                    <select name="id_mk" id="id_mk" class="form-select" required>
                        <option value="">Pilih Mata Kuliah</option>
                        @foreach ($matakuliah as $mk)
                            <option value="{{ $mk->id_mk }}" {{ $nilai->id_mk == $mk->id_mk ? 'selected' : '' }}>
                                {{ $mk->nama_mk }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai</label>
                    <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100" value="{{ $nilai->nilai }}" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/nilai" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection