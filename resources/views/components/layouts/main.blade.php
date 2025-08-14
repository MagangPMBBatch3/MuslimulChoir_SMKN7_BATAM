<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">
    <aside class="w-64 bg-blue-600 text-white h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Menu</h2>
        <ul>
            <li><a href="/dashboard" class="block py-2 px-2 rounded {{ request()->is('dashboard') ? 'bg-blue-800 font-semibold' : 'hover:bg-blue-500' }}">
            Dashboard</a></li>

            <li class="mb-2"><a href="{{ route('bagian.index') }}" class=" block p-2 rounded {{ request()->routeIs('bagian.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                Bagian</a></li>

            <li class="mb-2"><a href="#" class=" block p-2 rounded {{ request()->routeIs('level.*') ? 'bg-blue-800 font-semibold' : 'hover:bg-cyan-400' }}">
                Level</a></li>

            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left block p-2 rounded hover:bg-red-500">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    {{-- main content --}}
    <div class="flex-1 p-6">
        @include('components.navbar')
        {{ $slot }}
    </div>
</body>
</html>