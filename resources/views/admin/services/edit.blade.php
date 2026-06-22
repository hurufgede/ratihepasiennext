@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')

<h1>Edit Layanan</h1>

<form
    action="{{ route('admin.services.update',$service->id) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Judul</label>

        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ old('title',$service->title) }}"
        >
    </div>

    <div class="form-group">
        <label>Deskripsi</label>

        <textarea
            name="description"
            rows="5"
            class="form-control"
        >{{ old('description',$service->description) }}</textarea>
    </div>

    <div class="form-group">

        <label>Gambar Lama</label>

        <br>

        @if($service->image)

            <img
                src="{{ asset('storage/'.$service->image) }}"
                width="150"
                alt=""
            >

        @else

            Tidak ada gambar

        @endif

    </div>

    <div class="form-group">
        <label>Ganti Gambar</label>

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

            <option
                value="active"
                {{ $service->status == 'active' ? 'selected' : '' }}
            >
                Aktif
            </option>

            <option
                value="inactive"
                {{ $service->status == 'inactive' ? 'selected' : '' }}
            >
                Tidak Aktif
            </option>

        </select>

    </div>

    <button type="submit" class="btn btn-primary">
        Update
    </button>

</form>

@endsection