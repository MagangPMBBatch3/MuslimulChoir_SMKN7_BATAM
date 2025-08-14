<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Dashboard' }}</title>

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-600 text-white p-4 min-h-screen">
        <h2 class="text-xl font-bold mb-6">Menu</h2>
        <ul>
            {{-- Dashboard --}}
            <li class="mb-2">
                <a href="/dashboard"
                   class="flex items-center py-2 px-2 rounded {{ request()->is('dashboard') ? 'bg-blue-800 font-semibold' : 'hover:bg-blue-500' }}">
                    <i class='bx bx-home' style="font-size: 32px;"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>

            {{-- Master Data --}}
            <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">Master Data</li>
            <li class="mb-2">
                <a href="{{ route('bagian.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('bagian.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-collection' style="font-size: 24px;"></i>
                    <span class="ml-2">Bagian</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('level.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('level.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-layer' style="font-size: 24px;"></i>
                    <span class="ml-2">Level</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('status.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-purchase-tag-alt' style="font-size: 24px;"></i>
                    <span class="ml-2">Status</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('proyek.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-briefcase' style="font-size: 24px;"></i>
                    <span class="ml-2">Proyek</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('modejamkerja.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-time-five' style="font-size: 24px;"></i>
                    <span class="ml-2">Mode Jam Kerja</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('statusjamkerja.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-check-circle' style="font-size: 24px;"></i>
                    <span class="ml-2">Status Jam Kerja</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('jenispesanan.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-list-ul' style="font-size: 24px;"></i>
                    <span class="ml-2">Jenis Pesanan</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('keterangan.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-info-circle' style="font-size: 24px;"></i>
                    <span class="ml-2">Keterangan</span>
                </a>
            </li>

            {{-- Aktivitas & Operasional --}}
            <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">Aktivitas</li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('aktivitas.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-pulse' style="font-size: 24px;"></i>
                    <span class="ml-2">Aktivitas</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('jamkerja.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-time-five' style="font-size: 24px;"></i>
                    <span class="ml-2">Jam Kerja</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('jamkerjapertanggal.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-calendar' style="font-size: 24px;"></i>
                    <span class="ml-2">Jam Kerja per Tanggal</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('lembur.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-time' style="font-size: 24px;"></i>
                    <span class="ml-2">Lembur</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('pesan.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-message-detail' style="font-size: 24px;"></i>
                    <span class="ml-2">Pesan</span>
                </a>
            </li>

            {{-- User & Profil --}}
            <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">User</li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('user.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-user' style="font-size: 24px;"></i>
                    <span class="ml-2">Users</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                   class="flex items-center p-2 rounded {{ request()->routeIs('profile.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                    <i class='bx bx-user-circle' style="font-size: 24px;"></i>
                    <span class="ml-2">User Profile</span>
                </a>
            </li>

            {{-- Logout --}}
            <li class="mt-4">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"
                            class="bg-red-500 w-full text-left flex items-center p-2 rounded hover:bg-red-500">
                        <i class='bx bx-log-out' style="font-size: 24px;"></i>
                        <span class="ml-2">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- Main content -->
    <div class="flex-1 p-6">
        @include('components.navbar')
        {{ $slot }}
    </div>
</body>
</html>
