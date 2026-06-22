@extends('layouts.admin')

@section('title', 'Detail Jadwal Dokter')

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
    <h2 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1.5rem;">Detail Jadwal Dokter</h2>
    
    <div class="info-grid">
        <div class="info-row">
            <div class="info-label">Dokter</div>
            <div class="info-value" style="color: #4f46e5; font-size: 1.1rem;">{{ $schedule->doctor->name }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Poliklinik</div>
            <div class="info-value">{{ $schedule->polyclinic->name }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Hari Praktik</div>
            <div class="info-value">{{ $schedule->day }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Jam Operasional</div>
            <div class="info-value" style="font-family: monospace;">{{ $schedule->start_time }} - {{ $schedule->end_time }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Kuota Pasien</div>
            <div class="info-value">{{ $schedule->quota }} Pasien</div>
        </div>
        <div class="info-row">
            <div class="info-label">Status</div>
            <div class="info-value">
                <span class="status-badge {{ $schedule->status == 'active' ? 'badge-active' : 'badge-inactive' }}">
                    {{ $schedule->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                </span>
            </div>
        </div>
        <div class="info-row">
            <div class="info-label">Dibuat Pada</div>
            <div class="info-value" style="font-weight: 400; color: #64748b;">{{ $schedule->created_at }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Diperbarui Pada</div>
            <div class="info-value" style="font-weight: 400; color: #64748b;">{{ $schedule->updated_at }}</div>
        </div>
    </div>

    <a href="{{ route('admin.schedules.index') }}" class="btn-back">← Kembali ke Daftar</a>
</div>
@endsection