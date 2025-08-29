<!-- Modal Tambah ModeJamKerja -->
<div id="modalAddModeJamKerja" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <h2 class="text-xl font-bold mb-6 text-center">Tambah Data ModeJamKerja</h2>
        
        <form id="formAddModeJamKerja" onsubmit="createModeJamKerja(event)">
            @csrf
            <div class="mb-4">
                <label for="addModeJamKerjaNama" class="block text-sm font-medium mb-1">Nama ModeJamKerja</label>
                <input type="text" id="addModeJamKerjaNama" name="namaModeJamKerja" placeholder="Masukkan Mode Jam Kerja" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeAddModeJamKerjaModal()"
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
