@extends('layouts.admin')

@section('content')

<h2>Detail Poliklinik</h2>

<table class="table table-bordered">

    <tr>
        <th>Kode</th>
        <td>{{ $polyclinic->code }}</td>
    </tr>

    <tr>
        <th>Nama</th>
        <td>{{ $polyclinic->name }}</td>
    </tr>

    <tr>
        <th>Slug</th>
        <td>{{ $polyclinic->slug }}</td>
    </tr>

    <tr>
        <th>Lokasi</th>
        <td>{{ $polyclinic->location }}</td>
    </tr>

    <tr>
        <th>Status</th>
        <td>{{ $polyclinic->status }}</td>
    </tr>

</table>

<a href="{{ route('admin.polyclinics.index') }}" class="btn btn-secondary">
    Kembali
</a>

@endsection