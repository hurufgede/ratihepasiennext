@extends('layouts.admin')

@section('title', 'Detail Pengumuman')

@section('content')
<style>
    .detail-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 2rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        max-width: 800px;
    }
    .info-grid {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        margin-bottom: 2rem;
    }
    .info-row {
        display: grid;
        grid-template-columns: 200px 1fr;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 1rem;
        align-items: center;
    }
    .info-row:last-child {
        border-bottom: none;
    }
    .info-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 700;
        color: #94a3b8;
    }
    .info-value {
        font-size: 0.95rem;
        color: #0f172a;
        font-weight: 600;
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
    
    .btn-back {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background-color: #ffffff;
        color: #64748b;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
    }
    .btn-back:hover {
        background-color: #f8fafc;
        color: #334155;
    }
</style>

<div class="detail-card">
    <h2 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1.5rem;">Detail Pengumuman</h2>
    
    <div class="info-grid">
        <div class="info-row">
            <div class="info-label">Judul Rilis</div>
            <div class="info-value" style="font-size: 1.2rem; font-weight: 800; color: #0f172a;">{{ $announcement->title }}</div>
        </div>
        <div class="info-row" style="align-items: flex-start;">
            <div class="info-label" style="padding-top: 0.25rem;">Isi Konten</div>
            <div class="info-value" style="font-weight: 400; line-height: 1.6; color: #334155;">
                {!! nl2br(e($announcement->content)) !!}
            </div>
        </div>
        <div class="info-row">
            <div class="info-label">Mulai Tayang</div>
            <div class="info-value" style="color: #475569;">
                {{ $announcement->start_date ? \Carbon\Carbon::parse($announcement->start_date)->format('d F Y - H:i') : 'Langsung Tayang' }}
            </div>
        </div>
        <div class="info-row">
            <div class="info-label">Selesai Tayang</div>
            <div class="info-value" style="color: #475569;">
                {{ $announcement->end_date ? \Carbon\Carbon::parse($announcement->end_date)->format('d F Y - H:i') : 'Selamanya' }}
            </div>
        </div>
        <div class="info-row">
            <div class="info-label">Status Distribusi</div>
            <div class="info-value">
                <span class="status-badge {{ $announcement->status == 'active' ? 'badge-active' : 'badge-inactive' }}">
                    {{ $announcement->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                </span>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.announcements.index') }}" class="btn-back">← Kembali ke Daftar</a>
</div>
@endsection