@extends('layouts.admin')

@section('content')

<h2>Detail Dokter</h2>

<table class="table table-bordered">

    <tr>
        <th>Foto</th>
        <td>

            @if($doctor->photo)

                <img
                    src="{{ asset('storage/'.$doctor->photo) }}"
                    width="150"
                >

            @endif

        </td>
    </tr>

    <tr>
        <th>Kode</th>
        <td>{{ $doctor->code }}</td>
    </tr>

    <tr>
        <th>Nama</th>
        <td>{{ $doctor->name }}</td>
    </tr>

    <tr>
        <th>Poliklinik</th>
        <td>{{ $doctor->polyclinic->name }}</td>
    </tr>

    <tr>
        <th>Spesialis</th>
        <td>{{ $doctor->specialist }}</td>
    </tr>

    <tr>
        <th>Deskripsi</th>
        <td>{{ $doctor->description }}</td>
    </tr>

    <tr>
        <th>Status</th>
        <td>{{ $doctor->status }}</td>
    </tr>

</table>

@endsection