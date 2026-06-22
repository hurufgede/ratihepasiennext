@extends('layouts.admin')

@section('title', 'Detail Layanan')

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
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .info-row {
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 1.25rem;
    }
    .info-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .info-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 700;
        color: #94a3b8;
        margin-bottom: 0.5rem;
    }

    .info-value {
        font-size: 0.95rem;
        color: #0f172a;
        font-weight: 500;
        line-height: 1.6;
    }

    .desc-box {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 1rem 1.25rem;
        color: #334155;
    }

    .detail-image {
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        max-width: 100%;
        height: auto;
        display: block;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
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
    <div class="info-grid">
        <div class="info-row">
            <div class="info-label">Judul Layanan</div>
            <div class="info-value" style="font-size: 1.25rem; font-weight: 800; color: #4f46e5;">
                {{ $service->title }}
            </div>
        </div>

        <div class="info-row">
            <div class="info-label">Slug URL</div>
            <div class="info-value" style="font-family: monospace; color: #64748b;">
                {{ $service->slug }}
            </div>
        </div>

        <div class="info-row">
            <div class="info-label">Deskripsi Layanan</div>
            <div class="info-value desc-box">
                {{ $service->description ? $service->description : 'Tidak ada deskripsi penjelas.' }}
            </div>
        </div>

        <div class="info-row">
            <div class="info-label">Gambar / Banner Ilustrasi</div>
            <div class="info-value" style="margin-top: 0.5rem;">
                @if($service->image)
                    <img src="{{ asset('storage/'.$service->image) }}" class="detail-image" width="320" alt="Gambar Layanan">
                @else
                    <span style="color: #94a3b8; font-style: italic; font-size: 0.875rem;">Tidak ada gambar terlampir</span>
                @endif
            </div>
        </div>

        <div class="info-row">
            <div class="info-label">Status Sistem</div>
            <div class="info-value">
                <span class="status-badge {{ $service->status == 'active' ? 'badge-active' : 'badge-inactive' }}">
                    {{ $service->status == 'active' ? 'Aktif Terbuka' : 'Tidak Aktif' }}
                </span>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.services.index') }}" class="btn-back">
        &larr; Kembali ke Daftar
    </a>
</div>
@endsection