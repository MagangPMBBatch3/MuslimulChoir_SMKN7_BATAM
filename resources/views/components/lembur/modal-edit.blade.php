<!-- Modal Edit Lembur -->
<div id="modalEditLembur" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <button onclick="closeEditLemburModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>

            <h3 class="text-xl font-bold text-center flex-1">Edit Lembur</h3>
        </div>

        <!-- Form -->
        <form id="formEditLembur" onsubmit="event.preventDefault(); updateLembur()">
            <input type="hidden" id="editId">
            <div class="grid grid-cols-1 gap-4">
                <!-- User Profile -->
                <div>
                    <label for="editLemburUserProfile" class="block mb-1 text-sm">User Profile:</label>
                    <select id="editLemburUserProfile" name="users_profile_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih User Profile</option>
                    </select>
                </div>

                <!-- Proyek -->
                <div>
                    <label for="editLemburProyek" class="block mb-1 text-sm">Nama Proyek:</label>
                    <select id="editLemburProyek" name="proyek_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Proyek</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="editLemburTanggal" class="block mb-1 text-sm">Tanggal:</label>
                    <input type="date" id="editLemburTanggal" name="tanggal" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan Tanggal Lembur">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2 mt-6 border-t border-slate-700 pt-4">
                <x-button type="button" variant="secondary" onclick="closeEditLemburModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Update</x-button>

            </div>
        </form>
    </div>
</div>
