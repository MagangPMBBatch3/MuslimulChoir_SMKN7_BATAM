<!-- Modal Tambah Keterangan -->
<div id="modalAddKeterangan" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <button onclick="closeAddKeteranganModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>

            <h3 class="text-xl font-bold text-center flex-1">Tambah Keterangan</h3>
        </div>

        <!-- Form -->
        <form id="formAddKeterangan" onsubmit="event.preventDefault(); createKeterangan()">
            <div class="grid grid-cols-1 gap-4">
                <!-- Bagian -->
                <div>
                    <label for="addKeteranganBagian" class="block mb-1 text-sm">Bagian</label>
                    <select id="addKeteranganBagian" name="bagian_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Bagian</option>
                    </select>
                </div>

                <!-- Proyek -->
                <div>
                    <label for="addKeteranganProyek" class="block mb-1 text-sm">Proyek</label>
                    <select id="addKeteranganProyek" name="proyek_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Proyek</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="addKeteranganTanggal" class="block mb-1 text-sm">Tanggal</label>
                    <input type="date" id="addKeteranganTanggal" name="Tanggal" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan Tanggal Keterangan">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2 mt-6 border-t border-slate-700 pt-4">
                <x-button type="button" variant="secondary" onclick="closeAddKeteranganModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Tambah Data</x-button>

            </div>
        </form>
    </div>
</div>
