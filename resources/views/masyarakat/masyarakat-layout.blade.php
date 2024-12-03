<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 256px;
            background: linear-gradient(#2f55bf, #b0f4ff);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        .sidebar h1 {
            padding: 16px;
            font-size: 1.25rem;
            font-weight: bold;
            color: white;
            margin-top: 40px; /* Menurunkan teks "Halaman Masyarakat" */
        }
        .sidebar h1 img {
            width: 50px; /* Ukuran logo lebih kecil */
            height: 50px;
            margin-right: 10px; /* Jarak antara logo dan teks */
            vertical-align: middle; /* Menjaga logo sejajar secara vertikal dengan teks */
        }
        .sidebar ul {
            flex-grow: 1;
            padding: 0;
            margin: 0;
            list-style: none;
        }
        .sidebar li {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            cursor: pointer;
            transition: background-color 0.2s;
            color: white;
        }
        .sidebar li i {
            margin-right: 12px;
        }
        .sidebar li:hover {
            background-color: #a7dcea;
        }

        .sidebar .button-container {
            padding: 16px;
        }
        .sidebar .logout-button {
            width: 100%;
            background-color: #28388b;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
            text-align: center;
        }
        .sidebar .logout-button:hover {
            background-color: #06f4e8;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f9f9f9;
        }

    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h1><img src="{{ asset('assets/img/logo.png') }}" alt="Logo"> Halaman Masyarakat</h1>
        <ul>
            <li class="active">
                <i class="fas fa-tachometer-alt"></i>
                <a href="/form_pengaduan" style="color: white;">Laporkan</a>
            </li>
            <li>
                <i class="fas fa-bullhorn"></i>
                <a class="nav-link" href="{{ url('/isi-pengaduan') }}" style="color: white;">Isi Laporan</a>
            </li>
        </ul>
        <div class="button-container">
            <button class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
