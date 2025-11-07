@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">@yield('page-title')</h1>
    <a href="@yield('create-url')" class="btn btn-dark btn-sm">+ Tambah Data</a>
</div>

<table class="table table-striped table-dark table-sm">
    <thead>
        <tr>
            @yield('table-headers')
        </tr>
    </thead>
    <tbody>
        @yield('table-rows')
    </tbody>
</table>
@endsection