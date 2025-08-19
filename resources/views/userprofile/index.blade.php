<x-layouts.main title="Data User Profile">
    <div class="bg-white p-4 rounded shadow w-full">
        <h1 class="text-2xl font-bold mb-4">Data User Profile</h1>

        <div class="flex justify-between mb-4">
            <input type="text" id="search" placeholder="Cari ID atau Nama..." class="border p-2 rounded w-64" oninput="searchUserProfile()">
           <button onclick="openAddModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Data</button>
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
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">User</th>
                        <th class="p-2 border">Nama Lengkap</th>
                        <th class="p-2 border">NRP</th>
                        <th class="p-2 border">Alamat</th>
                        <th class="p-2 border">Foto</th>
                        <th class="p-2 border">Bagian</th>
                        <th class="p-2 border">Level</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataUserProfile"></tbody>
            </table>
        </div>
        <div id="tableArsip" class="hidden">
            <table class="w-full border">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">User</th>
                        <th class="p-2 border">Nama Lengkap</th>
                        <th class="p-2 border">NRP</th>
                        <th class="p-2 border">Alamat</th>
                        <th class="p-2 border">Foto</th>
                        <th class="p-2 border">Bagian</th>
                        <th class="p-2 border">Level</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataUserProfileArsip"></tbody>
            </table>
        </div>
    </div>


        @include('components.userProfile.modal-add')
        @include('components.userProfile.modal-edit')

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