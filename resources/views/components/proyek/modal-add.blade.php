<!-- Modal Add Proyek -->
<div id="modalAddProyek" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeAddProyekModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>
        <h2 class="text-xl font-bold mb-6 text-center">Tambah Data Proyek</h2>

        <form id="formAddProyek" onsubmit="event.preventDefault(); createProyek(event)">
            @csrf

            <div class="mb-4">
                <label for="addProyekKode" class="block text-sm font-medium mb-1">Kode Proyek:</label>
                <input type="text" id="addProyekKode" name="kodeProyek" placeholder="Masukkan Kode Proyek" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="mb-4">
                <label for="addProyekNama" class="block text-sm font-medium mb-1">Nama Proyek:</label>
                <input type="text" id="addProyekNama" name="namaProyek" placeholder="Masukkan Nama proyek" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="mb-4">
                <label for="addProyekTanggal" class="block text-sm font-medium mb-1">Tanggal Proyek:</label>
                <input type="date" id="addProyekTanggal" name="tanggalProyek" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="mb-4">
                <label for="addProyekNamaSekolah" class="block text-sm font-medium mb-1">Nama Sekolah:</label>
                <input type="text" id="addProyekNamaSekolah" name="namasekolah" placeholder="Masukkan Nama sekolah" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <x-button type="button" variant="secondary" onclick="closeAddProyekModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Tambah Data</x-button>

            </div>
        </form>
    </div>
</div>
