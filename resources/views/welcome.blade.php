<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pelaporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Gaya untuk latar belakang */
        body {
            background-image: url('/assets/img/kecamatan.jpeg'); /* Ubah path sesuai lokasi gambar */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            position: relative;
            overflow: hidden;
        }

        /* Overlay untuk menggelapkan latar belakang */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Perubahan kegelapan overlay */
            z-index: 1;
        }

        /* Pusatkan vertikal teks dan tombol di tepi kiri */
        #hero {
            display: flex;
            align-items: center;
            min-height: 100vh; /* Buat section setinggi viewport */
            position: relative;
            z-index: 2; /* Pastikan konten berada di atas overlay */
            padding-left: 20px; /* Tambahkan padding kiri pada seluruh hero section */
        }

        #hero .container {
            position: relative;
            z-index: 1;
            max-width: none; /* Buat container penuh lebar */
            padding-left: 0; /* Hilangkan padding default container */
        }

        /* Gaya untuk h1 dan h2 agar lebih dekat dengan pojok kiri */
        #hero h1, #hero h2 {
            color: #fff;
            margin-left: 0; /* Pastikan margin kiri nol */
        }

        /* Gaya posisi tombol login di kanan atas */
        .header-right {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 3; /* Pastikan tombol login berada di atas overlay */
        }

        /* Gaya untuk tombol Laporkan dengan ukuran lebih kecil */
        .btn-laporkan {
    padding: 3px 10px; /* Sesuaikan padding agar lebih proporsional */
    font-size: 90%; /* Ukuran font lebih kecil */
    border-radius: 2px;
    color: white;
    background-color: #6c757d;
    text-decoration: none;
    margin-top: 15px;
    display: inline-block; /* Pastikan lebar sesuai dengan teks */
    width: 20%; /* Buat lebar tombol otomatis mengikuti panjang teks */
}

/* Gaya hover untuk tombol */
.btn-laporkan:hover {
    opacity: 0.7;
}
    /* Animasi untuk logo */
    @keyframes moveLogo {
        0% {
            transform: translateY(0); /* Posisi awal */
        }
        50% {
            transform: translateY(-10px); /* Bergerak ke atas */
        }
        100% {
            transform: translateY(0); /* Kembali ke posisi awal */
        }
    }

    /* Terapkan animasi pada logo */
    .hero-img img {
        animation: moveLogo 5s ease-in-out infinite; /* Durasi 3 detik, berulang */
        max-width: 100%; /* Pastikan logo responsif */
    }


    </style>
</head>
<body>
    <!-- Tombol Login di kanan atas -->
    <div class="header-right">
        <a href="{{ url('login') }}" class="btn btn-primary">Login Admin</a>
    </div>

    <!-- Tombol Laporan Masalah di kiri tengah -->
    <section id="hero">
        <div class="container">
            <div class="col-lg-6 hero-img" data-aos="fade-left" data-aos-delay="300">
                <img src="/assets/img/logo.png" class="img-fluid animated" alt="Logo">
            </div>

            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Laporan Masyarakat Kecamatan Caringin</h1>
                    <h2 data-aos="fade-up" data-aos-delay="600">Sampaikan laporan masalah Anda di sini, kami akan memprosesnya dengan cepat, aman, dan nyaman.</h2>
                    <!-- Tombol Laporkan di bawah h1 dan h2 -->
                    <div class="header">
                        <a href="{{ route('form_pengaduan') }}" class="btn btn-primary">Adukan</a>

                </div>
            </div>
        </div>
    </section>

    <!-- Konten utama aplikasi Anda -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Script Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
