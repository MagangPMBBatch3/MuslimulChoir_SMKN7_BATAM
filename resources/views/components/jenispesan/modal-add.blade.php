<!-- Modal Tambah Data JenisPesan -->
<div id="modalAddJenisPesan" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[24rem] p-6 shadow-lg shadow-blue-400 z-50">
        <h2 class="text-xl font-bold mb-4 text-center">Tambah Data JenisPesan</h2>

        <form id="formAddJenisPesan" onsubmit="createJenisPesan(event)">
            @csrf
            <div class="mb-4">
                <label for="addJenisPesanNama" class="block mb-1 text-sm">Nama JenisPesan</label>
                <input type="text" id="addJenisPesanNama" name="namaJenisPesan" placeholder="Masukkan Nama Jenis Pesan" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeAddJenisPesanModal()"
                    class="px-4 py-2 bg-slate-600 text-gray-200 rounded-lg hover:bg-slate-500 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
