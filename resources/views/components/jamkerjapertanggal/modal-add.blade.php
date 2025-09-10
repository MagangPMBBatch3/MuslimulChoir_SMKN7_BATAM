<!-- Modal Add Jam Per Tanggal -->
<div id="modalAddJamPerTanggal" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-center flex-1">Tambah Jam Per Tanggal</h3>
            <button onclick="closeAddJamPerTanggalModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold">&times;</button>
        </div>

        <!-- Form -->
        <form id="formAddJamPerTanggal" onsubmit="event.preventDefault(); createJamPerTanggal()">
            <div class="grid grid-cols-1 gap-4">
                <!-- User Profile -->
                <div>
                    <label for="addJamPerTanggalUserProfile" class="block mb-1 text-sm">User Profile:</label>
                    <select id="addJamPerTanggalUserProfile" name="users_profile_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih User Profile</option>
                    </select>
                </div>

                <!-- Proyek -->
                <div>
                    <label for="addJamPerTanggalProyek" class="block mb-1 text-sm">Nama Proyek:</label>
                    <select id="addJamPerTanggalProyek" name="proyek_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Proyek</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="addJamPerTanggalTanggal" class="block mb-1 text-sm">Tanggal:</label>
                    <input type="date" id="addJamPerTanggalTanggal" name="tanggal" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Jam -->
                <div>
                    <label for="addJamPerTanggalJam" class="block mb-1 text-sm">Jam:</label>
                    <input type="number" id="addJamPerTanggalJam" name="jam" step="0.5" min="0" placeholder="Masukkan jam"
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2 mt-6 border-t border-slate-700 pt-4">
                <x-button type="button" variant="secondary" onclick="closeAddJamPerTanggalModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Tambah Data</x-button>
                
            </div>
        </form>
    </div>
</div>
