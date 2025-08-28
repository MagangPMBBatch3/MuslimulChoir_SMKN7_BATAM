<x-layouts.main title="Data Bagian">
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">
        <h1 class="text-2xl font-bold mb-4 text-white">Data Bagian</h1>

        {{-- Tombol Tambah & Pencarian --}}
        <div class="flex justify-between mb-4">
            <input 
                type="text" 
                id="search" 
                placeholder="Cari ID atau Nama..." 
                class="bg-slate-700/70 text-gray-200 placeholder-gray-400 border border-slate-600 p-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                oninput="searchBagian()">

            <x-button variant="primary" onclick="openAddModal()">Tambah Data</x-button>
        </div>

        {{-- Tabel Data --}}
        <table class="w-full border border-slate-700 rounded-lg overflow-hidden">
            <thead class="bg-slate-700 text-gray-300 uppercase text-xs">
                <tr>
                    <th class="border border-slate-600 p-2 text-center">ID</th>
                    <th class="border border-slate-600 p-2">Nama</th>
                    <th class="border border-slate-600 p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataBagian" class="divide-y divide-slate-700 text-gray-200"></tbody>
        </table>
    </div>

    {{-- Include Modal Tambah --}}
    @include('components.bagian.modal-add')

    {{-- Include Modal Edit --}}
    @include('components.bagian.modal-edit')

    {{-- Script --}}
    <script src="{{ asset('js/bagian/bagian.js') }}"></script>
    <script src="{{ asset('js/bagian/bagian-create.js') }}"></script>
    <script src="{{ asset('js/bagian/bagian-edit.js') }}"></script>
</x-layouts.main>
