<!-- Modal Edit Keterangan -->
<div id="modalEditKeterangan" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <button onclick="closeEditKeteranganModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>
            <h3 class="text-xl font-bold text-center flex-1">Edit Keterangan</h3>
            
        </div>

        <!-- Form -->
        <form id="formEditKeterangan" onsubmit="event.preventDefault(); updateKeterangan()">
            <input type="hidden" id="editId">
            <div class="grid grid-cols-1 gap-4">
                <!-- Bagian -->
                <div>
                    <label for="editKeteranganBagian" class="block mb-1 text-sm">Nama Bagian:</label>
                    <select id="editKeteranganBagian" name="bagian_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Bagian</option>
                    </select>
                </div>

                <!-- Proyek -->
                <div>
                    <label for="editKeteranganProyek" class="block mb-1 text-sm">Nama Proyek:</label>
                    <select id="editKeteranganProyek" name="proyek_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Proyek</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="editKeteranganTanggal" class="block mb-1 text-sm">Tanggal:</label>
                    <input type="date" id="editKeteranganTanggal" name="tanggal" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan Tanggal Keterangan">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2 mt-6 border-t border-slate-700 pt-4">
                <x-button type="button" variant="secondary" onclick="closeEditKeteranganModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Update</x-button>

            </div>
        </form>
    </div>
</div>
