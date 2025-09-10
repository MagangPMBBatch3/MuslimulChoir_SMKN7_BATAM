<!-- Modal Tambah Lembur -->
<div id="modalAddLembur" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <button onclick="closeAddLemburModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>

            <h3 class="text-xl font-bold text-center flex-1">Tambah Lembur</h3>
        </div>

        <!-- Form -->
        <form id="formAddLembur" onsubmit="event.preventDefault(); createLembur()">
            <div class="grid grid-cols-1 gap-4">
                <!-- User Profile -->
                <div>
                    <label for="addLemburUserProfile" class="block mb-1 text-sm">User Profile:</label>
                    <select id="addLemburUserProfile" name="users_profile_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih User Profile</option>
                    </select>
                </div>

                <!-- Proyek -->
                <div>
                    <label for="addLemburProyek" class="block mb-1 text-sm">Nama Proyek:</label>
                    <select id="addLemburProyek" name="proyek_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Proyek</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="addLemburTanggal" class="block mb-1 text-sm">Tanggal:</label>
                    <input type="date" id="addLemburTanggal" name="Tanggal" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan Tanggal Lembur">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2 mt-6 border-t border-slate-700 pt-4">
                <x-button type="button" variant="secondary" onclick="closeAddLemburModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Tambah Data</x-button>

            </div>
        </form>
    </div>
</div>
