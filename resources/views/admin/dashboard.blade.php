@extends('layouts.admin')

@section('title', 'Overview Dashboard')

@section('content')
<style>
    /* Layout Utama Split */
    .split-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 1024px) {
        .split-container {
            grid-template-columns: 2.5fr 1fr; /* Kolom kiri lebih lebar */
        }
    }

    .main-column { display: flex; flex-direction: column; gap: 2rem; }
    .side-column { display: flex; flex-direction: column; gap: 1.5rem; }

    /* Gaya Card & Grid Mini di Kiri */
    .mini-stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; }
    .compact-card {
        background: white; padding: 1.25rem; border-radius: 12px;
        border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between;
    }
    .compact-info h4 { margin: 0; font-size: 0.75rem; color: #64748b; text-transform: uppercase; }
    .compact-info p { margin: 0; font-size: 1.5rem; font-weight: 800; color: #0f172a; }
    .compact-icon { font-size: 1.5rem; background: #f1f5f9; pading: 0.5rem; width: 40px; height: 40px; display:flex; align-items:center; justify-content:center; border-radius: 8px;}

    /* Panel Aksi Cepat di Kanan */
    .action-panel { background: #ffffff; border: 1px solid #e2e8f0; padding: 1.5rem; border-radius: 16px; }
    .action-title { font-weight: 700; font-size: 1rem; margin-bottom: 1rem; color: #0f172a; }
    .action-title a{ text-decoration: none}
    .btn-action {
        width: 100%; padding: 0.75rem; background: #f8fafc; border: 1px solid #e2e8f0; text-decoration: none;
        text-align: left; border-radius: 8px; font-weight: 600; font-size: 0.875rem;
        margin-bottom: 0.5rem; cursor: pointer; display: flex; justify-content: space-between;
    }
    .btn-action:hover { background: #4f46e5; color: white; border-color: #4f46e5; }

    .table-container { background: white; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; }
    .custom-table { width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; }
    .custom-table th { color: #64748b; padding-bottom: 1rem; border-bottom: 1px solid #e2e8f0; font-size: 0.75rem; text-transform: uppercase;}
    .custom-table td { padding: 1rem 0; border-bottom: 1px solid #f1f5f9; }
</style>

<div class="split-container">
    <div class="main-column">
        <section class="mini-stat-grid">
            <div class="compact-card">
                <div class="compact-info">
                    <h4>Total Layanan</h4>
                    <p>{{ $totalServices ?? '1,240' }}</p>
                </div>
                <div class="compact-icon">💼</div>
            </div>
            <div class="compact-card">
                <div class="compact-info">
                    <h4>Total Poliklinik</h4>
                    <p>{{ $totalPolyclinics ?? '24' }}</p>
                </div>
                <div class="compact-icon">🏥</div>
            </div>
            <div class="compact-card">
                <div class="compact-info">
                    <h4>Total Dokter</h4>
                    <p>{{ $totalDoctors ?? '156' }}</p>
                </div>
                <div class="compact-icon">👨‍⚕️</div>
            </div>
        </section>

        <section class="table-container">
            <h3 style="margin-top:0; margin-bottom:1.5rem;">Aktivitas Pasien & Dokter Terkini</h3>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Nama Dokter / Layanan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. Budi Santoso, Sp.A</td>
                        <td><span style="color: green; font-weight:700;">● Aktif</span></td>
                        <td>22 Juni 2026</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <div class="side-column">
        <div class="action-panel" style="background: linear-gradient(135deg, #0f172a, #1e293b); color: white;">
            <div class="action-title" style="color: white;">📢 Info Broadcast ({{ $totalAnnouncements ?? '3' }})</div>
            <p style="font-size: 0.875rem; color: #94a3b8; margin-bottom: 0;">Rapat koordinasi akreditasi RS akan diadakan besok jam 09.00 WIB di Aula Utama.</p>
        </div>

        <div class="action-panel">
            <div class="action-title">⚡ Aksi Cepat Admin</div>
            <a href="{{ route('admin.doctors.create') }}" class="btn-action">➕ Tambah Dokter Baru</a>
            <a href="{{ route('admin.schedules.index') }}" class="btn-action">📅 Atur Jadwal Poli</a>
            <a href="{{ route('admin.announcements.create') }}" class="btn-action">📝 Buat Pengumuman</a>
        </div>
    </div>
</div>
@endsection