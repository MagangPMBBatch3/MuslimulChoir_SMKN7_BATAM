<!-- Modal Add -->
<div id="modalAddAktivitas" class="fixed inset-0 overflow-y-auto h-full w-full hidden z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative top-20 mx-auto p-6 w-96 shadow-lg rounded-xl bg-slate-800/95 text-gray-200">
        <!-- Header -->
        <div class="flex justify-between items-center border-b border-slate-700 pb-3">
            <h3 class="text-lg font-semibold">Tambah Aktivitas</h3>
            <button onclick="closeAddAktivitasModal()" 
                    class="text-gray-400 hover:text-red-400 text-xl font-bold">&times;</button>
        </div>

        <!-- Form -->
        <div class="mt-4">
            <form id="formAddAktivitas" onsubmit="event.preventDefault(); createAktivitas()">
                <div class="mb-4 space-y-3">
                    <!-- Bagian -->
                    <div>
                        <label for="addBagian" class="block text-sm font-medium text-gray-300">Bagian</label>
                        <select id="addAktivitasBagian" name="bagian_id"
                            class="mt-1 block w-full rounded-lg border border-slate-600 bg-slate-700/70 text-gray-200 p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">Pilih Bagian</option>
                        </select>
                    </div>

                    <!-- No WBS -->
                    <div>
                        <label for="addNoWbs" class="block text-sm font-medium text-gray-300">No WBS</label>
                        <input type="text" id="addAktivitasNoWbs" name="NoWbs"
                            class="mt-1 block w-full rounded-lg border border-slate-600 bg-slate-700/70 text-gray-200 placeholder-gray-400 p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Masukkan No WBS Aktivitas">
                    </div>

                    <!-- Nama Aktivitas -->
                    <div>
                        <label for="addNama" class="block text-sm font-medium text-gray-300">Nama Aktivitas</label>
                        <input type="text" id="addAktivitasNama" name="nama"
                            class="mt-1 block w-full rounded-lg border border-slate-600 bg-slate-700/70 text-gray-200 placeholder-gray-400 p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Masukkan nama Aktivitas">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-2 border-t border-slate-700 pt-3">
                    <button type="button" onclick="closeAddAktivitasModal()"
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
</div>
