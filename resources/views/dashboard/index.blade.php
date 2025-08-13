<x-layouts.main title="Dashboard">
    <x-slot name="pageTitle">Dashboard</x-slot>
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold">Selamat datang di Dashboard</h2>
        <p class="mt-2">Anda login sebagai <strong>{{ Auth::user()->name }}</strong></p>
    </div>
</x-layouts.main>
