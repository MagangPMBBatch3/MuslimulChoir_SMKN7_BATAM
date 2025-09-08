<!-- Modal Edit Proyek -->
<div id="modalEditProyek" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeEditProyekModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>
        <h2 class="text-lg font-bold mb-6 text-center">Edit Proyek</h2>

        <form id="formEditProyek" onsubmit="event.preventDefault(); updateProyek()">
            @csrf
            <input type="hidden" id="editProyekId" name="id">

            <div class="mb-4">
                <label for="editProyekKode" class="block text-sm font-medium mb-1">Kode Proyek:</label>
                <input type="text" id="editProyekKode" name="kodeProyek" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="mb-4">
                <label for="editProyekNama" class="block text-sm font-medium mb-1">Nama Proyek:</label>
                <input type="text" id="editProyekNama" name="namaProyek" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="mb-4">
                <label for="editProyekTanggal" class="block text-sm font-medium mb-1">Tanggal Proyek:</label>
                <input type="date" id="editProyekTanggal" name="tanggalProyek" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="mb-4">
                <label for="editProyekNamaSekolah" class="block text-sm font-medium mb-1">Nama Sekolah:</label>
                <input type="text" id="editProyekNamaSekolah" name="namasekolah" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <x-button type="button" variant="secondary" onclick="closeEditProyekModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Update</x-button>

            </div>
        </form>
    </div>
</div>
