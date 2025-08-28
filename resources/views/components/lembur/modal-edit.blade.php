<!-- Modal Edit Lembur -->
<div id="modalEditLembur" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-center flex-1">Edit Lembur</h3>
            <button onclick="closeEditLemburModal()" class="text-gray-200 hover:text-white text-xl">&times;</button>
        </div>

        <!-- Form -->
        <form id="formEditLembur" onsubmit="event.preventDefault(); updateLembur()">
            <input type="hidden" id="editId">
            <div class="grid grid-cols-1 gap-4">
                <!-- User Profile -->
                <div>
                    <label for="editLemburUserProfile" class="block mb-1 text-sm">User Profile</label>
                    <select id="editLemburUserProfile" name="users_profile_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih User Profile</option>
                    </select>
                </div>

                <!-- Proyek -->
                <div>
                    <label for="editLemburProyek" class="block mb-1 text-sm">Proyek</label>
                    <select id="editLemburProyek" name="proyek_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Proyek</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="editLemburTanggal" class="block mb-1 text-sm">Tanggal</label>
                    <input type="date" id="editLemburTanggal" name="tanggal" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan Tanggal Lembur">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2 mt-6 border-t border-slate-700 pt-4">
                <button type="button" onclick="closeEditLemburModal()"
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
