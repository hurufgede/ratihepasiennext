<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | RATIH ePASIEN-NEXT')</title>
    @vite(['resources/scss/app.scss'])
</head>
<body>

    <header class="header">
    <div class="nav">

        <a href="#" class="logo">
            RATIH
        </a>

        <nav class="menu">
            <a href="#">Beranda</a>
            <a href="#">Dokter</a>
            <a href="#">Layanan</a>
            <a href="#">Artikel</a>
            <a href="#">Kontak</a>
        </nav>

        <div class="actions">
            <a href="#" class="login">Login</a>

            <a href="#" class="booking">
                Booking
            </a>
        </div>

    </div>
</header>

    <div class="main">
        {{-- @include('admin.navbar') --}}

        <div class="container">
            @yield('content')
        </div>
    </div>

</body>
</html>