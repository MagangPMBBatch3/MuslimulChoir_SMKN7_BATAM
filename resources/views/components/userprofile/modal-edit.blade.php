<div id="modalEditUserProfile" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeEditUserProfileModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>
        <h2 class="text-xl font-bold mb-6 text-center">Edit User Profile</h2>

        <form id="formEditUserProfile" onsubmit="event.preventDefault(); updateUserProfile()">
            <input type="hidden" id="editId" name="id">

            <div class="grid grid-cols-2 gap-4">
                <!-- Kolom 1 -->
                <div>
                    <label for="editUserProfileUserID" class="block mb-1 text-sm">User:</label>
                    <select id="editUserProfileUserID" name="user_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Email User</option>
                    </select>
                </div>

                <div>
                    <label for="editUserProfileNama" class="block mb-1 text-sm">Nama Lengkap:</label>
                    <input type="text" id="editUserProfileNama" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="editUserProfileNrp" class="block mb-1 text-sm">NRP:</label>
                    <input type="text" id="editUserProfileNrp" name="nrp" placeholder="Masukkan NRP" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="editUserProfileAlamat" class="block mb-1 text-sm">Alamat:</label>
                    <input type="text" id="editUserProfileAlamat" name="alamat" placeholder="Masukkan Alamat" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Kolom 2 -->
                <div>
                    <label for="editUserProfileFoto" class="block mb-1 text-sm">Foto:</label>
                    <input type="text" id="editUserProfileFoto" name="foto" placeholder="Masukkan Foto"
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="editUserProfileBagian" class="block mb-1 text-sm">Nama Bagian:</label>
                    <select id="editUserProfileBagian" name="bagian_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Bagian</option>
                    </select>
                </div>

                <div>
                    <label for="editUserProfileLevel" class="block mb-1 text-sm">Nama Level:</label>
                    <select id="editUserProfileLevel" name="level_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Level</option>
                    </select>
                </div>

                <div>
                    <label for="editUserProfileStatus" class="block mb-1 text-sm">Nama Status:</label>
                    <select id="editUserProfileStatus" name="status_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Status</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <x-button type="button" variant="secondary" onclick="closeEditUserProfileModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Update</x-button>

            </div>
        </form>
    </div>
</div>
