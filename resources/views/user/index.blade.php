<x-layouts.main title="Data User">
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">
        <h1 class="text-2xl font-bold mb-4 text-white">Data User</h1>

        {{-- Search & Tambah --}}
        <div class="flex justify-between mb-4">
            <input 
                type="text" 
                id="searchUser" 
                placeholder="Cari ID atau Nama..." 
                class="bg-slate-700/70 text-gray-200 placeholder-gray-400 border border-slate-600 p-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                oninput="searchUser()">
            
            <x-button variant="primary" onclick="openAddUserModal()">Tambah Data</x-button>
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
            <table class="w-full border border-slate-700 rounded-lg overflow-hidden">
                <thead class="bg-slate-700 text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="p-2 border border-slate-600">ID</th>
                        <th class="p-2 border border-slate-600">Nama</th>
                        <th class="p-2 border border-slate-600">Email</th>
                        <th class="p-2 border border-slate-600">Role</th>
                        <th class="p-2 border border-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataUser" class="divide-y divide-slate-700 text-gray-200 hover:[&>tr:hover]:bg-slate-700/50"></tbody>
            </table>
        </div>

        {{-- Table Arsip --}}
        <div id="tableArsip" class="hidden">
            <table class="w-full border border-slate-700 rounded-lg overflow-hidden">
                <thead class="bg-slate-700 text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="p-2 border border-slate-600">ID</th>
                        <th class="p-2 border border-slate-600">Nama</th>
                        <th class="p-2 border border-slate-600">Email</th>
                        <th class="p-2 border border-slate-600">Role</th>
                        <th class="p-2 border border-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataUserArsip" class="divide-y divide-slate-700 text-gray-200 hover:[&>tr:hover]:bg-slate-700/50"></tbody>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    @include('components.user.modal-add')
    @include('components.user.modal-edit')

    {{-- Scripts --}}
    <script src="{{ asset('js/user/user.js') }}"></script>
    <script src="{{ asset('js/user/user-create.js') }}"></script>
    <script src="{{ asset('js/user/user-edit.js') }}"></script>

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
