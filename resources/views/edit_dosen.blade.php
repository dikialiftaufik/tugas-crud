@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')
<div class="container mt-4">
    <h1>Edit Data Dosen</h1>
    <div class="card">
        <div class="card-body">
            <form action="/update_dsn/{{ $data_dosen->NIP }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="NIP" class="form-label">NIP</label>
                    <input type="text" name="NIP" id="NIP" class="form-control" value="{{ $data_dosen->NIP }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $data_dosen->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $data_dosen->email }}" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/dosen" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection