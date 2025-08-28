<!-- Modal Edit Data Bagian -->
<div id="modalEdit" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 p-6 rounded-xl shadow-lg shadow-blue-400 w-96 z-50">
        <h2 class="text-xl font-bold mb-4 text-center">Edit Bagian</h2>
        
        <form id="formEditBagian" onsubmit="event.preventDefault(); updateBagian()">
            @csrf
            <input type="hidden" id="editId" name="id">

            <!-- Input -->
            <div class="mb-4">
                <label for="editNama" class="block text-sm font-medium mb-1">Nama Bagian</label>
                <input type="text" id="editNama" name="nama" required
                       class="w-full rounded-lg border border-slate-600 bg-slate-700/70 text-gray-200 
                              placeholder-gray-400 p-2 shadow-sm focus:ring-2 focus:ring-blue-500 
                              focus:outline-none transition duration-200 ease-in-out"
                       placeholder="Masukkan nama bagian">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2 border-t border-slate-700 pt-3">
                <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-slate-600 text-gray-200 rounded-lg hover:bg-slate-500 transition">
                    Batal
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
