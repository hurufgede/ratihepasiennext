<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RATIH ePASIEN NEXT')</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }
        
        body{
            background: white;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .nav{
            position:fixed;
            top: 0;
            width:70%;
            background:#ffffff;
            color: #215122;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:20px 20px;
        }

        .nav ul{
            display:flex;
            list-style:none;
        }

        .nav ul li{
            margin:0 10px;
        }

        .nav ul li a{
            color:#215122;
            font-size:13.3px;
            text-decoration:none;
            font-weight:bold;
        }

        .nav button{
            padding:10px 40px;
            background: #215122;   
            color: #fff;
            border:none;
            text-decoration:none;
            border-radius:50px;
        }

        .container{
            margin-top:80px;
            padding:20px;
            background:#f8f9fa;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .footer{
            margin-top:20px;
            padding:20px;
            background:#215122;
            color:#fff;
            text-align:center;
        }

        .footer ul{
            display:flex;
            justify-content:center;
            list-style:none;
            margin-top:20px;
        }

        .footer ul li{
            margin:0 15px;
        }

        
    </style>
</head>
<body>

    <div class="nav">
        <h3>RATIH ePASIEN NEXT</h3>
        <ul>
            <li><a href="/">Beranda</a></li>
            <li><a href="/about">Tentang</a></li>
            <li><a href="/contact">Dokter</a></li>
            <li><a href="/contact">Jadwal</a></li>
            <li><a href="/contact">Booking</a></li>
        </ul>
        <ul>
            <li><a><i>call</i></a></li>
            <button><a href="/login">Masuk</a></button>
        </ul>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <div class="footer">
        <h1>Sahabat sehat untuk keluarga Anda.</h1>
        <ul>
            <h3>Tautan</h3>
            <li>Tentang Kami</li>
            <li>Dokter Kami</li>
            <li>Jadwal Praktek</li>
            <li>Buat Janji</li>
        </ul>
        <h1>Sahabat sehat untuk keluarga Anda.</h1>
        <ul>
            <h3>Kontak</h3>
            <li>Jl blabla</li>
            <li>08123456789</li>
            <li>info@ratih.epasien.next</li>
            <li>Senin-Sabtu </li>
        </ul>

        <p>&copy; 2023 RATIH ePASIEN NEXT. All rights reserved.</p>
    </div>

</body>
</html>