<!-- Modal Tambah Data Bagian -->
<div id="modalAdd" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center flex z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Tambah Data Bagian</h2>
        <form id="formAddBagian" onsubmit="createBagian()">
            {{-- Use the route for creating bagian --}}
            @csrf
            <div class="mb-4">
                <label for="addnama" class="block text-sm font-medium mb-1">Nama Bagian</label>
                <input type="text" name="addnama" id="addnama"
                    class="border border-gray-300 p-2 rounded w-full" required>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeAddModal()" class="px-4 py-2 bg-gray-500 text-white rounded">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
