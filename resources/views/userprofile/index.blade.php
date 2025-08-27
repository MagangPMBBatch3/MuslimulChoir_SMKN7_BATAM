<x-layouts.main title="Data User Profile">
    <div class="bg-white p-4 rounded shadow w-full">
        <h1 class="text-2xl font-bold mb-4">Data User Profile</h1>

        <!-- Search + Add Button -->
        <div class="flex justify-between mb-4">
            <input type="text" id="search" placeholder="Cari ID atau Nama..." class="border p-2 rounded w-64" oninput="searchUserProfile()">
            <x-button variant="primary" onclick="openAddModal()">Tambah Data</x-button>
        </div>

        <!-- Tab -->
        <div class="mb-4">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-t" onclick="showTab('aktif')" id="tabAktif">Data Aktif</button>
            <button onclick="showTab('arsip')" id="tabArsip" class="px-4 py-2 bg-gray-300 text-black rounded-t">Data Arsip</button>
        </div>

        <!-- Card Container -->
        <div id="tableAktif" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"></div>
        <div id="tableArsip" class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"></div>

        @include('components.userProfile.modal-add')
        @include('components.userProfile.modal-edit')
    </div>

    <!-- JS -->
    <script src="{{ asset('js/userProfile/userProfile.js') }}"></script>
</x-layouts.main>

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
