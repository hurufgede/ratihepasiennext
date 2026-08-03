@extends('layouts.admin')

@section('title', 'Overview Dashboard')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    <div class="lg:col-span-8 flex flex-col gap-6">
        <section class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <h4 class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Layanan</h4>
                    <p class="text-2xl font-black text-slate-900 mt-1">{{ $totalServices ?? '1,240' }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl">💼</div>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <h4 class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Poliklinik</h4>
                    <p class="text-2xl font-black text-slate-900 mt-1">{{ $totalPolyclinics ?? '24' }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl">🏥</div>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <h4 class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Dokter</h4>
                    <p class="text-2xl font-black text-slate-900 mt-1">{{ $totalDoctors ?? '156' }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl">👨‍⚕️</div>
            </div>
        </section>

        <section class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm overflow-hidden">
            <h3 class="text-base font-bold text-slate-900 mb-4">Aktivitas Pasien & Dokter Terkini</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm">
                    <thead>
                        <tr class="border-b border-slate-200 text-slate-400 text-[11px] uppercase tracking-wider">
                            <th class="pb-3 font-semibold">Nama Dokter / Layanan</th>
                            <th class="pb-3 font-semibold">Status</th>
                            <th class="pb-3 font-semibold">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        <tr>
                            <td class="py-3.5 font-medium text-slate-900">Dr. Budi Santoso, Sp.A</td>
                            <td class="py-3.5">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-brand-50 text-brand-700 border border-brand-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-500"></span> Aktif
                                </span>
                            </td>
                            <td class="py-3.5 text-slate-500">22 Juni 2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <div class="lg:col-span-4 flex flex-col gap-6">
        <div class="bg-gradient-to-br from-brand-900 via-slate-900 to-slate-900 text-white p-6 rounded-2xl shadow-md border border-brand-900/50">
            <div class="font-bold text-sm text-white mb-2 flex items-center gap-2">📢 Info Broadcast ({{ $totalAnnouncements ?? '3' }})</div>
            <p class="text-xs text-slate-300 leading-relaxed">Rapat koordinasi akreditasi RS akan diadakan besok jam 09.00 WIB di Aula Utama.</p>
        </div>

        <div class="bg-white border border-slate-200/80 p-6 rounded-2xl shadow-sm">
            <div class="font-bold text-sm text-slate-900 mb-4">⚡ Aksi Cepat Admin</div>
            <div class="space-y-2">
                <a href="{{ route('admin.doctors.create') }}" class="w-full p-3 bg-slate-50 hover:bg-brand-600 hover:text-white border border-slate-200 rounded-xl font-semibold text-xs text-slate-700 transition-all flex items-center justify-between group">
                    <span>➕ Tambah Dokter Baru</span>
                </a>
                <a href="{{ route('admin.schedules.index') }}" class="w-full p-3 bg-slate-50 hover:bg-brand-600 hover:text-white border border-slate-200 rounded-xl font-semibold text-xs text-slate-700 transition-all flex items-center justify-between group">
                    <span>📅 Atur Jadwal Poli</span>
                </a>
                <a href="{{ route('admin.announcements.create') }}" class="w-full p-3 bg-slate-50 hover:bg-brand-600 hover:text-white border border-slate-200 rounded-xl font-semibold text-xs text-slate-700 transition-all flex items-center justify-between group">
                    <span>📝 Buat Pengumuman</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection