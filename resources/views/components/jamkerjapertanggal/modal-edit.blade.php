<!-- Modal Edit Jam Per Tanggal -->
<div id="modalEditJamPerTanggal" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <button onclick="closeEditJamPerTanggalModal()" class="text-gray-400 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>

            <h3 class="text-xl font-bold text-center flex-1">Edit Jam Per Tanggal</h3>
        </div>

        <!-- Form -->
        <form id="formEditJamPerTanggal" onsubmit="event.preventDefault(); updateJamPerTanggal()">
            <input type="hidden" id="editId">
            <div class="grid grid-cols-1 gap-4">
                <!-- User Profile -->
                <div>
                    <label for="editJamPerTanggalUserProfile" class="block mb-1 text-sm">User Profile</label>
                    <select id="editJamPerTanggalUserProfile" name="users_profile_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih User Profile</option>
                    </select>
                </div>

                <!-- Proyek -->
                <div>
                    <label for="editJamPerTanggalProyek" class="block mb-1 text-sm">Proyek</label>
                    <select id="editJamPerTanggalProyek" name="proyek_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Proyek</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="editJamPerTanggalTanggal" class="block mb-1 text-sm">Tanggal</label>
                    <input type="date" id="editJamPerTanggalTanggal" name="tanggal" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Jam -->
                <div>
                    <label for="editJamPerTanggalJam" class="block mb-1 text-sm">Jam</label>
                    <input type="number" id="editJamPerTanggalJam" name="jam" step="0.5" min="0"
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2 mt-6 border-t border-slate-700 pt-4">
                <x-button type="button" variant="secondary" onclick="closeEditJamPerTanggalModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Update</x-button>

            </div>
        </form>
    </div>
</div>
