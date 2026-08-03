<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | RATIH ePASIEN')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
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
</head>
<body class="bg-slate-50 font-sans text-slate-900 antialiased min-h-screen">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-900 text-white flex flex-col border-r border-slate-800 fixed inset-y-0 left-0 z-50 hidden md:flex">
            <div class="h-16 px-6 flex items-center gap-3 border-b border-slate-800 font-extrabold text-lg tracking-tight">
                <span>RATIH ePASIEN</span>
            </div>
            
            <nav class="p-4 flex-1 flex flex-col gap-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold bg-brand-600 text-white transition-all shadow-md shadow-brand-600/20">
                    <span>📊</span> Dashboard
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                    <span>💼</span> Layanan
                </a>
                <a href="{{ route('admin.polyclinics.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                    <span>🏥</span> Poliklinik
                </a>
                <a href="{{ route('admin.doctors.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                    <span>👨‍⚕️</span> Data Dokter
                </a>
                <a href="{{ route('admin.schedules.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                    <span>📅</span> Jadwal Dokter
                </a>
                <a href="{{ route('admin.announcements.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                    <span>📢</span> Pengumuman
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                    <span>⚙️</span> Pengaturan
                </a>
                <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                        <span>🚪</span> Logout
                    </button>
                </form>
            </nav>
        </aside>

        <div class="flex-1 md:pl-64 flex flex-col min-w-0">
            <header class="h-16 bg-white border-b border-slate-200/80 px-6 flex items-center justify-between sticky top-0 z-40">
                <div>
                    <h1 class="text-base font-bold text-slate-900">@yield('title')</h1>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-brand-50 border border-brand-200 cursor-pointer flex items-center justify-center text-xs font-bold text-brand-700 shadow-sm" title="Profil Admin">
                        AD
                    </div>
                </div>
            </header>

            <main class="p-6 flex-1">
                @yield('content')
            </main>

            <footer class="bg-white border-t border-slate-200/80 py-4 px-6 text-center text-xs text-slate-500 font-medium">
                &copy; {{ date('Y') }} RATIH ePASIEN-NEXT. All rights reserved.
            </footer>
        </div>
    </div>

</body>
</html>