<!-- Modal Edit Pesan -->
<div id="modalEditPesan" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <h3 class="text-lg font-bold mb-6 text-center">Edit Pesan</h3>
        <form id="formEditPesan" onsubmit="event.preventDefault(); updatePesan()">
            <input type="hidden" id="editId">

            <div class="mb-4">
                <label for="editPesanPengirim" class="block text-sm font-medium mb-1">Pengirim</label>
                <input type="text" id="editPesanPengirim" name="pengirim" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">

                <label for="editPesanPenerima" class="block text-sm font-medium mb-1">Penerima</label>
                <input type="text" id="editPesanPenerima" name="penerima" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">

                <label for="editPesanIsi" class="block text-sm font-medium mb-1">Isi</label>
                <input type="text" id="editPesanIsi" name="isi" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">

                <label for="editPesanParentID" class="block text-sm font-medium mb-1">Parent ID</label>
                <input type="text" id="editPesanParentID" name="parent_id" placeholder="Boleh kosong"
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 mb-3">

                <label for="editPesanTglPesan" class="block text-sm font-medium mb-1">Tgl Pesan</label>
                <input type="datetime-local" id="editPesanTglPesan" name="tgl_pesan"
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 mb-3">

                <label for="editPesanJenisPesan" class="block text-sm font-medium mb-1">Jenis ID</label>
                <select id="editPesanJenisPesan" name="jenis_id"
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 mb-3">
                    <option value="">Pilih Jenis ID</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeEditPesanModal()"
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
