<x-layouts.main title="Data Lembur">
    <div class="bg-white p-4 rounded shadow w-full">
        <h1 class="text-2x1 font-bold mb-4">Data Lembur</h1>

        <div class="flex justify-between mb-4">
            <input type="text" id="search" placeholder="Cari ID atau Nama..." class="border p-2 rounded w-64" oninput="searchLembur()">
             <x-button variant="primary" onclick="openAddModal()">Tambah Data</x-button>
        </div>

        <div class="mb4">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-t" onclick="showTab('aktif')" id="tabAktif">Data
                Aktif</button>
            <button onclick="showTab('arsip')" id="tabArsip" class="px-4 py-2 bg-gray-300 text-black rounded-t">Data
                Arsip</button>
        </div>
        <div id="tableAktif">
            <table class="w-full border">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border p-2 text-center ">ID</th>
                        <th class="border p-2">User Profile</th>
                        <th class="border p-2">Nama Proyek</th>
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataLembur"></tbody>
            </table>
        </div>
        <div id="tableArsip" class="hidden">
            <table class="w-full border">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border p-2 text-center ">ID</th>
                        <th class="border p-2">User profile</th>
                        <th class="border p-2">Nama Proyek</th>
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataLemburArsip"></tbody>
            </table>
        </div>
    </div>


        @include('components.lembur.modal-add')
        @include('components.lembur.modal-edit')

        <script src="{{ asset('js/lembur/lembur.js') }}"></script>
        <script src="{{ asset('js/lembur/lembur-create.js') }}"></script>
        <script src="{{ asset('js/lembur/lembur-edit.js') }}"></script>

        <script>
            function showTab(tab) {
                const tabAktif = document.getElementById('tabAktif');
                const tabArsip = document.getElementById('tabArsip');
                const tableAktif = document.getElementById('tableAktif');
                const tableArsip = document.getElementById('tableArsip');

                if (tab === 'aktif') {
                    tabAktif.classList.add('bg-blue-500', 'text-white');
                    tabAktif.classList.remove('bg-gray-300', 'text-black');
                    tabArsip.classList.remove('bg-blue-500', 'text-white');
                    tabArsip.classList.add('bg-gray-300', 'text-black');
                    tableAktif.classList.remove('hidden');
                    tableArsip.classList.add('hidden');
                } else {
                    tabArsip.classList.add('bg-blue-500', 'text-white');
                    tabArsip.classList.remove('bg-gray-300', 'text-black');
                    tabAktif.classList.remove('bg-blue-500', 'text-white');
                    tabAktif.classList.add('bg-gray-300', 'text-black');
                    tableArsip.classList.remove('hidden');
                    tableAktif.classList.add('hidden');
                }
            }

        </script>

</x-layouts.main>