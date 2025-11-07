@extends('layouts.index')

@section('title', 'Data Mahasiswa')
@section('page-title', 'Data Mahasiswa')
@section('create-url', '/input_mhs')

@section('table-headers')
    <th>NIM</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Prodi</th>
    <th width="150">Action</th>
@endsection

@section('table-rows')
    @foreach ($mhs as $x)
        <tr>
            <td>{{$x->NIM}}</td>
            <td>{{$x->nama}}</td>
            <td>{{$x->email}}</td>
            <td>{{$x->id_prodi}}</td>
            <td>
                <a href="/edit_mhs/{{ $x->NIM }}" class="btn btn-light btn-action">Edit</a>
                <a href="/hapus_mhs/{{ $x->NIM }}" class="btn btn-light btn-action">Hapus</a>
            </td>
        </tr>
    @endforeach
@endsection