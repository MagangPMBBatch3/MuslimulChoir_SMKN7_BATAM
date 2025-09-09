<x-layouts.main title="Data Jam Kerja">
     <x-slot name="pageTitle">Data Jam Kerja</x-slot>
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">
        <h1 class="text-2xl font-bold mb-4 text-white flex items-center gap-2">
    <i class="bx bx-time-five text-cyan-400"></i>
    Data Jam Kerja
</h1>


        {{-- Tombol Tambah & Pencarian --}}
        <div class="flex justify-between mb-4">
            <input 
                type="text" 
                id="search" 
                placeholder="Cari ID atau Nama..." 
                class="bg-slate-700/70 text-gray-200 placeholder-gray-400 border border-slate-600 p-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                oninput="searchJamKerja()">
            
            <x-button variant="primary" onclick="openAddModal()">Tambah Data</x-button>
        </div>

        {{-- Tab Navigasi --}}
        <div class="mb-4">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-t" 
                    onclick="showTab('aktif')" 
                    id="tabAktif">Data Aktif</button>
            <button onclick="showTab('arsip')" 
                    id="tabArsip" 
                    class="px-4 py-2 bg-slate-600 text-gray-300 rounded-t">Data Arsip</button>
        </div>

        {{-- Table Aktif --}}
        <div id="tableAktif">
        <x-table id="dataJamKerja">
            <x-slot:head>
                <x-th align="center">ID</x-th>
                <x-th align="center">Nama User Profile</x-th>
                <x-th align="center">No WBS</x-th>
                <x-th align="center">Kode Proyek</x-th>
                <x-th align="center">Nama Proyek</x-th>
                <x-th align="center">Nama Aktivitas</x-th>
                <x-th align="center">Tanggal</x-th>
                <x-th align="center">Jumlah Jam</x-th>
                <x-th align="center">Keterangan</x-th>
                <x-th align="center">Status Jam Kerja</x-th>
                <x-th align="center">Mode</x-th>
                <x-th align="center">Aksi</x-th>
            </x-slot:head>
        </x-table>
        </div>

        {{-- Table Arsip --}}
        <div id="tableArsip" class="hidden">
        <x-table id="dataJamKerjaArsip">
                <x-slot:head>
                    <x-th align="center">ID</x-th>
                    <x-th align="center">Nama User Profile</x-th>
                    <x-th align="center">No WBS</x-th>
                    <x-th align="center">Kode Proyek</x-th>
                    <x-th align="center">Nama Proyek</x-th>
                    <x-th align="center">Nama Aktivitas</x-th>
                    <x-th align="center">Tanggal</x-th>
                    <x-th align="center">Jumlah Jam</x-th>
                    <x-th align="center">Keterangan</x-th>
                    <x-th align="center">Status Jam Kerja</x-th>
                    <x-th align="center">Mode</x-th>
                    <x-th align="center">Aksi</x-th>
                </x-slot:head>
        </x-table>
        </div>
    </div>

    {{-- Modal Tambah --}}
    @include('components.jamkerja.modal-add')

    {{-- Modal Edit --}}
    @include('components.jamkerja.modal-edit')

    {{-- Script --}}
    <script src="{{ asset('js/jamkerja/jamkerja.js') }}"></script>
    <script src="{{ asset('js/jamkerja/jamkerja-create.js') }}"></script>
    <script src="{{ asset('js/jamkerja/jamkerja-edit.js') }}"></script>

    <script>
        function showTab(tab) {
            const tabAktif = document.getElementById('tabAktif');
            const tabArsip = document.getElementById('tabArsip');
            const tableAktif = document.getElementById('tableAktif');
            const tableArsip = document.getElementById('tableArsip');

            if (tab === 'aktif') {
                tabAktif.classList.add('bg-blue-500', 'text-white');
                tabAktif.classList.remove('bg-slate-600', 'text-gray-300');
                tabArsip.classList.remove('bg-blue-500', 'text-white');
                tabArsip.classList.add('bg-slate-600', 'text-gray-300');
                tableAktif.classList.remove('hidden');
                tableArsip.classList.add('hidden');
            } else {
                tabArsip.classList.add('bg-blue-500', 'text-white');
                tabArsip.classList.remove('bg-slate-600', 'text-gray-300');
                tabAktif.classList.remove('bg-blue-500', 'text-white');
                tabAktif.classList.add('bg-slate-600', 'text-gray-300');
                tableArsip.classList.remove('hidden');
                tableAktif.classList.add('hidden');
            }
        }
    </script>
</x-layouts.main>
