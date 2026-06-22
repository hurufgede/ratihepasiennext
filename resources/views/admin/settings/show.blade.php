@extends('layouts.admin')

@section('title', 'Detail Setting')

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

    .value-box {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 1rem 1.25rem;
        font-family: inherit;
        white-space: pre-wrap;
    }

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
            <div class="info-label">Key Pengaturan</div>
            <div class="info-value" style="font-family: monospace; font-weight: 700; color: #4f46e5; font-size: 1.1rem;">
                {{ $setting->key }}
            </div>
        </div>

        <div class="info-row">
            <div class="info-label">Value / Isi Nilai</div>
            <div class="info-value value-box">{!! nl2br(e($setting->value)) !!}</div>
        </div>

        <div class="info-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div>
                <div class="info-label">Tanggal Dibuat</div>
                <div class="info-value" style="color: #64748b;">{{ $setting->created_at->translatedFormat('d F Y, H:i') ?? $setting->created_at }}</div>
            </div>
            <div>
                <div class="info-label">Pembaruan Terakhir</div>
                <div class="info-value" style="color: #64748b;">{{ $setting->updated_at->translatedFormat('d F Y, H:i') ?? $setting->updated_at }}</div>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.settings.index') }}" class="btn-back">
        &larr; Kembali ke Daftar
    </a>
</div>
@endsection