<!-- Modal Edit Pesan -->
<div id="modalEditPesan" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeEditPesanModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>
        <h3 class="text-lg font-bold mb-6 text-center">Edit Pesan</h3>
        <form id="formEditPesan" onsubmit="event.preventDefault(); updatePesan()">
            <input type="hidden" id="editId">

            <div class="grid grid-cols-2 gap-4">
                <!-- Kiri -->
                <div class="flex flex-col gap-3">
                    <label for="editPesanPengirim" class="block text-sm font-medium">Pengirim</label>
                    <select id="editPesanPengirim" name="pengirim" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2">
                        <option value="">Pilih Pengirim</option>
                    </select>

                    <label for="editPesanPenerima" class="block text-sm font-medium">Penerima</label>
                    <select id="editPesanPenerima" name="penerima" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2">
                        <option value="">Pilih Penerima</option>
                    </select>

                </div>

                <!-- Kanan -->
                <div class="flex flex-col gap-3">
                    <label for="editPesanTglPesan" class="block text-sm font-medium">Tgl Pesan</label>
                    <input type="datetime-local" id="editPesanTglPesan" name="tgl_pesan"
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2">

                    <label for="editPesanJenisPesan" class="block text-sm font-medium">Jenis ID</label>
                    <select id="editPesanJenisPesan" name="jenis_id"
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2">
                        <option value="">Pilih Jenis ID</option>
                    </select>
                </div>
            </div>

            <label for="editPesanIsi" class="block text-sm font-medium">Isi</label>
                    <textarea id="editPesanIsi" name="isi" required
                        class="w-full h-28 rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2
                               focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500"></textarea>

            <div class="flex justify-end gap-2 mt-6">
                <x-button type="button" variant="secondary" onclick="closeEditPesanModal()">Batal</x-button>
                <x-button type="submit" variant="primary">Update</x-button>
            </div>
        </form>
    </div>
</div>
