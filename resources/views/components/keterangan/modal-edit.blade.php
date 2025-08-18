<div id="modalEditKeterangan" class="hidden">
    <div class="fixed inset-0 bg-white/50 items-center justify-center flex z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg shadow-blue-400 w-96">
            <h2 class="text-lg font-bold mb-4 text-center">Edit Bagian</h2>
            <form id="formEditKeterangan" onsubmit="updateKeterangan();">
                @csrf
                <input type="hidden" id="editKeteranganId" name="id">
                <div class="mb-4">
                    <label for="editBagianId" class="block text-sm font-medium text-gray-700">Bagian ID</label>
                    <input type="number" id="editBagianId" name="bagian_id" class="mt-1 p-2 border w-full rounded" required>
                </div>

                <div class="mb-4">
                    <label for="editProyekId" class="block text-sm font-medium text-gray-700">Proyek ID</label>
                    
                    <input type="number" id="editProyekId" name="proyek_id" class="mt-1 p-2 border w-full rounded" required>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeEditKeteranganModal()" class="bg-gray-500 text-white px-4 py-2 hover:bg-gray-700 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-700 rounded">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>