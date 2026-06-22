@extends('layouts.admin')

@section('title', 'Data Pengumuman')

@section('content')
<style>
    .view-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    .view-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0f172a;
    }
    .btn-create {
        display: inline-flex;
        align-items: center;
        padding: 0.625rem 1.25rem;
        background-color: #4f46e5;
        color: #ffffff;
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);
        transition: background-color 0.2s;
    }
    .btn-create:hover {
        background-color: #4338ca;
    }
    .table-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 1.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
    }
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    .custom-table th {
        color: #64748b;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 700;
        padding: 1rem;
        border-bottom: 2px solid #e2e8f0;
    }
    .custom-table td {
        padding: 1rem;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        font-size: 0.875rem;
        vertical-align: middle;
    }
    .status-badge {
        display: inline-flex;
        padding: 0.25rem 0.6rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
    }
    .badge-active { background-color: #dcfce7; color: #16a34a; }
    .badge-inactive { background-color: #fee2e2; color: #dc2626; }
    
    .actions-cell {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .action-btn {
        padding: 0.4rem 0.75rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
    }
    .btn-info-sm { background-color: #f1f5f9; color: #334155; }
    .btn-info-sm:hover { background-color: #e2e8f0; }
    .btn-warning-sm { background-color: #fef9c3; color: #a16207; }
    .btn-warning-sm:hover { background-color: #fef08a; }
    .btn-danger-sm { background-color: #fee2e2; color: #b91c1c; }
    .btn-danger-sm:hover { background-color: #fecaca; }
    
    .pagination-wrapper { margin-top: 1.5rem; }
</style>

<div class="view-header">
    <h2 class="view-title">Data Pengumuman</h2>
    <a href="{{ route('admin.announcements.create') }}" class="btn-create">➕ Tambah Pengumuman</a>
</div>

<div class="table-card">
    <div style="overflow-x: auto;">
        <table class="custom-table">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Judul Pengumuman</th>
                    <th style="width: 160px;">Tanggal Mulai</th>
                    <th style="width: 160px;">Tanggal Selesai</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 220px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($announcements as $announcement)
                <tr>
                    <td style="font-weight: 700; color: #94a3b8;">{{ $loop->iteration }}</td>
                    <td style="font-weight: 600; color: #0f172a;">{{ $announcement->title }}</td>
                    <td>{{ $announcement->start_date ? \Carbon\Carbon::parse($announcement->start_date)->format('d M Y H:i') : '-' }}</td>
                    <td>{{ $announcement->end_date ? \Carbon\Carbon::parse($announcement->end_date)->format('d M Y H:i') : '-' }}</td>
                    <td>
                        <span class="status-badge {{ $announcement->status == 'active' ? 'badge-active' : 'badge-inactive' }}">
                            {{ $announcement->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td>
                        <div class="actions-cell" style="justify-content: center;">
                            <a href="{{ route('admin.announcements.show', $announcement->id) }}" class="action-btn btn-info-sm">Detail</a>
                            <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="action-btn btn-warning-sm">Edit</a>
                            <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-danger-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 3rem; color: #94a3b8;">📭 Data Pengumuman belum tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($announcements->hasPages())
    <div class="pagination-wrapper">
        {{ $announcements->links() }}
    </div>
    @endif
</div>
@endsection