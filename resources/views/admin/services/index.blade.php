@extends('layouts.admin')

@section('title', 'Data Layanan')

@section('content')
<style>
    /* Header UI */
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

    /* Alert Banner */
    .alert-banner {
        padding: 1rem 1.25rem;
        background-color: #dcfce7;
        border: 1px solid #bbf7d0;
        color: #15803d;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    /* Table Component */
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
    .custom-table tr:last-child td {
        border-bottom: none;
    }

    /* Rounded Thumbnail */
    .table-thumb {
        width: 64px;
        height: 44px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        display: block;
    }
    .no-thumb {
        color: #cbd5e1;
        font-size: 1.25rem;
    }

    /* Status Badges */
    .status-badge {
        display: inline-flex;
        padding: 0.25rem 0.6rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: capitalize;
    }
    .badge-active {
        background-color: #dcfce7;
        color: #16a34a;
    }
    .badge-inactive {
        background-color: #fee2e2;
        color: #dc2626;
    }

    /* Action triggers */
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

    .pagination-wrapper {
        margin-top: 1.5rem;
    }
</style>

<div class="view-header">
    <h2 class="view-title">Data Layanan Medis</h2>
    <a href="{{ route('admin.services.create') }}" class="btn-create">
        <span style="margin-right: 0.5rem;">➕</span> Tambah Layanan
    </a>
</div>

@if(session('success'))
<div class="alert-banner">
    ✨ {{ session('success') }}
</div>
@endif

<div class="table-card">
    <div style="overflow-x: auto;">
        <table class="custom-table">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 100px;">Gambar</th>
                    <th>Judul Layanan</th>
                    <th>Slug URL</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 220px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td style="font-weight: 700; color: #94a3b8;">{{ $loop->iteration }}</td>
                    <td>
                        @if($service->image)
                            <img src="{{ asset('storage/'.$service->image) }}" class="table-thumb" alt="Layanan">
                        @else
                            <span class="no-thumb">🖼️</span>
                        @endif
                    </td>
                    <td style="font-weight: 600; color: #0f172a;">{{ $service->title }}</td>
                    <td style="font-family: monospace; color: #64748b; font-size: 0.8rem;">{{ $service->slug }}</td>
                    <td>
                        <span class="status-badge {{ $service->status == 'active' ? 'badge-active' : 'badge-inactive' }}">
                            {{ $service->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td>
                        <div class="actions-cell" style="justify-content: center;">
                            <a href="{{ route('admin.services.show', $service->id) }}" class="action-btn btn-info-sm">Detail</a>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="action-btn btn-warning-sm">Edit</a>
                            
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-danger-sm" onclick="return confirm('Yakin hapus data?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 3rem; color: #94a3b8; font-weight: 500;">
                        📭 Belum ada data layanan medis tersedia.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
    <div class="pagination-wrapper">
        {{ $services->links() }}
    </div>
    @endif
</div>
@endsection