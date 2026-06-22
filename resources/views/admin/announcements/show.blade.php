@extends('layouts.admin')

@section('title', 'Detail Pengumuman')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Detail Pengumuman</h2>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">Judul</th>
                <td>{{ $announcement->title }}</td>
            </tr>

            <tr>
                <th>Isi</th>
                <td>{!! nl2br(e($announcement->content)) !!}</td>
            </tr>

            <tr>
                <th>Tanggal Mulai</th>
                <td>{{ $announcement->start_date }}</td>
            </tr>

            <tr>
                <th>Tanggal Selesai</th>
                <td>{{ $announcement->end_date }}</td>
            </tr>

            <tr>
                <th>Status</th>

                <td>
                    <span class="badge bg-{{ $announcement->status == 'active' ? 'success' : 'danger' }}">
                        {{ ucfirst($announcement->status) }}
                    </span>
                </td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $announcement->created_at }}</td>
            </tr>

        </table>

        <a href="{{ route('admin.announcements.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection