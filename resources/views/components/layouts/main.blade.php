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
    <style>
    @keyframes gradient-move {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
    }

    .animate-text {
    background-size: 200% 200%;
    animation: gradient-move 4s ease infinite;
    }
    </style>
<body class="bg-gray-900 flex text-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-gray-800 to-gray-900 text-gray-200 p-4 min-h-screen shadow-xl">
        <h1 class="text-4xl font-extrabold mb-8 text-center bg-gradient-to-r from-blue-400 via-cyan-400 to-green-400 bg-clip-text text-transparent tracking-wider drop-shadow-lg animate-text">Menu</h1>


        <ul class="space-y-2">
            {{-- Dashboard --}}
            <li>
                <a href="/dashboard"
                   class="flex items-center py-2 px-3 rounded-lg transition duration-200 
                          {{ request()->is('dashboard') ? 'bg-gray-900 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                    <i class='bx bx-home text-lg'></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('profile.index') }}"
                   class="flex items-center py-2 px-3 rounded-lg transition duration-200 
                          {{ request()->is('profile') ? 'bg-gray-900 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                    <i class='bx bxs-user-rectangle text-lg'></i> 
                    <span class="ml-3">Profile</span>
                </a>
            </li>

            <li>
                <a href="{{ route('member.index') }}"
                class="flex items-center py-2 px-3 rounded-lg transition duration-200 
                        {{ request()->is('member') ? 'bg-gray-900 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                    <i class='bx bxs-user text-lg'></i> 
                    <span class="ml-3">Member</span>
                </a>
            </li>


            {{-- Master Data --}}
            @if(Auth::user()->role === 'admin')
            <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">Master Data</li>
            <li class="mb-2">
                <a href="{{ route('bagian.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('bagian.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-collection' style="font-size: 18px;"></i>
                    <span class="ml-2">Bagian</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('level.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('level.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-layer' style="font-size: 18px;"></i>
                    <span class="ml-2">Level</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('status.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('status.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-purchase-tag-alt' style="font-size: 18px;"></i>
                    <span class="ml-2">Status</span>
                </a>
            </li>         
    @endif

     {{-- User & Profil --}}
             @if(Auth::user()->role === 'admin')
            <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">User</li>
            <li class="mb-2">
                <a href="{{ route('user.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('user.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-user' style="font-size: 18px;"></i>
                    <span class="ml-2">Users</span>
                </a>
            </li> 
            <li class="mb-2">
                <a href="{{ route('userprofile.index') }}"
                  class="flex items-center py-2 px-3 rounded-lg transition duration-200 
                          {{ request()->is('userprofile') ? 'bg-gray-900 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                    <i class='bx bx-user-circle' style="font-size: 18px;"></i>
                    <span class="ml-2">User Profile</span>
                </a>
            </li>
        @endif

        {{-- Proyek & Proyek User  --}}
             <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">Proyek</li>
            <li class="mb-2">
                <a href="{{ route('proyek.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('proyek.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-briefcase' style="font-size: 18px;"></i>
                    <span class="ml-2">Proyek</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('proyekuser.index') }}"
                class="flex items-center py-2 px-3 rounded-lg transition duration-200 
                          {{ request()->is('proyekuser') ? 'bg-gray-900 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                   <i class='bx bx-briefcase-alt-2'  style="font-size: 18px;"></i> 
                    <span class="ml-2">Proyek User</span>
                </a>
            </li>

    {{-- Aktivitas --}}
        <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">Aktivitas</li>
            <li class="mb-2">
                <a href="{{ route('aktivitas.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('aktivitas.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-pulse' style="font-size: 18px;"></i>
                    <span class="ml-2">Aktivitas</span>
                </a>
            </li>

    {{-- jam Kerja --}}
             <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">Jam Kerja</li>
            <li class="mb-2">
                <a href="{{ route('jamkerja.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('jamkerja.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-time-five' style="font-size: 18px;"></i>
                    <span class="ml-2">Jam Kerja</span>
                </a>
            </li>

            <li class="mb-2">
                <a href="{{ route('lembur.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('lembur.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-time' style="font-size: 18px;"></i>
                    <span class="ml-2">Lembur</span>
                </a>
            </li>

             @if(Auth::user()->role === 'admin')
            <li class="mb-2">
                <a href="{{ route('mode.index') }}"
                  class="flex items-center py-2 px-3 rounded-lg transition duration-200 
                          {{ request()->is('mode') ? 'bg-gray-900 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                    <i class='bx bx-time-five' style="font-size: 18px;"></i>
                    <span class="ml-2">Mode Jam Kerja</span>
                </a>
            </li>
        @endif

             {{-- Jam Kerja per Tanggal --}}
            
            <li class="mb-2">
                <a href="{{ route('jamkerjapertanggal.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('jamkerjapertanggal.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-calendar' style="font-size: 18px;"></i>
                    <span class="ml-2">Jam Kerja per Tanggal</span>
                </a>
            </li>

             @if(Auth::user()->role === 'admin')
            <li class="mb-2">
                <a href="{{ route('statusjam.index') }}"
                  class="flex items-center py-2 px-3 rounded-lg transition duration-200 
                          {{ request()->is('statusjam') ? 'bg-gray-900 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                    <i class='bx bx-check-circle' style="font-size: 18px;"></i>
                    <span class="ml-2">Status Jam Kerja</span>
                </a>
            </li>
        @endif

            {{-- Pesan & Jenis Pesan --}}
             <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">Pesan</li>
             <li class="mb-2">
                <a href="{{ route('pesan.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('pesan.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-message-detail' style="font-size: 18px;"></i>
                    <span class="ml-2">Pesan</span>
                </a>
            </li>

             @if(Auth::user()->role === 'admin')
            <li class="mb-2">
                <a href="{{ route('jenispesan.index') }}"
                   class="flex items-center py-2 px-3 rounded-lg transition duration-200 
                          {{ request()->is('jenispesan') ? 'bg-gray-900 text-white shadow-md' : 'hover:bg-gray-700 hover:text-white' }}">
                    <i class='bx bx-list-ul' style="font-size: 18px;"></i>
                    <span class="ml-2">Jenis Pesan</span>
                </a>
            </li>
        @endif

             <li class="mt-4 text-xs uppercase text-blue-200 font-semibold">Keterangan</li>
            <li class="mb-2">
                <a href="{{ route('keterangan.index') }}"
                   class="flex items-center p-2 rounded {{ request()->routeIs('keterangan.*') ? 'bg-gray-900 text-with shadow-md font-semibold' : 'hover:bg-gray-700' }}">
                    <i class='bx bx-info-circle' style="font-size: 18px;"></i>
                    <span class="ml-2">Keterangan</span>
                </a>
            </li>

            {{-- Logout --}}
            <li class="mt-6">
                <form action="/logout" method="POST">
                    @csrf
                    <x-button type="submit" variant="danger" class="flex items-center w-full shadow-md">
                        <i class='bx bx-log-out text-lg'></i>
                        <span class="ml-3">Logout</span>
                    </x-button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- Main content -->
    <div class="flex-1 p-6 bg-gray-800/40">
        @include('components.navbar')
        <div class="mt-4">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
