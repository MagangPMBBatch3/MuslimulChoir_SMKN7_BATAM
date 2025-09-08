<!-- Modal Edit -->
<div id="modalEditAktivitas" class="fixed inset-0 overflow-y-auto h-full w-full hidden z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative top-20 mx-auto p-6 w-96 shadow-lg rounded-xl bg-slate-800/95 text-gray-200">
        <!-- Header -->
        <div class="flex justify-between items-center border-b border-slate-700 pb-3">
            <h3 class="text-lg font-semibold">Edit Aktivitas</h3>
            <button onclick="closeEditAktivitasModal()" 
                    class="text-gray-400 hover:text-red-400 text-xl font-bold">&times;</button>
        </div>

        <!-- Form -->
        <div class="mt-4">
            <form id="formEditAktivitas" onsubmit="event.preventDefault(); updateAktivitas()">
                <input type="hidden" id="editId">

                <div class="mb-4 space-y-3">
                    <!-- Bagian -->
                    <div>
                        <label for="editBagian" class="block text-sm font-medium text-gray-300">Nama Bagian:</label>
                        <select id="editAktivitasBagian" name="bagian_id"
                            class="mt-1 block w-full rounded-lg border border-slate-600 bg-slate-700/70 text-gray-200 p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">Pilih Bagian</option>
                        </select>
                    </div>

                    <!-- No WBS -->
                    <div>
                        <label for="editNoWbs" class="block text-sm font-medium text-gray-300">No WBS:</label>
                        <input type="text" id="editAktivitasNoWbs" name="NoWbs"
                            class="mt-1 block w-full rounded-lg border border-slate-600 bg-slate-700/70 text-gray-200 placeholder-gray-400 p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Masukkan No WBS Aktivitas">
                    </div>

                    <!-- Nama Aktivitas -->
                    <div>
                        <label for="editNama" class="block text-sm font-medium text-gray-300">Nama Aktivitas:</label>
                        <input type="text" id="editAktivitasNama" name="nama"
                            class="mt-1 block w-full rounded-lg border border-slate-600 bg-slate-700/70 text-gray-200 placeholder-gray-400 p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Masukkan nama Aktivitas">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-2 border-t border-slate-700 pt-3">
                    <x-button type="button" variant="secondary" onclick="closeEditAktivitasModal()"> Batal</x-button>
           
                     <x-button type="submit" variant="primary" >Update</x-button>

                    
                    
                </div>
            </form>
        </div>
    </div>
</div>
