<!-- Modal Add -->
<div id="modalAddUserProfile" class="fixed inset-0 overflow-y-auto h-full w-full hidden">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-gray-500 opacity-50"></div>
    <!-- Modal Content -->
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white z-50">
        <div class="mt-3">
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-lg font-medium text-center">Tambah User Profile</h3>
                <button onclick="closeAddUserProfileModal()" class="text-black close-modal">&times;</button>
            </div>
            <div class="mt-2 px-7 py-3">
                <form id="formAddUserProfile" onsubmit="event.preventDefault(); createUserProfile()">
                    <div class="mb-4">

                        <label for="addUser" class="block text-sm font-medium text-gray-700">User</label>
                        <select id="addUserProfileUser" name="user_id"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                            <option value="">Pilih Email User</option>
                        </select>

                        <label for="addNamaLengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="addUserProfileNamaLengkap" name="nama_lengkap"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                            placeholder="Masukkan Nama Lengkap">

                        <label for="addNrp" class="block text-sm font-medium text-gray-700">NRP</label>
                        <input type="text" id="addUserProfileNrp" name="nrp"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                            placeholder="Masukkan NRP">

                        <label for="addAlamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" id="addUserProfileAlamat" name="alamat"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                            placeholder="Masukkan Alamat">

                        <label for="addFoto" class="block text-sm font-medium text-gray-700">Foto</label>
                        <input type="text" id="addUserProfileFoto" name="foto"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0"
                            placeholder="Masukkan Foto">

                        <label for="addBagian" class="block text-sm font-medium text-gray-700">Nama Bagian</label>
                        <select id="addUserProfileBagian" name="bagian_id"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                            <option value="">Pilih Bagian</option>
                        </select>

                        <label for="addLevel" class="block text-sm font-medium text-gray-700">Nama Level</label>
                        <select id="addUserProfileLevel" name="level_id"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                            <option value="">Pilih Level</option>
                        </select>

                        <label for="addStatus" class="block text-sm font-medium text-gray-700">Nama Status</label>
                        <select id="addUserProfileStatus" name="status_id"
                            class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm mb-2 outline-0">
                            <option value="">Pilih Status</option>
                        </select>

                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeAddUserProfileModal()"
                            class="px-4 py-2 bg-gray-300 text-black rounded-md hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
