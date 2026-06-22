@extends('layouts.admin')

@section('content')

<h2>Tambah Poliklinik</h2>

<form action="{{ route('admin.polyclinics.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Kode</label>
        <input type="text" name="code" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama Poliklinik</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Lokasi</label>
        <input type="text" name="location" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>

        <select name="status" class="form-control">
            <option value="active">Aktif</option>
            <option value="inactive">Tidak Aktif</option>
        </select>
    </div>

    <button class="btn btn-primary">
        Simpan
    </button>

</form>

@endsection