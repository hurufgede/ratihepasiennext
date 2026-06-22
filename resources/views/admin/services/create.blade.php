@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')

<h1>Tambah Layanan</h1>

<form
    action="{{ route('admin.services.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    <div class="form-group">
        <label>Judul</label>

        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ old('title') }}"
        >
    </div>

    <div class="form-group">
        <label>Deskripsi</label>

        <textarea
            name="description"
            rows="5"
            class="form-control"
        >{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label>Gambar</label>

        <input
            type="file"
            name="image"
            class="form-control"
        >
    </div>

    <div class="form-group">
        <label>Status</label>

        <select
            name="status"
            class="form-control"
        >
            <option value="active">Aktif</option>
            <option value="inactive">Tidak Aktif</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">
        Simpan
    </button>

    <a
        href="{{ route('admin.services.index') }}"
        class="btn btn-secondary"
    >
        Kembali
    </a>

</form>

@endsection