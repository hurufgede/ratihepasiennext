@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<style>
    /* Header Section */
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

    /* Table Container */
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
        padding: 1.25rem 1rem;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        font-size: 0.875rem;
    }
    .custom-table tr:last-child td {
        border-bottom: none;
    }
    .key-badge {
        font-family: monospace;
        background-color: #f1f5f9;
        color: #0f172a;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        font-weight: 600;
    }

    /* Action Buttons Inside Table */
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

    /* Pagination Wrapping Customization */
    .pagination-wrapper {
        margin-top: 1.5rem;
    }
</style>

<div class="view-header">
    <h2 class="view-title">Pengaturan Sistem</h2>
    <a href="{{ route('admin.settings.create') }}" class="btn-create">
        <span style="margin-right: 0.5rem;">➕</span> Tambah Setting
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
                    <th style="width: 80px;">No</th>
                    <th>Nama Kunci (Key)</th>
                    <th>Isi Nilai (Value)</th>
                    <th style="width: 240px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($settings as $setting)
                <tr>
                    <td style="font-weight: 700; color: #94a3b8;">{{ $loop->iteration }}</td>
                    <td>
                        <span class="key-badge">{{ $setting->key }}</span>
                    </td>
                    <td style="color: #64748b;">
                        {{ Str::limit($setting->value, 70) }}
                    </td>
                    <td>
                        <div class="actions-cell" style="justify-content: center;">
                            <a href="{{ route('admin.settings.show', $setting->id) }}" class="action-btn btn-info-sm">Detail</a>
                            <a href="{{ route('admin.settings.edit', $setting->id) }}" class="action-btn btn-warning-sm">Edit</a>
                            
                            <form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-danger-sm" onclick="return confirm('Yakin hapus setting ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 3rem; color: #94a3b8; font-weight: 500;">
                        📭 Belum ada data konfigurasi tersimpan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($settings->hasPages())
    <div class="pagination-wrapper">
        {{ $settings->links() }}
    </div>
    @endif
</div>
@endsection