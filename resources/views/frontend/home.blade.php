@extends('layouts.frontend')
@section('title')
    RATIH ePasien
@endsection
@section('content') <section
        class="relative pt-12 pb-20 lg:pt-20 lg:pb-28 overflow-hidden bg-gradient-to-b from-brand-50/50 via-white to-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-100 border border-brand-200 text-brand-700 text-xs font-bold tracking-wide">
                        <i class="ph-bold ph-sparkle text-brand-600"></i>
                        Platform Pelayanan Pasien Pintar RSU Ratih </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
                        Layanan Kesehatan <span
                            class="bg-clip-text text-transparent bg-gradient-to-r from-brand-600 to-brand-accent">Cepat,
                            Pintar</span> & Terpadu. </h1>
                    <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        Nikmati kemudahan pendaftaran antrean digital, rekomendasi poli berbasis AI Triage, serta pantau
                        jadwal dokter secara real-time dari mana saja. </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-2">
                        @auth <a href="#pendaftaran"
                                class="px-7 py-3.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm shadow-xl transition-all flex items-center justify-center gap-2">
                                <i class="ph-bold ph-calendar-plus text-lg"></i>
                                Ambil Antrean Sekarang </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-7 py-3.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm shadow-xl transition-all flex items-center justify-center gap-2">
                                <i class="ph-bold ph-lock text-lg"></i>
                                Login Untuk Booking </a>
                        @endauth <a href="#triage"
                            class="px-7 py-3.5 rounded-xl bg-white border border-slate-200 hover:border-brand-500 text-slate-700 font-bold text-sm shadow-sm transition-all flex items-center justify-center gap-2">
                            <i class="ph-bold ph-first-aid text-brand-600 text-lg"></i>
                            Cek Gejala (AI Triage) </a>
                    </div>
                </div>
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-md">
                        <div
                            class="absolute -top-4 -left-4 w-72 h-72 bg-brand-200 rounded-full mix-blend-multiply filter blur-2xl opacity-70">
                        </div>
                        <div
                            class="absolute -bottom-4 -right-4 w-72 h-72 bg-brand-secondary/20 rounded-full mix-blend-multiply filter blur-2xl opacity-70">
                        </div>
                        <div class="relative bg-white rounded-3xl p-6 border border-slate-100 shadow-2xl space-y-4">
                            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center font-bold">
                                        RS</div>
                                    <div>
                                        <h3 class="font-bold text-sm text-slate-900">Status Operasional</h3>
                                        <p class="text-xs text-brand-600 font-medium">Sistem Antrean Aktif</p>
                                    </div>
                                </div> <span class="flex h-3 w-3 relative"> <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-500 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-brand-600"></span> </span>
                            </div>
                            <div class="grid grid-cols-2 gap-3 text-center">
                                <div class="p-3 bg-slate-50 rounded-2xl border border-slate-100"> <span
                                        class="text-2xl font-black text-brand-600 block">12 Min</span> <span
                                        class="text-[11px] text-slate-500 font-medium">Rata-rata Tunggu</span> </div>
                                <div class="p-3 bg-slate-50 rounded-2xl border border-slate-100"> <span
                                        class="text-2xl font-black text-brand-secondary block">100%</span> <span
                                        class="text-[11px] text-slate-500 font-medium">Integrasi BPJS</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="triage" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-12"> <span
                    class="px-3 py-1 rounded-full bg-brand-100 border border-brand-200 text-brand-700 font-semibold text-xs uppercase tracking-wider">AI
                    Assistant</span>
                <h2 class="font-extrabold text-3xl sm:text-4xl text-slate-900">Smart Symptom Triage</h2>
                <p class="text-slate-600 text-sm sm:text-base">Pilih gejala utama yang Anda rasakan untuk mendapatkan
                    rekomendasi poliklinik berdasarkan data yang tersedia.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-5 space-y-3"> <button type="button" data-symptom="demam"
                        onclick="checkSymptom('demam', this)"
                        class="symptom-btn w-full p-4 rounded-2xl border border-slate-200 hover:border-brand-500 bg-slate-50 hover:bg-brand-50/30 text-left transition-all flex items-center justify-between group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                                <i class="ph-bold ph-thermometer text-xl"></i></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm group-hover:text-brand-700">Demam & Suhu Tinggi
                                </h4>
                                <p class="text-xs text-slate-500">Badan panas, menggigil, lemas</p>
                            </div>
                        </div>
                        <div
                            class="check-box w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-xs text-white bg-slate-200 transition-colors">
                            <i class="ph-bold ph-check"></i></div>
                    </button> <button type="button" data-symptom="kepala" onclick="checkSymptom('kepala', this)"
                        class="symptom-btn w-full p-4 rounded-2xl border border-slate-200 hover:border-brand-500 bg-slate-50 hover:bg-brand-50/30 text-left transition-all flex items-center justify-between group">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center">
                                <i class="ph-bold ph-brain text-xl"></i></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm group-hover:text-brand-700">Sakit Kepala &
                                    Migrain</h4>
                                <p class="text-xs text-slate-500">Pusing berputar, tegang leher</p>
                            </div>
                        </div>
                        <div
                            class="check-box w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-xs text-white bg-slate-200 transition-colors">
                            <i class="ph-bold ph-check"></i></div>
                    </button> <button type="button" data-symptom="batuk" onclick="checkSymptom('batuk', this)"
                        class="symptom-btn w-full p-4 rounded-2xl border border-slate-200 hover:border-brand-500 bg-slate-50 hover:bg-brand-50/30 text-left transition-all flex items-center justify-between group">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                <i class="ph-bold ph-lungs text-xl"></i></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm group-hover:text-brand-700">Batuk & Flu Ringan
                                </h4>
                                <p class="text-xs text-slate-500">Tenggorokan gatal, bersin, pilek</p>
                            </div>
                        </div>
                        <div
                            class="check-box w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-xs text-white bg-slate-200 transition-colors">
                            <i class="ph-bold ph-check"></i></div>
                    </button> <button type="button" data-symptom="kandungan" onclick="checkSymptom('kandungan', this)"
                        class="symptom-btn w-full p-4 rounded-2xl border border-slate-200 hover:border-brand-500 bg-slate-50 hover:bg-brand-50/30 text-left transition-all flex items-center justify-between group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center"><i
                                    class="ph-bold ph-baby text-xl"></i></div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm group-hover:text-brand-700">Pemeriksaan
                                    Kehamilan</h4>
                                <p class="text-xs text-slate-500">Pemeriksaan rutin USG & ibu hamil</p>
                            </div>
                        </div>
                        <div
                            class="check-box w-5 h-5 rounded-full border border-slate-300 flex items-center justify-center text-xs text-white bg-slate-200 transition-colors">
                            <i class="ph-bold ph-check"></i></div>
                    </button> </div>
                <div
                    class="lg:col-span-7 bg-brand-900 text-white rounded-3xl p-6 sm:p-8 shadow-xl relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-brand-600 rounded-full filter blur-3xl opacity-30">
                    </div>
                    <div id="triage-placeholder" class="py-12 text-center space-y-3 relative z-10"> <i
                            class="ph-bold ph-cpu text-5xl text-brand-200 animate-bounce"></i>
                        <h3 class="text-lg font-bold">Pilih Gejala di Sebelah Kiri</h3>
                        <p class="text-xs text-slate-300 max-w-md mx-auto">Sistem akan memberikan rekomendasi poliklinik
                            berdasarkan gejala yang dipilih.</p>
                    </div>
                    <div id="triage-content" class="hidden space-y-6 relative z-10">
                        <div class="flex items-center justify-between border-b border-white/10 pb-4">
                            <div> <span class="text-[10px] text-brand-200 font-bold tracking-widest uppercase">Hasil
                                    Analisis</span>
                                <h3 class="text-xl font-bold text-white mt-0.5">Rekomendasi Poliklinik</h3>
                            </div> <span id="triage-level"
                                class="px-2.5 py-1 rounded-full text-xs font-bold border"></span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="bg-white/5 p-4 rounded-2xl border border-white/10"> <span
                                    class="text-[11px] text-slate-300 block">Poliklinik Tujuan</span> <span
                                    id="triage-poli" class="text-base font-bold text-brand-200 block mt-1"></span> </div>
                            <div class="bg-white/5 p-4 rounded-2xl border border-white/10"> <span
                                    class="text-[11px] text-slate-300 block">Dokter Rekomendasi</span> <span
                                    id="triage-doc" class="text-base font-bold text-white block mt-1"></span> </div>
                        </div>
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/10 flex items-center gap-3"> <i
                                class="ph-bold ph-clock text-2xl text-brand-200"></i>
                            <div> <span class="text-[11px] text-slate-300 block">Estimasi Waktu Tunggu</span> <span
                                    id="triage-wait" class="text-sm font-bold text-white"></span> </div>
                        </div>
                        <p id="triage-advice"
                            class="text-xs text-slate-300 leading-relaxed italic bg-black/20 p-4 rounded-xl border border-white/5">
                        </p> <button type="button" onclick="autoSelectPoli()"
                            class="w-full py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-lg transition-all flex items-center justify-center gap-2">
                            <i class="ph-bold ph-arrow-right"></i>
                            Terapkan ke Form Pendaftaran </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="layanan" class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-12"> <span
                    class="inline-flex px-3 py-1 rounded-full bg-brand-100 border border-brand-200 text-brand-700 font-semibold text-xs uppercase tracking-wider">Layanan
                    Unggulan</span>
                <h2 class="font-extrabold text-3xl sm:text-4xl text-slate-900">Layanan Kesehatan</h2>
                <p class="text-sm sm:text-base text-slate-500">Informasi layanan kesehatan yang tersedia di RSU Ratih.</p>
            </div>
            @if ($services->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($services as $service)
                        @php
                            $serviceName = strtolower($service->title ?? '');
                            $serviceIcon = 'ph-first-aid';
                            if (str_contains($serviceName, 'igd') || str_contains($serviceName, 'darurat')) {
                                $serviceIcon = 'ph-siren';
                            } elseif (str_contains($serviceName, 'laboratorium') || str_contains($serviceName, 'lab')) {
                                $serviceIcon = 'ph-test-tube';
                            } elseif (
                                str_contains($serviceName, 'radiologi') ||
                                str_contains($serviceName, 'rontgen')
                            ) {
                                $serviceIcon = 'ph-scan';
                            } elseif (str_contains($serviceName, 'farmasi') || str_contains($serviceName, 'apot')) {
                                $serviceIcon = 'ph-pill';
                            } elseif (str_contains($serviceName, 'rawat inap') || str_contains($serviceName, 'inap')) {
                                $serviceIcon = 'ph-bed';
                            } elseif (str_contains($serviceName, 'gigi')) {
                                $serviceIcon = 'ph-tooth';
                            } elseif (str_contains($serviceName, 'jantung') || str_contains($serviceName, 'kardi')) {
                                $serviceIcon = 'ph-heartbeat';
                            } elseif (str_contains($serviceName, 'anak') || str_contains($serviceName, 'pediatri')) {
                                $serviceIcon = 'ph-baby';
                            } elseif (str_contains($serviceName, 'kandungan') || str_contains($serviceName, 'obgyn')) {
                                $serviceIcon = 'ph-gender-female';
                            } elseif (str_contains($serviceName, 'mata')) {
                                $serviceIcon = 'ph-eye';
                            } elseif (str_contains($serviceName, 'saraf') || str_contains($serviceName, 'syaraf')) {
                                $serviceIcon = 'ph-brain';
                            } elseif (str_contains($serviceName, 'bedah')) {
                                $serviceIcon = 'ph-suitcase-medical';
                            } elseif (str_contains($serviceName, 'umum')) {
                                $serviceIcon = 'ph-stethoscope';
                            }
                        @endphp <article
                            class="group bg-white rounded-3xl border border-slate-200/80 p-6 shadow-sm hover:shadow-xl hover:border-brand-300 transition-all duration-300">
                            <div
                                class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center text-2xl mb-5 group-hover:bg-brand-600 group-hover:text-white transition-all overflow-hidden">
                                @if ($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                                        class="w-full h-full object-cover rounded-2xl">
                                @else
                                    <i class="ph-bold {{ $serviceIcon }}"></i>
                                @endif
                            </div>
                            <h3 class="font-bold text-lg text-slate-900 mb-2">{{ $service->title }}</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">{{ $service->description }}</p>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-dashed border-slate-200 rounded-3xl py-16 text-center">
                    <div
                        class="w-14 h-14 mx-auto rounded-2xl bg-slate-50 text-slate-400 flex items-center justify-center text-2xl">
                        <i class="ph-bold ph-first-aid"></i></div>
                    <h3 class="font-bold text-slate-700 mt-4">Layanan belum tersedia</h3>
                    <p class="text-xs text-slate-400 mt-1">Belum ada layanan aktif di database.</p>
                </div>
            @endif
        </div>
    </section>
    <section id="dokter" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div> <span
                        class="px-3 py-1 rounded-full bg-brand-100 border border-brand-200 text-brand-700 font-semibold text-xs uppercase tracking-wider">Tim
                        Medis</span>
                    <h2 class="font-extrabold text-3xl sm:text-4xl text-slate-900 mt-2">Dokter Spesialis</h2>
                </div>
                <div class="flex items-center gap-2 bg-slate-100 p-1.5 rounded-2xl overflow-x-auto"> <button
                        type="button" onclick="filterDoctors('all', this)"
                        class="doc-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-white text-slate-800 shadow-sm transition-all">Semua</button>
                    <button type="button" onclick="filterDoctors('jantung', this)"
                        class="doc-filter-btn px-4 py-2 rounded-xl text-xs font-semibold text-slate-500 hover:text-slate-800 transition-all">Jantung</button>
                    <button type="button" onclick="filterDoctors('anak', this)"
                        class="doc-filter-btn px-4 py-2 rounded-xl text-xs font-semibold text-slate-500 hover:text-slate-800 transition-all">Anak</button>
                    <button type="button" onclick="filterDoctors('obgyn', this)"
                        class="doc-filter-btn px-4 py-2 rounded-xl text-xs font-semibold text-slate-500 hover:text-slate-800 transition-all">Kandungan</button>
                </div>
            </div>
            @if ($doctors->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($doctors as $doctor)
                        <article class="doc-item bg-slate-50 rounded-3xl p-5 border border-slate-200"
                            data-category="{{ strtolower($doctor->specialist ?? '') }}">
                            <div
                                class="w-full h-48 bg-slate-200 rounded-2xl flex items-center justify-center overflow-hidden">
                                @if ($doctor->photo)
                                    <img src="{{ asset('storage/' . $doctor->photo) }}" alt="{{ $doctor->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <i class="ph-bold ph-user text-6xl text-slate-400"></i>
                                @endif
                            </div> <span
                                class="inline-block text-xs text-brand-600 font-semibold mt-4">{{ $doctor->specialist ?? 'Dokter' }}</span>
                            <h3 class="font-bold text-slate-900 mt-1">{{ $doctor->name }}</h3>
                            <p class="text-xs text-slate-500 mt-1">{{ $doctor->polyclinic->name ?? '-' }}</p>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 border border-dashed border-slate-200 rounded-3xl"> <i
                        class="ph-bold ph-user-circle text-5xl text-slate-300"></i>
                    <h3 class="font-bold text-slate-700 mt-4">Dokter belum tersedia</h3>
                </div>
            @endif
        </div>
    </section>
    <section id="kalkulator" class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-16"> <span
                    class="px-3 py-1 rounded-full bg-brand-100 border border-brand-200 text-brand-700 font-semibold text-xs uppercase tracking-wider">Health
                    Suite</span>
                <h2 class="font-extrabold text-3xl sm:text-4xl text-slate-900">Kalkulator Kesehatan Mandiri</h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center font-bold">
                            <i class="ph-bold ph-scales text-xl"></i></div>
                        <div>
                            <h3 class="font-bold text-lg text-slate-900">Kalkulator BMI Visual</h3>
                            <p class="text-xs text-slate-500">Hitung Indeks Massa Tubuh Anda</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div> <label class="block text-xs font-bold text-slate-700 mb-1">Berat Badan (kg)</label> <input
                                type="number" min="1" step="0.1" id="bmi-weight-input"
                                placeholder="Contoh: 65"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-brand-500">
                        </div>
                        <div> <label class="block text-xs font-bold text-slate-700 mb-1">Tinggi Badan (cm)</label> <input
                                type="number" min="1" step="0.1" id="bmi-height-input"
                                placeholder="Contoh: 170"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-brand-500">
                        </div>
                    </div> <button type="button" onclick="calculateBMIVisual()"
                        class="w-full py-3 bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs rounded-xl transition-all">Hitung
                        BMI</button>
                    <div id="bmi-visual-result"
                        class="hidden p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                        <div class="flex justify-between items-center"> <span
                                class="text-xs font-bold text-slate-600">Skor BMI Anda:</span> <span id="bmi-score-text"
                                class="text-xl font-black text-brand-600"></span> </div>
                        <div class="relative w-full h-3 bg-slate-200 rounded-full overflow-hidden">
                            <div id="bmi-gauge-dot"
                                class="absolute top-0 bottom-0 w-3 bg-slate-900 rounded-full transition-all duration-500">
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-[10px] font-bold text-slate-400">
                            <span>Kurus</span> <span>Normal</span> <span>Gemuk</span> </div>
                        <div class="text-center pt-1"> <span id="bmi-status-badge"
                                class="inline-block px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider"></span>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-brand-secondary/20 text-brand-secondary flex items-center justify-center font-bold">
                            <i class="ph-bold ph-drop text-xl"></i></div>
                        <div>
                            <h3 class="font-bold text-lg text-slate-900">Kalkulator Hidrasi Harian</h3>
                            <p class="text-xs text-slate-500">Estimasi kebutuhan asupan air harian</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div> <label class="block text-xs font-bold text-slate-700 mb-1">Berat Badan (kg)</label> <input
                                type="number" min="1" step="0.1" id="water-weight-input"
                                placeholder="Contoh: 60"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-brand-500">
                        </div>
                        <div> <label class="block text-xs font-bold text-slate-700 mb-1">Aktivitas Harian</label> <select
                                id="water-activity"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-brand-500 bg-white">
                                <option value="light">Ringan</option>
                                <option value="moderate">Sedang</option>
                                <option value="heavy">Berat</option>
                            </select> </div>
                    </div> <button type="button" onclick="calculateWater()"
                        class="w-full py-3 bg-brand-secondary hover:bg-sky-700 text-white font-bold text-xs rounded-xl transition-all">Hitung
                        Kebutuhan Air</button>
                    <div id="water-result"
                        class="hidden p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-center gap-6">
                        <div
                            class="w-16 h-24 bg-slate-200 rounded-2xl relative overflow-hidden border border-slate-300 flex-shrink-0">
                            <div id="water-liquid"
                                class="absolute bottom-0 w-full bg-brand-secondary transition-all duration-700 h-0"></div>
                        </div>
                        <div class="space-y-1"> <span class="text-xs text-slate-500 font-medium">Rekomendasi Air
                                Harian:</span>
                            <h4 id="water-score-text" class="text-2xl font-black text-brand-secondary"></h4>
                            <p class="text-xs text-slate-600">Setara dengan <span id="water-glasses"
                                    class="font-bold text-slate-900">0</span> gelas air per hari.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="jadwal" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12"> <span
                    class="inline-flex items-center px-3 py-1 rounded-full bg-brand-100 border border-brand-200 text-brand-700 font-semibold text-xs uppercase tracking-wider">Jadwal
                    Dokter</span>
                <h2 class="font-extrabold text-3xl sm:text-4xl text-slate-900 mt-3">Jadwal Praktik Dokter</h2>
                <p class="text-sm sm:text-base text-slate-500 mt-3">Lihat jadwal praktik dokter berdasarkan poliklinik dan
                    hari pelayanan.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-2 mb-10"> <button type="button"
                    class="schedule-filter active px-5 py-2.5 rounded-xl text-xs font-semibold bg-brand-600 text-white shadow-sm"
                    data-day="all">Semua</button>
                @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $day)
                    <button type="button"
                        class="schedule-filter px-5 py-2.5 rounded-xl text-xs font-semibold bg-slate-50 text-slate-600 border border-slate-200 hover:border-brand-400 hover:text-brand-600 transition-all"
                        data-day="{{ $day }}">{{ ucfirst($day) }}</button>
                @endforeach
            </div>
            @if ($schedules->isNotEmpty())
                <div id="schedule-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    @foreach ($schedules as $schedule)
                        @php
                            $start = \Carbon\Carbon::parse($schedule->start_time);
                            $end = \Carbon\Carbon::parse($schedule->end_time);
                        @endphp <article
                            class="schedule-card bg-white rounded-3xl border border-slate-200 p-5 shadow-sm hover:shadow-lg hover:border-brand-300 transition-all"
                            data-day="{{ strtolower($schedule->day) }}" data-schedule-id="{{ $schedule->id }}">
                            <div class="flex items-start justify-between">
                                <div
                                    class="w-11 h-11 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center">
                                    <i class="ph-bold ph-calendar-check text-xl"></i></div>
                                @if ($schedule->status === 'active')
                                    <span
                                        class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-600 text-[10px] font-bold">Aktif</span>
                                @else
                                    <span
                                        class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-400 text-[10px] font-bold">Tidak
                                        Aktif</span>
                                @endif
                            </div>
                            <div class="mt-5">
                                <p class="text-xs font-semibold text-brand-600">{{ $schedule->polyclinic->name ?? '-' }}
                                </p>
                                <h3 class="text-base font-bold text-slate-900 mt-1">{{ $schedule->doctor->name ?? '-' }}
                                </h3>
                                @if ($schedule->doctor->specialist ?? false)
                                    <p class="text-xs text-slate-500 mt-1">{{ $schedule->doctor->specialist }}</p>
                                @endif
                            </div>
                            <div class="mt-5 pt-4 border-t border-slate-100 space-y-4">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-8 h-8 rounded-xl bg-slate-50 flex items-center justify-center text-brand-600">
                                        <i class="ph-bold ph-calendar-blank"></i></div>
                                    <div>
                                        <p class="text-[10px] text-slate-400">Hari</p>
                                        <p class="text-xs font-bold text-slate-700">{{ ucfirst($schedule->day) }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-8 h-8 rounded-xl bg-slate-50 flex items-center justify-center text-brand-600">
                                        <i class="ph-bold ph-clock"></i></div>
                                    <div>
                                        <p class="text-[10px] text-slate-400">Jam Praktik</p>
                                        <p class="text-xs font-bold text-slate-700">{{ $start->format('H:i') }} -
                                            {{ $end->format('H:i') }}</p>
                                    </div>
                                </div>
                            </div> <button type="button"
                                onclick="chooseDoctorSchedule({{ $schedule->id }}, {{ $schedule->polyclinic_id }}, @js($schedule->doctor->name ?? '-'), '{{ strtolower($schedule->day) }}', '{{ $start->format('H:i') }}', '{{ $end->format('H:i') }}')"
                                class="w-full mt-5 py-3 rounded-xl bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold transition-all">
                                Pilih Jadwal </button>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 border border-dashed border-slate-200 rounded-3xl">
                    <div
                        class="w-14 h-14 mx-auto rounded-2xl bg-slate-50 text-slate-400 flex items-center justify-center text-2xl">
                        <i class="ph-bold ph-calendar-x"></i></div>
                    <h3 class="font-bold text-slate-700 mt-4">Jadwal belum tersedia</h3>
                    <p class="text-xs text-slate-400 mt-1">Belum ada jadwal praktik dokter yang aktif.</p>
                </div>
            @endif
        </div>
    </section>
    @auth
<section id="pendaftaran" class="relative z-[1000] py-20 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-[1001]">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-brand-100 border border-brand-200 text-brand-700 font-semibold text-xs uppercase tracking-wider">Pendaftaran Online</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Buat Janji / Booking</h2>
            <p class="text-sm text-slate-500 mt-3">Pilih tanggal, poliklinik, dokter, dan jadwal praktik untuk melakukan pendaftaran.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 relative z-[1002]">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 relative z-[1003]">
                    <form method="POST" action="{{ route('user.booking.store') }}" id="booking-form" class="relative z-[1004]">
                        @csrf
                        <input type="hidden" name="doctor_schedule_id" id="input-doctor-schedule">
                        <div class="mb-7">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-9 h-9 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center">
                                    <i class="ph-bold ph-user"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-900 text-sm">Data Pasien</h3>
                                    <p class="text-xs text-slate-400">Data diambil dari akun Anda</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-700 mb-2">Nama</label>
                                    <input type="text" value="{{ auth()->user()->patient->name ?? '-' }}" readonly class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-600">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-2">NIK</label>
                                    <input type="text" value="{{ auth()->user()->patient->nik ?? '-' }}" readonly class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-600">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-2">Tanggal Lahir</label>
                                    <input type="text" value="{{ auth()->user()->patient?->birth_date ? \Carbon\Carbon::parse(auth()->user()->patient->birth_date)->format('d-m-Y') : '-' }}" readonly class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-600">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-semibold text-slate-700 mb-2">Alamat</label>
                                    <input type="text" value="{{ auth()->user()->patient->address ?? '-' }}" readonly class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-600">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-2">Nomor HP / Telephone</label>
                                    <input type="text" value="{{ auth()->user()->patient->phone ?? (auth()->user()->phone ?? '-') }}" readonly class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-600">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-2">Email</label>
                                    <input type="text" value="{{ auth()->user()->email }}" readonly class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-600">
                                </div>
                            </div>
                        </div>
                        <div class="pt-7 border-t border-slate-100">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-9 h-9 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center">
                                    <i class="ph-bold ph-calendar-check"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-900 text-sm">Jadwal Kunjungan</h3>
                                    <p class="text-xs text-slate-400">Pilih jadwal dokter yang tersedia</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="input-tanggal" class="block text-xs font-semibold text-slate-700 mb-2">Pilih Tanggal</label>
                                    <input type="date" name="visit_date" id="input-tanggal" min="{{ now()->format('Y-m-d') }}" required class="w-full h-12 px-4 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-brand-100 focus:border-brand-500">
                                </div>
                                <div>
                                    <label for="input-poli" class="block text-xs font-semibold text-slate-700 mb-2">Poliklinik / Unit Penunjang</label>
                                    <select name="polyclinic_id" id="input-poli" required class="w-full h-12 px-4 rounded-xl border border-slate-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-brand-100 focus:border-brand-500">
                                        <option value="">Pilih Poliklinik</option>
                                        @foreach ($polyclinics as $poli)
                                            <option value="{{ $poli->id }}">{{ $poli->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="input-doctor" class="block text-xs font-semibold text-slate-700 mb-2">Dokter</label>
                                    <select id="input-doctor" disabled class="w-full h-12 px-4 rounded-xl border border-slate-200 bg-slate-50 text-sm">
                                        <option value="">Pilih tanggal dan poliklinik</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="input-schedule" class="block text-xs font-semibold text-slate-700 mb-2">Jam Praktik</label>
                                    <select id="input-schedule" disabled required class="w-full h-12 px-4 rounded-xl border border-slate-200 bg-slate-50 text-sm">
                                        <option value="">Pilih dokter</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="pt-7 mt-7 border-t border-slate-100">
                            <label for="input-complaint" class="block text-xs font-semibold text-slate-700 mb-2">Keluhan Singkat</label>
                            <textarea name="complaint" id="input-complaint" rows="4" maxlength="1000" placeholder="Tuliskan keluhan atau tujuan kunjungan..." class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm resize-none focus:outline-none focus:ring-2 focus:ring-brand-100 focus:border-brand-500"></textarea>
                        </div>
                        <button type="submit" id="booking-submit" disabled class="w-full mt-7 h-13 rounded-xl bg-slate-200 text-slate-400 font-bold text-sm cursor-not-allowed transition-all">
                            <i class="ph-bold ph-paper-plane-tilt mr-1"></i>
                            Pilih Jadwal Terlebih Dahulu
                        </button>
                    </form>
                </div>
            </div>
            <div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden sticky top-24">
                    <div class="p-6 border-b border-slate-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-brand-600">Booking</p>
                                <h3 class="text-lg font-extrabold text-slate-900 mt-1">Ringkasan Pendaftaran</h3>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center">
                                <i class="ph-bold ph-notepad text-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <p class="text-[10px] text-slate-400 uppercase font-semibold">Pasien</p>
                            <p id="summary-patient" class="text-sm font-bold text-slate-800 mt-1">{{ auth()->user()->patient->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 uppercase font-semibold">Poliklinik</p>
                            <p id="summary-poli" class="text-sm font-bold text-slate-800 mt-1">Belum dipilih</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 uppercase font-semibold">Dokter</p>
                            <p id="summary-doctor" class="text-sm font-bold text-slate-800 mt-1">Belum dipilih</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 uppercase font-semibold">Jam Praktik</p>
                            <p id="summary-time" class="text-sm font-bold text-slate-800 mt-1">Belum dipilih</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 uppercase font-semibold">Tanggal Kunjungan</p>
                            <p id="summary-date" class="text-sm font-bold text-slate-800 mt-1">Belum dipilih</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-brand-50 border border-brand-100 mt-5">
                            <div class="flex gap-3">
                                <i class="ph-bold ph-info text-brand-600 mt-0.5"></i>
                                <p class="text-[11px] leading-relaxed text-brand-700">Pastikan tanggal, poliklinik, dokter, dan jam praktik sudah sesuai sebelum melakukan booking.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section id="pendaftaran" class="py-20 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8 sm:p-12 text-center">
            <div class="w-16 h-16 mx-auto rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center text-3xl">
                <i class="ph-bold ph-lock-key"></i>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-5">Login Untuk Melakukan Booking</h2>
            <p class="text-sm text-slate-500 mt-3 max-w-lg mx-auto">Silakan login terlebih dahulu untuk mengakses formulir pendaftaran dan membuat janji dengan dokter.</p>
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 mt-6 px-7 py-3.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm transition-all">
                <i class="ph-bold ph-sign-in"></i>
                Login Sekarang
            </a>
        </div>
    </div>
</section>
@endauth
    <section id="faq" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-3 mb-12"> <span
                    class="px-3 py-1 rounded-full bg-brand-100 border border-brand-200 text-brand-700 font-semibold text-xs uppercase tracking-wider">Bantuan</span>
                <h2 class="font-extrabold text-3xl sm:text-4xl text-slate-900">Pertanyaan Sering Diajukan</h2>
            </div>
            <div class="space-y-4">
                <div class="border border-slate-200 rounded-2xl overflow-hidden"> <button type="button"
                        onclick="toggleAccordion(this)"
                        class="w-full p-5 text-left font-bold text-slate-800 flex justify-between items-center bg-slate-50 hover:bg-slate-100 transition-colors">
                        <span>Bagaimana cara menggunakan antrean online RSU Ratih?</span> <i
                            class="ph-bold ph-caret-down text-lg text-slate-400 transition-transform"></i> </button>
                    <div class="hidden p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed">
                        Anda dapat login, memilih tanggal kunjungan, poliklinik, dokter, dan jadwal praktik yang tersedia
                        kemudian mengirimkan formulir booking.</div>
                </div>
                <div class="border border-slate-200 rounded-2xl overflow-hidden"> <button type="button"
                        onclick="toggleAccordion(this)"
                        class="w-full p-5 text-left font-bold text-slate-800 flex justify-between items-center bg-slate-50 hover:bg-slate-100 transition-colors">
                        <span>Apakah pendaftaran online mendukung BPJS Kesehatan?</span> <i
                            class="ph-bold ph-caret-down text-lg text-slate-400 transition-transform"></i> </button>
                    <div class="hidden p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed">
                        Jenis penjaminan dapat disesuaikan dengan field yang tersedia pada proses pendaftaran dan kebijakan
                        sistem rumah sakit.</div>
                </div>
                <div class="border border-slate-200 rounded-2xl overflow-hidden"> <button type="button"
                        onclick="toggleAccordion(this)"
                        class="w-full p-5 text-left font-bold text-slate-800 flex justify-between items-center bg-slate-50 hover:bg-slate-100 transition-colors">
                        <span>Berapa lama sebelum jadwal harus tiba di rumah sakit?</span> <i
                            class="ph-bold ph-caret-down text-lg text-slate-400 transition-transform"></i> </button>
                    <div class="hidden p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed">
                        Disarankan datang lebih awal agar proses verifikasi dan administrasi dapat dilakukan sebelum jadwal
                        pelayanan.</div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    @php
    $scheduleData = $schedules->map(function ($schedule) {
        return [
            'id' => $schedule->id,
            'polyclinic_id' => $schedule->polyclinic_id,
            'polyclinic_name' => $schedule->polyclinic->name ?? '',
            'doctor_id' => $schedule->doctor_id,
            'doctor_name' => $schedule->doctor->name ?? '',
            'specialist' => $schedule->doctor->specialist ?? '',
            'day' => strtolower($schedule->day),
            'start_time' => \Carbon\Carbon::parse($schedule->start_time)->format('H:i'),
            'end_time' => \Carbon\Carbon::parse($schedule->end_time)->format('H:i'),
            'status' => $schedule->status,
        ];
    })->values();
    @endphp
    <script>
        const scheduleData = @json($scheduleData);
        const triageData = {
            demam: {
                keywords: ['umum', 'penyakit dalam', 'internis'],
                level: 'Sedang',
                levelColor: 'bg-amber-500/20 text-amber-300 border-amber-500/30',
                wait: '10 - 15 Menit',
                advice: 'Istirahat cukup, minum air putih dan pantau suhu tubuh.'
            },
            kepala: {
                keywords: ['saraf', 'syaraf', 'neurologi'],
                level: 'Sedang',
                levelColor: 'bg-amber-500/20 text-amber-300 border-amber-500/30',
                wait: '15 - 20 Menit',
                advice: 'Kurangi aktivitas berat dan istirahat cukup.'
            },
            batuk: {
                keywords: ['umum', 'paru', 'pulmonologi'],
                level: 'Ringan',
                levelColor: 'bg-emerald-500/20 text-emerald-300 border-emerald-500/30',
                wait: '5 - 10 Menit',
                advice: 'Gunakan masker dan konsumsi cairan yang cukup.'
            },
            kandungan: {
                keywords: ['kandungan', 'obgyn', 'obstetri', 'ginekologi'],
                level: 'Rutin',
                levelColor: 'bg-blue-500/20 text-blue-300 border-blue-500/30',
                wait: '10 - 20 Menit',
                advice: 'Bawa dokumen pemeriksaan sebelumnya apabila tersedia.'
            }
        };
        let selectedPoliFromTriage = '';
        let selectedTriageDoctor = '';

        function showToast(message, type = 'success') {
            let container = document.getElementById('toast-container');
            if (!container) {
                container = document.createElement('div');
                container.id = 'toast-container';
                container.className = 'fixed top-5 right-5 z-[9999] space-y-2 pointer-events-none';
                document.body.appendChild(container);
            }
            const toast = document.createElement('div');
            const icon = type === 'error' ? 'ph-warning-circle' : 'ph-check-circle';
            toast.className = 'pointer-events-auto px-4 py-3 bg-slate-900 text-white text-xs font-bold rounded-xl shadow-xl border border-slate-800 flex items-center gap-2';
            const iconElement = document.createElement('i');
            iconElement.className = `ph-bold ${icon} text-brand-500 text-base`;
            const textElement = document.createElement('span');
            textElement.textContent = message;
            toast.appendChild(iconElement);
            toast.appendChild(textElement);
            container.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }

        function checkSymptom(key, element) {
            document.querySelectorAll('.symptom-btn').forEach(button => {
                button.classList.remove('border-brand-500', 'bg-brand-50/30');
                const box = button.querySelector('.check-box');
                if (box) {
                    box.classList.remove('bg-brand-600');
                    box.classList.add('bg-slate-200');
                }
            });
            element.classList.add('border-brand-500', 'bg-brand-50/30');
            const box = element.querySelector('.check-box');
            if (box) {
                box.classList.remove('bg-slate-200');
                box.classList.add('bg-brand-600');
            }
            const item = triageData[key];
            if (!item) return;
            const activeSchedules = scheduleData.filter(schedule => schedule.status === 'active');
            const matchingSchedules = activeSchedules.filter(schedule => {
                const name = (schedule.polyclinic_name || '').toLowerCase();
                return item.keywords.some(keyword => name.includes(keyword));
            });
            const matchingSchedule = matchingSchedules[0] || null;
            selectedPoliFromTriage = matchingSchedule ? String(matchingSchedule.polyclinic_id) : '';
            selectedTriageDoctor = matchingSchedule ? matchingSchedule.doctor_name : 'Belum tersedia';
            document.getElementById('triage-placeholder')?.classList.add('hidden');
            document.getElementById('triage-content')?.classList.remove('hidden');
            document.getElementById('triage-poli').textContent = matchingSchedule ? matchingSchedule.polyclinic_name : 'Poliklinik belum tersedia';
            document.getElementById('triage-doc').textContent = matchingSchedule ? `${matchingSchedule.doctor_name} (contoh jadwal tersedia)` : 'Belum tersedia';
            document.getElementById('triage-wait').textContent = item.wait;
            document.getElementById('triage-advice').textContent = `Catatan: ${item.advice}`;
            const levelBadge = document.getElementById('triage-level');
            levelBadge.textContent = item.level;
            levelBadge.className = `px-2.5 py-1 rounded-full text-xs font-bold border ${item.levelColor}`;
        }

        function autoSelectPoli() {
            if (!selectedPoliFromTriage) {
                showToast('Poliklinik yang sesuai belum tersedia.', 'error');
                return;
            }
            const select = document.getElementById('input-poli');
            if (!select) {
                showToast('Form pendaftaran belum tersedia.', 'error');
                return;
            }
            select.value = selectedPoliFromTriage;
            select.dispatchEvent(new Event('change', {
                bubbles: true
            }));
            document.getElementById('pendaftaran')?.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            showToast('Poliklinik berhasil dipilih.');
        }

        function filterDoctors(category, button) {
            document.querySelectorAll('.doc-filter-btn').forEach(item => {
                item.classList.remove('bg-white', 'text-slate-800', 'shadow-sm');
                item.classList.add('text-slate-500');
            });
            button.classList.add('bg-white', 'text-slate-800', 'shadow-sm');
            button.classList.remove('text-slate-500');
            document.querySelectorAll('.doc-item').forEach(item => {
                const value = (item.dataset.category || '').toLowerCase();
                const match = category === 'all' || value.includes(category);
                item.classList.toggle('hidden', !match);
            });
        }

        function calculateBMIVisual() {
            const weight = parseFloat(document.getElementById('bmi-weight-input')?.value);
            const height = parseFloat(document.getElementById('bmi-height-input')?.value) / 100;
            if (!weight || !height || weight <= 0 || height <= 0) {
                showToast('Masukkan berat dan tinggi badan dengan benar.', 'error');
                return;
            }
            const bmi = weight / (height * height);
            const score = bmi.toFixed(1);
            const resultBox = document.getElementById('bmi-visual-result');
            const scoreText = document.getElementById('bmi-score-text');
            const gaugeDot = document.getElementById('bmi-gauge-dot');
            const badge = document.getElementById('bmi-status-badge');
            resultBox.classList.remove('hidden');
            scoreText.textContent = score;
            let position = 0;
            if (bmi < 18.5) {
                position = Math.max(5, Math.min((bmi / 18.5) * 33, 33));
                badge.textContent = 'Kurus';
                badge.className =
                    'inline-block px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500 text-white';
            } else if (bmi < 25) {
                position = 33 + ((bmi - 18.5) / 6.5) * 34;
                badge.textContent = 'Normal';
                badge.className =
                    'inline-block px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500 text-white';
            } else {
                position = Math.min(67 + ((bmi - 25) / 15) * 28, 95);
                badge.textContent = 'Gemuk';
                badge.className =
                    'inline-block px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-rose-500 text-white';
            }
            gaugeDot.style.left = `calc(${position}% - 6px)`;
        }

        function calculateWater() {
            const weight = parseFloat(document.getElementById('water-weight-input')?.value);
            const activity = document.getElementById('water-activity')?.value;
            if (!weight || weight <= 0) {
                showToast('Masukkan berat badan dengan benar.', 'error');
                return;
            }
            let liters = weight * 0.035;
            if (activity === 'moderate') liters += 0.4;
            if (activity === 'heavy') liters += 0.8;
            liters = Number(liters.toFixed(1));
            const glasses = Math.round((liters * 1000) / 250);
            document.getElementById('water-result').classList.remove('hidden');
            document.getElementById('water-score-text').textContent = `${liters.toFixed(1)} Liter`;
            document.getElementById('water-glasses').textContent = glasses;
            document.getElementById('water-liquid').style.height = `${Math.min((liters / 4) * 100, 100)}%`;
        }

        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');
            content.classList.toggle('hidden');
            icon?.classList.toggle('rotate-180');
        }

        function getDayName(date) {
            const parsed = new Date(`${date}T00:00:00`);
            return ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'][parsed.getDay()];
        }

        function resetBookingSelection(message = 'Pilih tanggal dan poliklinik') {
            const doctor = document.getElementById('input-doctor');
            const schedule = document.getElementById('input-schedule');
            const scheduleId = document.getElementById('input-doctor-schedule');
            const submit = document.getElementById('booking-submit');
            if (!doctor || !schedule || !scheduleId || !submit) return;
            doctor.innerHTML = `<option value="">${message}</option>`;
            doctor.disabled = true;
            schedule.innerHTML = '<option value="">Pilih dokter</option>';
            schedule.disabled = true;
            scheduleId.value = '';
            submit.disabled = true;
            submit.className =
                'w-full mt-7 h-13 rounded-xl bg-slate-200 text-slate-400 font-bold text-sm cursor-not-allowed transition-all';
            submit.innerHTML = '<i class="ph-bold ph-paper-plane-tilt mr-1"></i> Pilih Jadwal Terlebih Dahulu';
            document.getElementById('summary-doctor').textContent = 'Belum dipilih';
            document.getElementById('summary-time').textContent = 'Belum dipilih';
        }

        function loadDoctors(preferredDoctorId = null, preferredScheduleId = null) {
            const tanggal = document.getElementById('input-tanggal');
            const poli = document.getElementById('input-poli');
            const doctor = document.getElementById('input-doctor');
            const schedule = document.getElementById('input-schedule');
            if (!tanggal || !poli || !doctor || !schedule) return;
            resetBookingSelection();
            updateSummary();
            if (!tanggal.value || !poli.value) return;
            const day = getDayName(tanggal.value);
            const now = new Date();
            const selectedDate = new Date(`${tanggal.value}T00:00:00`);
            const isToday = tanggal.value === `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}`;
            const schedules = scheduleData.filter(item => {
                if (item.status !== 'active') return false;
                if (item.day !== day) return false;
                if (String(item.polyclinic_id) !== String(poli.value)) return false;
                if (isToday) {
                    const [hours, minutes] = item.end_time.split(':').map(Number);
                    const endTime = new Date(selectedDate);
                    endTime.setHours(hours, minutes, 0, 0);
                    if (endTime <= now) return false;
                }
                return true;
            });
            if (!schedules.length) {
                doctor.innerHTML = '<option value="">Tidak ada dokter tersedia pada tanggal ini</option>';
                return;
            }
            const doctors = [];
            schedules.forEach(item => {
                if (!doctors.some(existing => String(existing.id) === String(item.doctor_id))) {
                    doctors.push({
                        id: item.doctor_id,
                        name: item.doctor_name
                    });
                }
            });
            doctors.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.name;
                doctor.appendChild(option);
            });
            doctor.disabled = false;
            if (preferredDoctorId && doctors.some(item => String(item.id) === String(preferredDoctorId))) {
                doctor.value = String(preferredDoctorId);
                loadSchedules(preferredScheduleId);
            }
        }

        function loadSchedules(preferredScheduleId = null) {
            const tanggal = document.getElementById('input-tanggal');
            const poli = document.getElementById('input-poli');
            const doctor = document.getElementById('input-doctor');
            const schedule = document.getElementById('input-schedule');
            if (!tanggal || !poli || !doctor || !schedule || !doctor.value) return;
            schedule.innerHTML = '<option value="">Pilih Jam Praktik</option>';
            schedule.disabled = true;
            const day = getDayName(tanggal.value);
            const now = new Date();
            const selectedDate = new Date(`${tanggal.value}T00:00:00`);
            const isToday = tanggal.value === `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}`;
            const schedules = scheduleData.filter(item => {
                if (item.status !== 'active') return false;
                if (item.day !== day) return false;
                if (String(item.polyclinic_id) !== String(poli.value)) return false;
                if (String(item.doctor_id) !== String(doctor.value)) return false;
                if (isToday) {
                    const [hours, minutes] = item.end_time.split(':').map(Number);
                    const endTime = new Date(selectedDate);
                    endTime.setHours(hours, minutes, 0, 0);
                    if (endTime <= now) return false;
                }
                return true;
            });
            schedules.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = `${item.start_time} - ${item.end_time}`;
                schedule.appendChild(option);
            });
            if (!schedules.length) {
                schedule.innerHTML = '<option value="">Tidak ada jam tersedia</option>';
                return;
            }
            schedule.disabled = false;
            if (preferredScheduleId && schedules.some(item => String(item.id) === String(preferredScheduleId))) {
                schedule.value = String(preferredScheduleId);
                schedule.dispatchEvent(new Event('change', { bubbles: true }));
            }
        }

        function updateSummary() {
            const poli = document.getElementById('input-poli');
            const tanggal = document.getElementById('input-tanggal');
            const summaryPoli = document.getElementById('summary-poli');
            const summaryDate = document.getElementById('summary-date');
            if (poli && summaryPoli) {
                summaryPoli.textContent = poli.value ? poli.options[poli.selectedIndex].text : 'Belum dipilih';
            }
            if (tanggal && summaryDate) {
                if (tanggal.value) {
                    const date = new Date(`${tanggal.value}T00:00:00`);
                    summaryDate.textContent = date.toLocaleDateString('id-ID', {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric'
                    });
                } else {
                    summaryDate.textContent = 'Belum dipilih';
                }
            }
        }

        function activateBooking(schedule) {
            const scheduleId = document.getElementById('input-doctor-schedule');
            const submit = document.getElementById('booking-submit');
            if (!scheduleId || !submit) return;
            scheduleId.value = schedule.id;
            submit.disabled = false;
            submit.className =
                'w-full mt-7 h-13 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm cursor-pointer transition-all';
            submit.innerHTML = '<i class="ph-bold ph-paper-plane-tilt mr-1"></i> Kirim Booking';
            document.getElementById('summary-doctor').textContent = schedule.doctor_name;
            document.getElementById('summary-time').textContent = `${schedule.start_time} - ${schedule.end_time}`;
            updateSummary();
        }

        function getNextDateForDay(day, startTime = null) {
            const now = new Date();
            const days = ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
            const targetIndex = days.indexOf(String(day).toLowerCase());
            if (targetIndex < 0) return null;
            let difference = targetIndex - now.getDay();
            if (difference < 0) difference += 7;
            if (difference === 0 && startTime) {
                const [hours, minutes] = startTime.split(':').map(Number);
                const scheduleTime = new Date(now);
                scheduleTime.setHours(hours, minutes, 0, 0);
                if (scheduleTime <= now) difference = 7;
            }
            const date = new Date(now);
            date.setHours(0, 0, 0, 0);
            date.setDate(date.getDate() + difference);
            return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
        }

        function chooseDoctorSchedule(scheduleId, polyclinicId, doctorName, day, startTime, endTime) {
            const tanggal = document.getElementById('input-tanggal');
            const poli = document.getElementById('input-poli');
            const doctor = document.getElementById('input-doctor');
            const schedule = document.getElementById('input-schedule');
            if (!tanggal || !poli || !doctor || !schedule) {
                showToast('Form pendaftaran tidak tersedia.', 'error');
                return;
            }
            const selected = scheduleData.find(item => String(item.id) === String(scheduleId));
            if (!selected) {
                showToast('Data jadwal tidak ditemukan.', 'error');
                return;
            }
            if (selected.status !== 'active') {
                showToast('Jadwal dokter sudah tidak aktif.', 'error');
                return;
            }
            const selectedDate = getNextDateForDay(selected.day, selected.start_time);
            if (!selectedDate) {
                showToast('Tanggal jadwal tidak valid.', 'error');
                return;
            }
            tanggal.value = selectedDate;
            poli.value = String(selected.polyclinic_id);
            loadDoctors(selected.doctor_id, selected.id);
            document.getElementById('pendaftaran')?.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            showToast(`Jadwal ${doctorName} berhasil dipilih.`);
        }
        document.addEventListener('DOMContentLoaded', () => {
            const tanggal = document.getElementById('input-tanggal');
            const poli = document.getElementById('input-poli');
            const doctor = document.getElementById('input-doctor');
            const schedule = document.getElementById('input-schedule');
            if (tanggal && poli && doctor && schedule) {
                tanggal.addEventListener('change', () => loadDoctors());
                poli.addEventListener('change', () => loadDoctors());
                doctor.addEventListener('change', () => loadSchedules());
                schedule.addEventListener('change', function() {
                    const selected = scheduleData.find(item => String(item.id) === String(this.value));
                    if (!selected) {
                        document.getElementById('input-doctor-schedule').value = '';
                        document.getElementById('summary-time').textContent = 'Belum dipilih';
                        document.getElementById('summary-doctor').textContent = 'Belum dipilih';
                        return;
                    }
                    activateBooking(selected);
                });
                updateSummary();
            }
            document.querySelectorAll('.schedule-filter').forEach(button => {
                button.addEventListener('click', function() {
                    const selectedDay = this.dataset.day;
                    document.querySelectorAll('.schedule-filter').forEach(item => {
                        item.classList.remove('bg-brand-600', 'text-white', 'shadow-sm');
                        item.classList.add('bg-slate-50', 'text-slate-600', 'border',
                            'border-slate-200');
                    });
                    this.classList.remove('bg-slate-50', 'text-slate-600', 'border-slate-200');
                    this.classList.add('bg-brand-600', 'text-white', 'shadow-sm');
                    document.querySelectorAll('.schedule-card').forEach(card => {
                        card.classList.toggle('hidden', selectedDay !== 'all' && card
                            .dataset.day !== selectedDay);
                    });
                });
            });
            const bookingForm = document.getElementById('booking-form');
            if (bookingForm) {
                bookingForm.addEventListener('submit', event => {
                    const scheduleId = document.getElementById('input-doctor-schedule')?.value;
                    if (bookingForm) {
                        bookingForm.addEventListener('submit', event => {
                            const tanggal = document.getElementById('input-tanggal')?.value;
                            const poli = document.getElementById('input-poli')?.value;
                            const doctor = document.getElementById('input-doctor')?.value;
                            const scheduleId = document.getElementById('input-doctor-schedule')?.value;
                            if (!tanggal || !poli || !doctor || !scheduleId) {
                                event.preventDefault();
                                showToast('Tanggal, poliklinik, dokter, dan jadwal wajib dipilih.', 'error');
                                return;
                            }
                            const selectedSchedule = scheduleData.find(item => String(item.id) === String(scheduleId));
                            if (!selectedSchedule || selectedSchedule.status !== 'active') {
                                event.preventDefault();
                                showToast('Jadwal yang dipilih sudah tidak tersedia.', 'error');
                                return;
                            }
                            if (String(selectedSchedule.polyclinic_id) !== String(poli) || String(selectedSchedule.doctor_id) !== String(doctor)) {
                                event.preventDefault();
                                showToast('Data jadwal tidak sesuai. Silakan pilih ulang.', 'error');
                            }
                        });
                    }
                });
            }
        });
    </script>
@endpush
