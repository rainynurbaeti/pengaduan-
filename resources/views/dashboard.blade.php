@extends('admin.admin-layout')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        /* Menambahkan padding kanan kiri pada grafik */
        #pengaduanChart {
            max-width: 100%;
            height: auto;
            max-height: 300px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Dashboard</h2>
            </div>

            <div class="grid grid-cols-3 gap-6 mb-6">
                <!-- Total Pengaduan -->
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex items-center">
                        <div class="bg-orange-500 p-3 rounded-full text-white mr-4">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">Total Pengaduan</p>
                            <p class="text-2xl font-bold">{{ $total->count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Belum Diproses -->
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex items-center">
                        <div class="bg-green-500 p-3 rounded-full text-white mr-4">
                            <i class="fas fa-hourglass-start"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">Belum Diproses</p>
                            <p class="text-2xl font-bold">{{ $belumDiproses }}</p>
                        </div>
                    </div>
                </div>

                <!-- Diproses -->
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex items-center">
                        <div class="bg-red-500 p-3 rounded-full text-white mr-4">
                            <i class="fas fa-spinner"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">Diproses</p>
                            <p class="text-2xl font-bold">{{ $diproses }}</p>
                        </div>
                    </div>
                </div>

                <!-- Selesai -->
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex items-center">
                        <div class="bg-blue-500 p-3 rounded-full text-white mr-4">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">Selesai</p>
                            <p class="text-2xl font-bold">{{ $selesai }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik -->
            <div class="bg-white p-6 rounded shadow mx-4 w-1/2" style="max-height: 400px;">
                <h3 class="text-xl font-bold mb-4">Statistik Pengaduan</h3>
                <canvas id="pengaduanChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Skrip untuk Inisialisasi Chart.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('pengaduanChart').getContext('2d');
            var pengaduanChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Pengaduan', 'Belum Diproses', 'Sedang Diproses', 'Selesai'],
                    datasets: [{
                        label: 'Jumlah Pengaduan',
                        data: [
                            {{ $total->count() }},
                            {{ $belumDiproses }},
                            {{ $diproses }},
                            {{ $selesai }}
                        ],
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
@endsection
