<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/js/app.js')
    <title>Dashboard</title>
</head>
<body>
    {{-- resources/views/dashboard.blade.php --}}
<x-layouts.main title="Dashboard">
    <x-slot name="pageTitle">Dashboard</x-slot>

    <div class="space-y-6">
        {{-- Header --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-2xl font-bold text-blue-700">Selamat Datang</h2>
            <p class="mt-2 text-gray-600">
                Anda login sebagai <strong>{{ Auth::user()->name }}</strong>
            </p>
        </div>

        {{-- Statistik Ringkas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-5 rounded-xl shadow text-white">
                <h3 class="text-lg font-semibold">Total Proyek</h3>
                <p class="text-3xl font-bold mt-2">12</p>
            </div>
            <div class="bg-gradient-to-r from-green-500 to-green-700 p-5 rounded-xl shadow text-white">
                <h3 class="text-lg font-semibold">User Aktif</h3>
                <p class="text-3xl font-bold mt-2">34</p>
            </div>
            <div class="bg-gradient-to-r from-purple-500 to-purple-700 p-5 rounded-xl shadow text-white">
                <h3 class="text-lg font-semibold">Lembur</h3>
                <p class="text-3xl font-bold mt-2">5</p>
            </div>
            <div class="bg-gradient-to-r from-pink-500 to-red-500 p-5 rounded-xl shadow text-white">
                <h3 class="text-lg font-semibold">Pesan</h3>
                <p class="text-3xl font-bold mt-2">18</p>
            </div>
        </div>

        {{-- Grafik + Aktivitas --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-lg font-bold text-gray-700 mb-4">Aktivitas Mingguan</h3>
    <canvas id="aktivitasChart" class="h-48 w-full"></canvas>
</div>


            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Pesan Terbaru</h3>
                <ul class="divide-y divide-gray-200">
                    <li class="py-3">
                        <p class="font-semibold">Weillsun</p>
                        <p class="text-sm text-gray-600">Dedline Proyek Hari Sabtu</p>
                    </li>
                    <li class="py-3">
                        <p class="font-semibold">Farhan</p>
                        <p class="text-sm text-gray-600">Proyek A selesai 70%</p>
                    </li>
                    <li class="py-3">
                        <p class="font-semibold">Lucky</p>
                        <p class="text-sm text-gray-600">Meeting besok jam 10</p>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Tabel Proyek --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-bold text-gray-700 mb-4">Daftar Proyek</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-600">
                    <thead class="text-xs uppercase bg-blue-100 text-blue-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Proyek</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Deadline</th>
                            <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-6 py-3">Proyek Website</td>
                            <td class="px-6 py-3"><span class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs">Aktif</span></td>
                            <td class="px-6 py-3">30 Agustus 2025</td>
                            <td class="px-6 py-3 text-center">
                                <a href="#" class="text-blue-600 hover:underline">Detail</a>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-6 py-3">Proyek Mobile App</td>
                            <td class="px-6 py-3"><span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded text-xs">Proses</span></td>
                            <td class="px-6 py-3">15 September 2025</td>
                            <td class="px-6 py-3 text-center">
                                <a href="#" class="text-blue-600 hover:underline">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3">Proyek ERP</td>
                            <td class="px-6 py-3"><span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs">Tertunda</span></td>
                            <td class="px-6 py-3">-</td>
                            <td class="px-6 py-3 text-center">
                                <a href="#" class="text-blue-600 hover:underline">Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.main>

</body>
</html>