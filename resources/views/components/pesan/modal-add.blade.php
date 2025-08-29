<!-- Modal Add Pesan -->
<div id="modalAddPesan" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <h3 class="text-lg font-bold mb-6 text-center">Tambah Pesan</h3>
        <form id="formAddPesan" onsubmit="event.preventDefault(); createPesan()">
            <div class="grid grid-cols-2 gap-4">
                <!-- Kiri -->
                <div class="flex flex-col gap-3">
                    <label for="addPesanPengirim" class="block text-sm font-medium">Pengirim</label>
                    <input type="text" id="addPesanPengirim" name="pengirim" placeholder="Masukkan Pengirim" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2
                               focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">

                    <label for="addPesanPenerima" class="block text-sm font-medium">Penerima</label>
                    <input type="text" id="addPesanPenerima" name="penerima" placeholder="Masukkan Penerima" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2
                               focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">

                    <label for="addPesanIsi" class="block text-sm font-medium">Isi</label>
                    <input type="text" id="addPesanIsi" name="isi" placeholder="Masukkan Isi" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2
                               focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">
                </div>

                <!-- Kanan -->
                <div class="flex flex-col gap-3">
                    <label for="addPesanParentID" class="block text-sm font-medium">Parent ID</label>
                    <input type="text" id="addPesanParentID" name="parent_id" placeholder="Boleh kosong"
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2">

                    <label for="addPesanTglPesan" class="block text-sm font-medium">Tgl Pesan</label>
                    <input type="datetime-local" id="addPesanTglPesan" name="tgl_pesan"
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2">

                    <label for="addPesanJenisPesan" class="block text-sm font-medium">Jenis ID</label>
                    <select id="addPesanJenisPesan" name="jenis_id"
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2">
                        <option value="">Pilih Jenis ID</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <button type="button" onclick="closeAddPesanModal()"
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
