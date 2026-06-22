@extends('layouts.admin')

@section('content')

<h2>Edit Poliklinik</h2>

<form
    action="{{ route('admin.polyclinics.update',$polyclinic->id) }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kode</label>

        <input
            type="text"
            name="code"
            class="form-control"
            value="{{ $polyclinic->code }}"
        >
    </div>

    <div class="mb-3">
        <label>Nama</label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ $polyclinic->name }}"
        >
    </div>

    <div class="mb-3">
        <label>Lokasi</label>

        <input
            type="text"
            name="location"
            class="form-control"
            value="{{ $polyclinic->location }}"
        >
    </div>

    <div class="mb-3">
        <label>Status</label>

        <select name="status" class="form-control">

            <option
                value="active"
                {{ $polyclinic->status == 'active' ? 'selected' : '' }}
            >
                Aktif
            </option>

            <option
                value="inactive"
                {{ $polyclinic->status == 'inactive' ? 'selected' : '' }}
            >
                Tidak Aktif
            </option>

        </select>

    </div>

    <button class="btn btn-primary">
        Update
    </button>

</form>

@endsection