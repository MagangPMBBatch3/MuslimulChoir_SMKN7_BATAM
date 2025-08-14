<!-- Modal Tambah Data Level -->
<div id="modalAddLevel" class="fixed inset-0 bg-white/50 items-center justify-center flex z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg shadow-blue-400 w-96">
        <h2 class="text-xl font-bold mb-4 text-center">Tambah Data Level</h2>
        
        <form id="formAddLevel" onsubmit="createLevel(event)">
            @csrf
            <div class="mb-4">
                <label for="addLevelNama" class="block text-sm font-medium mb-1">Nama Level</label>
                <input type="text" id="addLevelNama" name="namaLevel"
                    class="border border-gray-300 p-2 rounded transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500 w-full" required>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeAddLevelModal()" 
                        class="px-4 py-2 bg-gray-500 text-white hover:bg-gray-700  rounded">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700  rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
