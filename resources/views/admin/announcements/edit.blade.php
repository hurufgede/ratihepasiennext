@extends('layouts.admin')

@section('title', 'Edit Pengumuman')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Edit Pengumuman</h2>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.announcements.update',$announcement->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Judul</label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ $announcement->title }}"
                       required>

            </div>

            <div class="mb-3">

                <label>Isi Pengumuman</label>

                <textarea name="content"
                          rows="6"
                          class="form-control">{{ $announcement->content }}</textarea>

            </div>

            <div class="mb-3">

                <label>Tanggal Mulai</label>

                <input type="datetime-local"
                       name="start_date"
                       class="form-control"
                       value="{{ $announcement->start_date ? \Carbon\Carbon::parse($announcement->start_date)->format('Y-m-d\TH:i') : '' }}">

            </div>

            <div class="mb-3">

                <label>Tanggal Selesai</label>

                <input type="datetime-local"
                       name="end_date"
                       class="form-control"
                       value="{{ $announcement->end_date ? \Carbon\Carbon::parse($announcement->end_date)->format('Y-m-d\TH:i') : '' }}">

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="active"
                        {{ $announcement->status == 'active' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="inactive"
                        {{ $announcement->status == 'inactive' ? 'selected' : '' }}>
                        Tidak Aktif
                    </option>

                </select>

            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.announcements.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection