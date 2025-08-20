<!-- Modal Edit -->
<div id="modalEditLembur" class="fixed inset-0 overflow-y-auto h-full w-full hidden">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-gray-500 opacity-50"></div>
    <!-- Modal Content -->
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white z-50">
        <div class="mt-3">
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-lg font-medium">Edit Lembur</h3>
                <button onclick="closeEditLemburModal()" class="text-black close-modal">&times;</button>
            </div>
            <div class="mt-2 px-7 py-3">
                <form id="formEditLembur" onsubmit="event.preventDefault(); updateLembur()">
                    <div class="mb-4">
                         <input type="hidden" id="editId">

                        <label for="editUserProfile" class="block text-sm font-medium text-gray-700">UserProfile</label>
                        <select id="editLemburUserProfile" name="bagian_id"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                            <option value="">Pilih UserProfile</option>
                        </select>

                        <label for="editProyek" class="block text-sm font-medium text-gray-700">Proyek</label>
                        <select id="editLemburProyek" name="proyek_id"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                            <option value="">Pilih Proyek</option>
                        </select>

                        <label for="editTanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="editLemburTanggal" name="tanggal"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                            placeholder="Masukkan Tanggal Lembur">

                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeEditLemburModal()"
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