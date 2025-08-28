<x-layouts.main title="Data Jam Kerja">
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">
        <h1 class="text-2xl font-bold mb-4 text-white">Data Jam Kerja</h1>

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
            <table class="w-full border border-slate-700 rounded-lg overflow-hidden">
                <thead class="bg-slate-700 text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="border border-slate-600 p-2 text-center">ID</th>
                        <th class="border border-slate-600 p-2">Nama User Profile</th>
                        <th class="border border-slate-600 p-2">No WBS</th>
                        <th class="border border-slate-600 p-2">Kode Proyek</th>
                        <th class="border border-slate-600 p-2">Nama Proyek</th>
                        <th class="border border-slate-600 p-2">Nama Aktivitas</th>
                        <th class="border border-slate-600 p-2">Tanggal</th>
                        <th class="border border-slate-600 p-2">Jumlah Jam</th>
                        <th class="border border-slate-600 p-2">Keterangan</th>
                        <th class="border border-slate-600 p-2">Status Jam Kerja</th>
                        <th class="border border-slate-600 p-2">Mode</th>
                        <th class="border border-slate-600 p-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataJamKerja" class="divide-y divide-slate-700 text-gray-200"></tbody>
            </table>
        </div>

        {{-- Table Arsip --}}
        <div id="tableArsip" class="hidden">
            <table class="w-full border border-slate-700 rounded-lg overflow-hidden">
                <thead class="bg-slate-700 text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="border border-slate-600 p-2 text-center">ID</th>
                        <th class="border border-slate-600 p-2">Nama User Profile</th>
                        <th class="border border-slate-600 p-2">No WBS</th>
                        <th class="border border-slate-600 p-2">Kode Proyek</th>
                        <th class="border border-slate-600 p-2">Nama Proyek</th>
                        <th class="border border-slate-600 p-2">Nama Aktivitas</th>
                        <th class="border border-slate-600 p-2">Tanggal</th>
                        <th class="border border-slate-600 p-2">Jumlah Jam</th>
                        <th class="border border-slate-600 p-2">Keterangan</th>
                        <th class="border border-slate-600 p-2">Status Jam Kerja</th>
                        <th class="border border-slate-600 p-2">Mode</th>
                        <th class="border border-slate-600 p-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataJamKerjaArsip" class="divide-y divide-slate-700 text-gray-200"></tbody>
            </table>
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
