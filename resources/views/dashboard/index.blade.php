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
<div class="bg-gradient-to-r from-slate-700 to-slate-900 p-6 rounded-xl shadow flex items-center space-x-4">
    <!-- Foto Profil -->
    <img src="{{ Auth::user()->userProfile && Auth::user()->userProfile->foto
        ? asset('storage/img/' . Auth::user()->userProfile->foto)
        : asset('storage/img/default-avatar.png') }}"
        alt="Profile Photo"
        class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-lg">

    <!-- Teks -->
    <div class="text-left">
        <h2 class="text-xl font-bold text-white">Selamat Datang</h2>
        <p class="text-sm text-gray-300">
            Anda login sebagai <strong class="text-blue-400">{{ Auth::user()->role }}</strong>
        </p>
    </div>
</div>



        {{-- Statistik Ringkas --}}
       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-5 rounded-xl shadow text-white">
        <h3 class="text-sm font-medium opacity-80">📂 Total Proyek</h3>
        <p class="text-3xl font-bold mt-2">{{ $totalProyek }}</p>
    </div>

    <div class="bg-gradient-to-r from-emerald-600 to-emerald-800 p-5 rounded-xl shadow text-white">
        <h3 class="text-sm font-medium opacity-80">👥 User Aktif</h3>
        <p class="text-3xl font-bold mt-2">{{ $totalUser }}</p>
    </div>

    <div class="bg-gradient-to-r from-violet-600 to-violet-800 p-5 rounded-xl shadow text-white">
        <h3 class="text-sm font-medium opacity-80">⏰ Lembur</h3>
        <p class="text-3xl font-bold mt-2">{{ $totalLembur }}</p>
    </div>

    <div class="bg-gradient-to-r from-rose-600 to-red-700 p-5 rounded-xl shadow text-white">
        <h3 class="text-sm font-medium opacity-80">💬 Pesan</h3>
        <p class="text-3xl font-bold mt-2">{{ $totalPesan }}</p>
    </div>
</div>

        

        {{-- Grafik + Aktivitas --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-slate-800 text-gray-200 p-6 rounded-xl shadow">
    <h3 class="text-lg font-bold text-white mb-4">Aktivitas Mingguan</h3>
    <canvas id="aktivitasChart" class="h-48 w-full"></canvas>
</div>


            <div class="bg-slate-800 text-gray-200 p-6 rounded-xl shadow">
        <h3 class="text-lg font-bold text-white mb-4">Pesan Terbaru</h3>
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
<div class="bg-slate-800 p-6 rounded-xl shadow">
    <h3 class="text-lg font-bold text-white mb-4">Daftar Proyek</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border-collapse">
            <thead class="bg-slate-700 text-gray-300 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Nama Proyek</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Deadline</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                @forelse($proyek as $item)
                    <tr>
                        <td class="px-6 py-3 text-gray-100">{{ $item->nama }}</td>
                        <td class="px-6 py-3">
                            @if($item->status == 'Aktif')
                                <span class="bg-green-900/30 text-green-400 px-2 py-1 rounded text-xs">Aktif</span>
                            @else
                                <span class="bg-red-900/30 text-red-400 px-2 py-1 rounded text-xs">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-gray-300">
                            {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-3 text-center">
                            <a href="{{ route('proyek.index') }}" class="text-blue-400 hover:underline">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-3 text-center text-gray-400">
                            Belum ada proyek
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

    </div>
</x-layouts.main>

</body>
</html>