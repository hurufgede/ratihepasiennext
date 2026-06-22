@extends('layouts.admin')

@section('content')

<h2>Tambah Dokter</h2>

<form
    action="{{ route('admin.doctors.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

@csrf

<div class="mb-3">
    <label>Poliklinik</label>

    <select name="polyclinic_id" class="form-control">

        <option value="">
            Pilih Poliklinik
        </option>

        @foreach($polyclinics as $polyclinic)

            <option value="{{ $polyclinic->id }}">
                {{ $polyclinic->name }}
            </option>

        @endforeach

    </select>
</div>

<div class="mb-3">
    <label>Kode</label>
    <input type="text" name="code" class="form-control">
</div>

<div class="mb-3">
    <label>Nama Dokter</label>
    <input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
    <label>Spesialis</label>
    <input type="text" name="specialist" class="form-control">
</div>

<div class="mb-3">
    <label>Foto</label>
    <input type="file" name="photo" class="form-control">
</div>

<div class="mb-3">
    <label>Deskripsi</label>

    <textarea
        name="description"
        rows="5"
        class="form-control"
    ></textarea>
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