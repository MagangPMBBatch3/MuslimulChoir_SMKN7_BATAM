<!-- Modal Edit -->
<div id="modalEditAktivitas" class="fixed inset-0 overflow-y-auto h-full w-full hidden">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-gray-500 opacity-50"></div>
    <!-- Modal Content -->
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white z-50">
        <div class="mt-3">
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-lg font-medium">Tambah Aktivitas</h3>
                <button onclick="closeEditAktivitasModal()" class="text-black close-modal">&times;</button>
            </div>
            <div class="mt-2 px-7 py-3">
                <form id="formEditAktivitas" onsubmit="event.preventDefault(); updateAktivitas()">
                    <div class="mb-4">
                         <input type="hidden" id="editId">
                         
                        <label for="editBagian" class="block text-sm font-medium text-gray-700">Bagian</label>
                        <select id="editAktivitasBagian" name="bagian_id"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                            <option value="">Pilih Bagian</option>
                        </select>

                        <label for="editNoWbs" class="block text-sm font-medium text-gray-700">NoWbs</label>
                        <input type="text" id="editAktivitasNoWbs" name="NoWbs"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                            placeholder="Masukkan NoWbs Aktivitas">

                        <label for="editNama" class="block text-sm font-medium text-gray-700">Nama Aktivitas</label>
                        <input type="text" id="editAktivitasNama" name="nama"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                            placeholder="Masukkan nama Aktivitas">

                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeEditAktivitasModal()"
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