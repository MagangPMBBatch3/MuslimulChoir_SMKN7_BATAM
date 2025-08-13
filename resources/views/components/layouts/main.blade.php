<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title ?? 'Dashboard' }}</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex ">
    {{--Sidebar  --}}
    <aside class="w-64 bg-white h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Menu</h2>
            <ul>
                <li><a href="/dashboard" class="block p-2 rounded{{ request()->('dashboar') ? 'bg-blue-800 font-semibold' : 'hover:bg-blue-500'}}">Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('bagian.index') }}" class="block p-2 rounded {{ request()->('bagian') ? 'bg-blue-800 font-semibold' : 'hover:bg-blue-400'}}">Bagian</a></li>
                <li class="mb-2"><a href="{{ route('level.index') }}" class="block p-2 rounded {{ request()->('level') ? 'bg-blue-800 font-semibold' : 'hover:bg-blue-400'}}">Level</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="block w-full text-left p-2 rounded hover:bg-blue-400">Logout</button>
                    </form>
                </li>
            </ul>
    </aside>

    {{--Main Content --}}
    <div class="flex-1 p-6">
       @include('components.navbar')
            {{ $slot }}
        </div>
    
    
</body>
</html>