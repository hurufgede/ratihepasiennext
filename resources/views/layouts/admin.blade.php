<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | RATIH ePASIEN-NEXT')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* --- RESET & BASE STYLES --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc; /* Slate 50 */
            color: #0f172a; /* Slate 900 */
            min-height: 100vh;
        }

        /* --- LAYOUT UTAMA --- */
        .admin-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* --- SIDEBAR (Kiri) --- */
        .sidebar {
            width: 260px;
            background-color: #0f172a; /* Slate 900 */
            color: #ffffff;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #1e293b;
            position: sticky;
            top: 0;
            height: 100vh;
            z-index: 100;
        }

        .sidebar-brand {
            height: 70px;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid #1e293b;
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        .brand-logo {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.875rem;
        }

        .sidebar-menu {
            padding: 1.5rem 1rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            color: #94a3b8;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .menu-link:hover {
            background-color: #1e293b;
            color: #ffffff;
        }

        .menu-link.active {
            background-color: #4f46e5;
            color: #ffffff;
        }

        /* --- MAIN WORKSPACE (Kanan) --- */
        .main-workspace {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0; /* Mencegah flexbox memecah layout tabel */
        }

        /* --- HEADER --- */
        .main-header {
            height: 70px;
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .header-left h1 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-profile {
            width: 38px;
            height: 38px;
            background-color: #f1f5f9;
            border-radius: 50%;
            border: 2px solid #e2e8f0;
            cursor: pointer;
        }

        /* --- AREA KONTEN UTAMA --- */
        .main-content {
            padding: 2rem;
            flex: 1;
        }

        /* --- FOOTER --- */
        .main-footer {
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 1.25rem 2rem;
            text-align: center;
            font-size: 0.875rem;
            color: #64748b;
            font-weight: 500;
        }

        /* --- RESPONSIVE SIDEBAR --- */
        @media (max-width: 768px) {
            .sidebar {
                display: none; /* Menyembunyikan sidebar di layar HP */
            }
            .main-header {
                padding: 0 1rem;
            }
            .main-content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="brand-logo">R</div>
                <span>ePASIEN-NEXT</span>
            </div>
            <nav class="sidebar-menu">
                <a href="{{ route('admin.dashboard') }}" class="menu-link active">📊 Dashboard</a>
                <a href="{{ route('admin.services.index') }}" class="menu-link">🏥 Layanan</a>
                <a href="{{ route('admin.polyclinics.index') }}" class="menu-link">🏥 Poliklinik</a>
                <a href="{{ route('admin.doctors.index') }}" class="menu-link">👨‍⚕️ Data Dokter</a>
                <a href="{{ route('admin.schedules.index') }}" class="menu-link">👨‍⚕️ Jadwal Dokter</a>
                <a href="{{ route('admin.announcements.index') }}" class="menu-link">📢 Pengumuman</a>
                <a href="{{ route('admin.settings.index') }}" class="menu-link">📢 Pengaturan</a>
            </nav>
        </aside>

        <div class="main-workspace">
            <header class="main-header">
                <div class="header-left">
                    <h1>@yield('title')</h1>
                </div>
                <div class="header-right">
                    <div class="user-profile" title="Profil Admin"></div>
                </div>
            </header>

            <main class="main-content">
                @yield('content')
            </main>

            <footer class="main-footer">
                &copy; {{ date('Y') }} RATIH ePASIEN-NEXT. All rights reserved.
            </footer>
        </div>
    </div>

</body>
</html>