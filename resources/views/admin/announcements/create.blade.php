@extends('layouts.admin')

@section('title', 'Tambah Pengumuman')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Tambah Pengumuman</h2>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.announcements.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">
                <label>Judul</label>

                <input type="text"
                       name="title"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">

                <label>Isi Pengumuman</label>

                <textarea name="content"
                          rows="6"
                          class="form-control"></textarea>

            </div>

            <div class="mb-3">

                <label>Tanggal Mulai</label>

                <input type="datetime-local"
                       name="start_date"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Tanggal Selesai</label>

                <input type="datetime-local"
                       name="end_date"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="active">
                        Aktif
                    </option>

                    <option value="inactive">
                        Tidak Aktif
                    </option>

                </select>

            </div>

            <button class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('admin.announcements.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection