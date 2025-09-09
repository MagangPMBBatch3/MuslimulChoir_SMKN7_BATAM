<x-layouts.main title="Data User Profile">
     <x-slot name="pageTitle">User Profile</x-slot>
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">
        <h1 class="text-2xl font-bold mb-4 text-white flex items-center gap-2">
    <i class="bx bx-id-card text-cyan-400"></i>
    Data User Profile
</h1>


        {{-- Search & Tambah --}}
        <div class="flex justify-between mb-4">
            <input 
                type="text" 
                id="search" 
                placeholder="Cari ID atau Nama..." 
                class="bg-slate-700/70 text-gray-200 placeholder-gray-400 border border-slate-600 p-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                oninput="searchUserProfile()">
            
            <button onclick="openAddModal()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                Tambah Data
            </button>
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
            <x-table id="dataUserProfile">
                    <x-slot:head>
                        <x-th align="center">ID</x-th>
                        <x-th align="center">User</x-th>
                        <x-th align="center">Nama Lengkap</x-th>
                        <x-th align="center">NRP</x-th>
                        <x-th align="center">Alamat</x-th>
                        <x-th align="center">Foto</x-th>
                        <x-th align="center">Bagian</x-th>
                        <x-th align="center">Level</x-th>
                        <x-th align="center">Status</x-th>
                        <x-th align="center">Aksi</x-th>
                    </x-slot:head>
            </x-table>
        </div>

        {{-- Table Arsip --}}
        <div id="tableArsip" class="hidden">
             <x-table id="dataUserProfileArsip">
                    <x-slot:head>
                        <x-th align="center">ID</x-th>
                        <x-th align="center">User</x-th>
                        <x-th align="center">Nama Lengkap</x-th>
                        <x-th align="center">NRP</x-th>
                        <x-th align="center">Alamat</x-th>
                        <x-th align="center">Foto</x-th>
                        <x-th align="center">Bagian</x-th>
                        <x-th align="center">Level</x-th>
                        <x-th align="center">Status</x-th>
                        <x-th align="center">Aksi</x-th>
                    </x-slot:head>
            </x-table>
        </div>
    </div>

    {{-- Modal --}}
    @include('components.userProfile.modal-add')
    @include('components.userProfile.modal-edit')

    {{-- Scripts --}}
    <script src="{{ asset('js/userProfile/userProfile.js') }}"></script>
    <script src="{{ asset('js/userProfile/userProfile-create.js') }}"></script>
    <script src="{{ asset('js/userProfile/userProfile-edit.js') }}"></script>

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
