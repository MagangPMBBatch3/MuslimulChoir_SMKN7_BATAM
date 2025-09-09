<x-layouts.main title="Data Proyek">
     <x-slot name="pageTitle">Proyek</x-slot>
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">
       <h1 class="text-2xl font-bold mb-4 text-white flex items-center gap-2">
    <i class="bx bx-briefcase text-cyan-400"></i>
    Data Proyek
</h1>


        {{-- Search & Tambah --}}
        <div class="flex justify-between mb-4">
            <input 
                type="text" 
                id="searchProyek" 
                placeholder="Cari ID atau Nama..." 
                class="bg-slate-700/70 text-gray-200 placeholder-gray-400 border border-slate-600 p-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                oninput="searchProyek()">
            
            <x-button variant="primary" onclick="openAddProyekModal()">Tambah Data</x-button>
        </div>

        {{-- Tabs --}}
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
            <x-table id="dataProyek">
                    <x-slot:head>
                        <x-th align="center">ID</x-th>
                        <x-th align="center">Kode</x-th>
                        <x-th align="center">Nama</x-th>
                        <x-th align="center">Tanggal</x-th>
                        <x-th align="center">Nama Sekolah</x-th>
                        <x-th align="center">Aksi</x-th>
                    </x-slot:head>
            </x-table>
        </div>

        {{-- Table Arsip --}}
        <div id="tableArsip" class="hidden">
            <x-table id="dataProyekArsip">
                    <x-slot:head>
                        <x-th align="center">ID</x-th>
                        <x-th align="center">Kode</x-th>
                        <x-th align="center">Nama</x-th>
                        <x-th align="center">Tanggal</x-th>
                        <x-th align="center">Nama Sekolah</x-th>
                        <x-th align="center">Aksi</x-th>
                    </x-slot:head>
            </x-table>
        </div>

        {{-- Modal --}}
        @include('components.proyek.modal-add')
        @include('components.proyek.modal-edit')

        {{-- Scripts --}}
        <script src="{{ asset('js/proyek/proyek.js') }}"></script>
        <script src="{{ asset('js/proyek/proyek-create.js') }}"></script>
        <script src="{{ asset('js/proyek/proyek-edit.js') }}"></script>

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

                loadProyekData();
            }
        </script>
    </div>
</x-layouts.main>
