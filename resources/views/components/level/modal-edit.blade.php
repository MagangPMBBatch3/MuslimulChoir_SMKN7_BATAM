<div id="modalEditLevel" class="hidden">
    <div class="fixed inset-0 bg-white/50 items-center justify-center flex z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg shadow-blue-400 w-96">
            <h2 class="text-lg font-bold mb-4 text-center">Edit Bagian</h2>
            <form id="formEditLevel" onsubmit="updateLevel();">
                @csrf
                <input type="hidden" id="editLevelId" name="id">
                <div class="mb-4">
                    <label for="editLevelNama" class="block mb-1">Nama Bagian</label>
                    <input type="text" id="editLevelNama" name="nama"  class="border border-gray-300 p-2 rounded transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500 w-full" required>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeEditLevelModal()" class="bg-gray-500 text-white px-4 py-2 hover:bg-gray-700 rounded">
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