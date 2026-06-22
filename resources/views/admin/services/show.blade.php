@extends('layouts.admin')

@section('title', 'Detail Layanan')

@section('content')

<h1>Detail Layanan</h1>

<div class="card">

    <div class="mb-3">
        <strong>Judul</strong>
        <p>{{ $service->title }}</p>
    </div>

    <div class="mb-3">
        <strong>Slug</strong>
        <p>{{ $service->slug }}</p>
    </div>

    <div class="mb-3">
        <strong>Deskripsi</strong>
        <p>{{ $service->description }}</p>
    </div>

    <div class="mb-3">

        <strong>Gambar</strong>

        <br>

        @if($service->image)

            <img
                src="{{ asset('storage/'.$service->image) }}"
                width="250"
                alt=""
            >

        @else

            Tidak ada gambar

        @endif

    </div>

    <div class="mb-3">
        <strong>Status</strong>
        <p>{{ $service->status }}</p>
    </div>

    <a
        href="{{ route('admin.services.index') }}"
        class="btn btn-secondary"
    >
        Kembali
    </a>

</div>

@endsection