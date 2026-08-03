<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'RATIH ePasien')
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: [
                            'Plus Jakarta Sans',
                            'sans-serif'
                        ],
                    },

                    colors: {
                        brand: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            900: '#064e3b',
                            accent: '#0d9488',
                            secondary: '#0284c7'
                        }
                    }
                }
            }
        }
    </script>


    @stack('styles')

</head>


<body class="bg-slate-50 text-slate-800 font-sans">


    {{-- ================= HEADER ================= --}}

    <nav class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-600 to-brand-accent flex items-center justify-center text-white shadow-md shadow-brand-500/20">
                    <i class="ph-bold ph-activity text-2xl"></i>
                </div>
                <div>
                    <span class="font-bold text-lg text-slate-900 tracking-tight block leading-none">RATIH <span
                            class="text-brand-600">ePasien</span></span>
                    <span class="text-[10px] text-slate-400 font-semibold tracking-widest uppercase block mt-1">RSU
                        Ratih Digital Center</span>
                </div>
            </div>

            <div
                class="hidden md:flex items-center gap-8 text-xs font-semibold uppercase tracking-wider text-slate-600">
                <a href="#triage" class="hover:text-brand-600 transition-colors">AI Triage</a>
                <a href="#layanan" class="hover:text-brand-600 transition-colors">Layanan</a>
                <a href="#dokter" class="hover:text-brand-600 transition-colors">Dokter</a>
                <a href="#kalkulator" class="hover:text-brand-600 transition-colors">Health Suite</a>
                <a href="#jadwal" class="hover:text-brand-600 transition-colors">Jadwal</a>
            </div>

            <div class="hidden md:flex items-center gap-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs shadow-lg shadow-brand-500/20 transition-all flex items-center gap-2">
                        <i class="ph-bold ph-sign-out"></i>
                        Logout
                    </button>
                </form>
            </div>

            <button onclick="toggleMobileMenu()" class="md:hidden text-slate-700 focus:outline-none p-2">
                <i id="menu-icon" class="ph-bold ph-list text-2xl"></i>
            </button>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-100 px-4 pt-2 pb-6 space-y-3">
            <a href="#triage" onclick="toggleMobileMenu()"
                class="block text-sm font-semibold text-slate-700 hover:text-brand-600">AI Triage</a>
            <a href="#layanan" onclick="toggleMobileMenu()"
                class="block text-sm font-semibold text-slate-700 hover:text-brand-600">Layanan</a>
            <a href="#dokter" onclick="toggleMobileMenu()"
                class="block text-sm font-semibold text-slate-700 hover:text-brand-600">Dokter</a>
            <a href="#kalkulator" onclick="toggleMobileMenu()"
                class="block text-sm font-semibold text-slate-700 hover:text-brand-600">Health Suite</a>
            <a href="#jadwal" onclick="toggleMobileMenu()"
                class="block text-sm font-semibold text-slate-700 hover:text-brand-600">Jadwal Dokter</a>
            <a href="#pendaftaran" onclick="toggleMobileMenu()"
                class="block w-full text-center py-3 rounded-xl bg-brand-600 text-white font-bold text-xs">Daftar
                Antrean Online</a>
        </div>
    </nav>



    {{-- ================= CONTENT ================= --}}

    <main>

        @yield('content')

    </main>



    {{-- ================= FOOTER ================= --}}

    <footer class="bg-slate-900 text-slate-400 py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div class="space-y-4 md:col-span-1">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-brand-600 flex items-center justify-center text-white font-bold">
                        <i class="ph-bold ph-activity text-xl"></i>
                    </div>
                    <span class="font-bold text-base text-white tracking-tight">RSU RATIH</span>
                </div>
                <p class="text-xs leading-relaxed text-slate-400">
                    Pelayanan kesehatan modern terpercaya dengan integrasi sistem antrean dan AI Triage digital.
                </p>
            </div>

            <div>
                <h4 class="font-bold text-sm text-white mb-4">Navigasi Utama</h4>
                <ul class="space-y-2.5 text-xs">
                    <li><a href="#triage" class="hover:text-brand-500 transition-colors">AI Triage</a></li>
                    <li><a href="#layanan" class="hover:text-brand-500 transition-colors">Modul Layanan</a></li>
                    <li><a href="#dokter" class="hover:text-brand-500 transition-colors">Dokter Spesialis</a></li>
                    <li><a href="#kalkulator" class="hover:text-brand-500 transition-colors">Health Suite</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-sm text-white mb-4">Kontak & Alamat</h4>
                <ul class="space-y-2.5 text-xs">
                    <li class="flex items-center gap-2"><i class="ph-bold ph-map-pin text-brand-500"></i> Jl. Penanggungan No.32, Bandar Kidul, Kec. Mojoroto, Kota Kediri, Jawa Timur 64118</li>
                    <li class="flex items-center gap-2"><i class="ph-bold ph-phone text-brand-500"></i> 0354 779500
                    </li>
                    <li class="flex items-center gap-2"><i class="ph-bold ph-envelope text-brand-500"></i>
                        rsu_ratihkediri@yahoo.co.id</li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-sm text-white mb-4">Buletin Kesehatan</h4>
                <p class="text-xs text-slate-400 mb-3">Dapatkan info medis & edukasi secara rutin.</p>
                <div class="flex gap-2">
                    <input type="email" placeholder="Email Anda"
                        class="w-full px-3 py-2 bg-slate-800 border border-slate-700 rounded-xl text-xs text-white focus:outline-none focus:border-brand-500">
                    <button onclick="showToast('Berhasil berlangganan buletin!')"
                        class="px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs rounded-xl transition-all">Kirim</button>
                </div>
            </div>
        </div>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-6 border-t border-slate-800 text-center text-xs text-slate-500">
            Copyright &copy; 2026 RSU RATIH KEDIRI
        </div>
    </footer>
    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none">
    </div>
    @stack('scripts')
</body>

</html>
