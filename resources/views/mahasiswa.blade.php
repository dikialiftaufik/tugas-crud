@extends('layouts.index')

@section('title', 'Data Mahasiswa')
@section('page-title', 'Data Mahasiswa')
@section('create-url', '/input_mhs')


@section('table-headers')
    <th>NIM</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Prodi</th>
    <th>Foto</th>
    <th width="150">Action</th>
@endsection

@section('table-rows')
<a href="/logout">Logout</a>
    @foreach ($mhs as $x)
        <tr>
            <td>{{$x->NIM}}</td>
            <td>{{$x->nama}}</td>
            <td>{{$x->email}}</td>
            
            <td>{{ $x->prodi ? $x->prodi->nama_prodi : 'Prodi Tidak Ditemukan' }}</td>
            <td><img src="/images/{{ $x->foto }}" width="100"></td>

            <td>
                <a href="/edit_mhs/{{ $x->NIM }}" class="btn btn-success btn-action">Edit</a>
                <a href="/hapus_mhs/{{ $x->NIM }}" class="btn btn-danger btn-action">Hapus</a>
            </td>
        </tr>
    @endforeach
@endsection