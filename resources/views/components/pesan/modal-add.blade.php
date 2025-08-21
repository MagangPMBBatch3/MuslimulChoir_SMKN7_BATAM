<!-- Modal Add -->
<div id="modalAddPesan" class="fixed inset-0 overflow-y-auto h-full w-full hidden">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-gray-500 opacity-50"></div>
    <!-- Modal Content -->
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white z-50">
        <div class="mt-3">
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-lg font-medium">Tambah Pesan</h3>
                <button onclick="closeAddPesanModal()" class="text-black close-modal">&times;</button>
            </div>
            <div class="mt-2 px-7 py-3">
                <form id="formAddPesan" onsubmit="event.preventDefault(); createPesan()">
                    <div class="mb-4">

                         <div class="mb-4">
                            <label for="addPesanPengirim" class="block text-sm font-medium mb-1">Pengirim</label>
                            <input type="text" id="addPesanPengirim" name="pengirim"
                                class="border border-gray-300 p-2 rounded transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500 w-full" required>
                        </div>

                         <div class="mb-4">
                            <label for="addPesanPenerima" class="block text-sm font-medium mb-1">Penerima</label>
                            <input type="text" id="addPesanPenerima" name="penerima"
                                class="border border-gray-300 p-2 rounded transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500 w-full" required>
                        </div>

                         <div class="mb-4">
                            <label for="addPesanIsi" class="block text-sm font-medium mb-1">Isi</label>
                            <input type="text" id="addPesanIsi" name="isi"
                                class="border border-gray-300 p-2 rounded transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500 w-full" required>
                        </div>

                         <input type="text" id="addPesanParentID" name="parent_id"
                        class="border border-gray-300 p-2 rounded ..."
                        placeholder="Boleh kosong">


                        <div class="mb-4">
                        <label for="addPesanTglPesan" class="block text-sm font-medium text-gray-700">Tgl Pesan</label>
                        <input type="datetime-local" id="addPesanTglPesan" name="tgl_pesan"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                            placeholder="Masukkan TglPesan Pesan">
                        </div>

                        <label for="addPesanJenisPesan" class="block text-sm font-medium text-gray-700">Jenis ID</label>
                        <select id="addPesanJenisPesan" name="jenis_id"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                            <option value="">Pilih Jenis ID</option>
                        </select>
                        

                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeAddPesanModal()"
                            class="px-4 py-2 bg-gray-300 text-black rounded-md hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>