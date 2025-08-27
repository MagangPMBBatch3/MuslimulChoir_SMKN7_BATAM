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
        <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-4">
    <!-- Foto Profil -->
<img src="{{ Auth::user()->userProfile && Auth::user()->userProfile->foto
    ? asset('storage/img/' . Auth::user()->userProfile->foto)
    : asset('storage/img/default-avatar.png') }}"
    alt="Profile Photo"
    class="w-24 h-24 rounded-full object-cover border-2 border-blue-400 shadow-md ">
        

    <!-- Teks -->
    <div class="text-left">
        <h2 class="text-lg font-bold text-blue-700">Selamat Datang</h2>
        <p class="text-gray-600 text-sm">
            Anda login sebagai <strong>{{ Auth::user()->name }}</strong>
        </p>
    </div>
</div>



        {{-- Statistik Ringkas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-5 rounded-xl shadow text-white">
            <h3 class="text-lg font-semibold">📂 Total Proyek</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalProyek }}</p>
        </div>

        <div class="bg-gradient-to-r from-green-500 to-green-700 p-5 rounded-xl shadow text-white">
            <h3 class="text-lg font-semibold">👥 User Aktif</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalUser }}</p>
        </div>

        <div class="bg-gradient-to-r from-purple-500 to-purple-700 p-5 rounded-xl shadow text-white">
            <h3 class="text-lg font-semibold">⏰ Lembur</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalLembur }}</p>
        </div>

        <div class="bg-gradient-to-r from-pink-500 to-red-500 p-5 rounded-xl shadow text-white">
            <h3 class="text-lg font-semibold">💬 Pesan</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalPesan }}</p>
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
            @forelse($pesanTerbaru as $pesan)
                <li class="py-3">
                    <p class="font-semibold">{{ $pesan->pengirim }}</p>
                    <p class="text-sm text-gray-600">{{ $pesan->isi }}</p>
                    <p class="text-xs text-gray-400">{{ $pesan->tgl_pesan->format('d M Y H:i') }}</p>
                </li>
        @empty
            <li class="py-3 text-gray-500">Belum ada pesan</li>
        @endforelse
    </ul>
</div>
</div>


        {{-- Tabel Proyek --}}
        <div class="bg-white p-6 rounded-xl shadow w-full">
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

        <div class="grid grid-cols-1 lg:grid-cols-2  bg-white shadow rounded-xl p-6 w-full max-w-sm">
    <div class="flex items-center space-x-4">
        <img class="w-16 h-16 rounded-full border border-gray-200 object-cover" 
             src="https://via.placeholder.com/150" 
             alt="Foto Member">
        <div>
            <h4 class="text-lg font-semibold text-gray-800">123456789</h4> {{-- NRP --}}
            <p class="text-sm text-gray-500">Jl. Mawar No. 10, Batam</p> {{-- Alamat --}}
        </div>
    </div>
</div>

    </div>
</x-layouts.main>

</body>
</html>