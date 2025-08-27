<x-layouts.main title="Data Pesan">
    <div class="bg-white p-4 rounded shadow w-full">
        <h1 class="text-2x1 font-bold mb-4">Data Pesan</h1>

        <div class="flex justify-between mb-4">
            <input type="text" id="search" placeholder="Cari ID atau Nama..." class="border p-2 rounded w-64" oninput="searchPesan()">
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
                        <th class="border p-2">Pengirim</th>
                        <th class="border p-2">Penerima</th>
                        <th class="border p-2">Isi</th>
                        <th class="border p-2">Parent ID</th>
                        <th class="border p-2">Tanggal Pesan</th>
                        <th class="border p-2">Jenis Pesan</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataPesan"></tbody>
            </table>
        </div>
        <div id="tableArsip" class="hidden">
            <table class="w-full border">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border p-2 text-center ">ID</th>
                         <th class="border p-2">Pengirim</th>
                        <th class="border p-2">Penerima</th>
                        <th class="border p-2">Isi</th>
                        <th class="border p-2">Parent ID</th>
                        <th class="border p-2">Tanggal Pesan</th>
                        <th class="border p-2">Jenis Pesan</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataPesanArsip"></tbody>
            </table>
        </div>
    </div>


        @include('components.pesan.modal-add')
        @include('components.pesan.modal-edit')

        <script src="{{ asset('js/pesan/pesan.js') }}"></script>
        <script src="{{ asset('js/pesan/pesan-create.js') }}"></script>
        <script src="{{ asset('js/pesan/pesan-edit.js') }}"></script>

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