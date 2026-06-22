@extends('layouts.admin')

@section('title', 'Data Pengumuman')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Data Pengumuman</h2>

    <a href="{{ route('admin.announcements.create') }}"
       class="btn btn-primary">
        Tambah Pengumuman
    </a>

</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($announcements as $announcement)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $announcement->title }}</td>

                    <td>{{ $announcement->start_date }}</td>

                    <td>{{ $announcement->end_date }}</td>

                    <td>
                        <span class="badge bg-{{ $announcement->status == 'active' ? 'success' : 'danger' }}">
                            {{ ucfirst($announcement->status) }}
                        </span>
                    </td>

                    <td>

                        <a href="{{ route('admin.announcements.show',$announcement->id) }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>

                        <a href="{{ route('admin.announcements.edit',$announcement->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.announcements.destroy',$announcement->id) }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Data belum tersedia
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

        {{ $announcements->links() }}

    </div>
</div>

@endsection