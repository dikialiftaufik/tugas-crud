@extends('layouts.index')

@section('title', 'Data Nilai')
@section('page-title', 'Data Nilai')
@section('create-url', '/input_nilai')

@section('table-headers')
    <th>NIM</th>
    <th>Nama Mahasiswa</th>
    <th>Mata Kuliah</th>
    <th>Nilai</th>
    <th width="150">Action</th>
@endsection

@section('table-rows')
    @foreach ($nilai as $n)
        <tr>
            <td>{{$n->mahasiswa->NIM}}</td>
            <td>{{$n->mahasiswa->nama}}</td>
            <td>{{$n->mataKuliah->nama_mk}}</td>
            <td>{{$n->nilai}}</td>
            <td>
                <a href="/edit_nilai/{{ $n->id_nilai }}" class="btn btn-light btn-action">Edit</a>
                <a href="/hapus_nilai/{{ $n->id_nilai }}" class="btn btn-light btn-action" onclick="return confirm('Are you sure?')">Hapus</a>
            </td>
        </tr>
    @endforeach
@endsection