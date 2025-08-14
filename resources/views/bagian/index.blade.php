<x-layouts.main title="Data Bagian">
    <div class="bg-white p-4 rounded shadow w-full">
        <h1 class="text-2xl font-bold mb-4">Data Bagian</h1>

        {{-- Tombol Tambah & Pencarian --}}

        <div class="flex justify-between mb-4">
           <input type="text" id="search" placeholder="Cari ID atau Nama..." class="border p-2 rounded w-64" oninput="searchBagian()">
            <button onclick="openAddModal()" class="bg-blue-600 text-white px-4 py-2 rounded ">Tambah Data</button>
        </div>

        {{-- Tabel Data --}}
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
        <tbody id="dataBagian"></tbody>
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