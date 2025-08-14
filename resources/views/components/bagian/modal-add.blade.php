<!-- Modal Tambah Data Bagian -->
<div id="modalAdd" class="fixed inset-0 bg-white/50 items-center justify-center flex z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg shadow-blue-400 w-96">
        <h2 class="text-xl font-bold mb-4 text-center">Tambah Data Bagian</h2>
        <form id="formAddBagian" onsubmit="createBagian()">
            {{-- Use the route for creating bagian --}}
            @csrf
            <div class="mb-4">
                    <label for="addnama" class="block text-sm font-medium mb-1">Nama Bagian</label>
                    <input type="text" name="addnama" id="addnama" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeAddModal()" class="px-4 py-2 bg-gray-500 text-white hover:bg-gray-700 rounded">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-700 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
