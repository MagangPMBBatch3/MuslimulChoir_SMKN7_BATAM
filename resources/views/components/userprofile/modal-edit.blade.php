<!-- Modal Edit -->
<div id="modalEditUserProfile" class="fixed inset-0 overflow-y-auto h-full w-full hidden">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-gray-500 opacity-50"></div>
    <!-- Modal Content -->
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white z-50">
        <div class="mt-3">
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-lg font-medium text-center">Edit User Profile</h3>
                {{-- <button onclick="closeeditUserProfileModal()" class="text-black close-modal">&times;</button> --}}
            </div>
            <div class="mt-2 px-7 py-3">
                <form id="formEditUserProfile" onsubmit="event.preventDefault(); updateUserProfile()">
                    <input type="hidden" id="editId" name="id">

                    <label for="editUserProfileUserID" class="block text-sm font-medium text-gray-700">User</label>
                    <select id="editUserProfileUserID" name="user_id"
                        class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                        <option value="">Pilih Email User</option>
                    </select>

                    <label for="editUserProfileNama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="editUserProfileNama" name="nama_lengkap"
                        class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                        placeholder="Masukkan Nama Lengkap">

                    <label for="editUserProfileNrp" class="block text-sm font-medium text-gray-700">NRP</label>
                    <input type="text" id="editUserProfileNrp" name="nrp"
                        class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                        placeholder="Masukkan NRP">

                    <label for="editUserProfileAlamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" id="editUserProfileAlamat" name="alamat"
                        class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                        placeholder="Masukkan Alamat">

                    <label for="editUserProfileFoto" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="text" id="editUserProfileFoto" name="foto"
                        class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                        placeholder="Masukkan Foto">

                    <label for="editUserProfileBagian" class="block text-sm font-medium text-gray-700">Nama Bagian</label>
                    <select id="editUserProfileBagian" name="bagian_id"
                        class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                        <option value="">Pilih Bagian</option>
                    </select>

                    <label for="editUserProfileLevel" class="block text-sm font-medium text-gray-700">Nama Level</label>
                    <select id="editUserProfileLevel" name="level_id"
                        class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                        <option value="">Pilih Level</option>
                    </select>

                    <label for="editUserProfileStatus" class="block text-sm font-medium text-gray-700">Nama Status</label>
                    <select id="editUserProfileStatus" name="status_id"
                        class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                        <option value="">Pilih Status</option>
                    </select>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" onclick="closeEditAktivitasModal()"
                            class="px-4 py-2 bg-gray-300 text-black rounded-md hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
