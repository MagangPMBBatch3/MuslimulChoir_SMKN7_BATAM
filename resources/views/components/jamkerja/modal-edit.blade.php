<div id="modalEditJamKerja" class="hidden">
    <div class="fixed inset-0 bg-white/50 items-center justify-center flex z-50 py-10 overflow-y scroll-m-1">
        <div class="bg-white rounded-lg shadow-lg shadow-blue-400 w-96 p-4">
            <h2 class="text-lg font-bold mb-4 text-center">Edit Jam Kerja</h2>
            <form id="formEditJamKerja" onsubmit="updateJamKerja(); return false;">
                @csrf
                <input type="hidden" id="editJamKerjaId" name="id">

                <div class="grid grid-cols-2 gap-2">
                    <!-- User Profile -->
                    <div>
                        <label for="editJamKerjaUserProfile" class="block mb-1">Nama User Profile</label>
                        <select id="editJamKerjaUserProfile" name="users_profile_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                            <option value="">Pilih User Profile</option>
                        </select>
                    </div>

                    <!-- No WBS -->
                    <div>
                        <label for="editNoWbs">No WBS</label>
                        <input type="text" id="editNoWbs" name="no_wbs" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" readonly>
                    </div>

                    <!-- Kode Proyek -->
                    <div>
                        <label for="editKodeProyek">Kode Proyek</label>
                        <input type="text" id="editKodeProyek" name="kode_proyek" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" readonly>
                    </div>

                    <!-- Nama Proyek -->
                    <div>
                        <label for="editJamKerjaProyekID" class="block mb-1">Proyek</label>
                        <select id="editJamKerjaProyekID" name="proyek_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                            <option value="">Pilih Nama Proyek</option>
                        </select>
                    </div>

                    <!-- Aktivitas -->
                    <div>
                        <label for="editJamKerjaAktivitasID" class="block mb-1">Aktivitas</label>
                        <select id="editJamKerjaAktivitasID" name="aktivitas_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                            <option value="">Pilih Nama Aktivitas</option>
                        </select>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label for="editJamKerjaTanggal" class="block mb-1">Tanggal</label>
                        <input type="date" id="editJamKerjaTanggal" name="tanggal" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                    </div>

                    <!-- Jumlah Jam -->
                    <div>
                        <label for="editJamKerjaJumlahJam" class="block mb-1">Jumlah Jam</label>
                        <input type="number" id="editJamKerjaJumlahJam" name="jumlah_jam" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" placeholder="Masukkan Jumlah Jam" required>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="editJamKerjaStatusID" class="block mb-1">Status</label>
                        <select id="editJamKerjaStatusID" name="status_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                            <option value="">Pilih Nama Status</option>
                        </select>
                    </div>

                    <!-- Mode Jam Kerja -->
                    <div>
                        <label for="editJamKerjaModeJamKerjaID" class="block mb-1">Mode Jam Kerja</label>
                        <select id="editJamKerjaModeJamKerjaID" name="mode_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                            <option value="">Pilih Nama Mode Jam Kerja</option>
                        </select>
                    </div>

                    <!-- Keterangan -->
                    <div class="col-span-2">
                        <label for="editJamKerjaKeterangan" class="block mb-1">Keterangan</label>
                        <textarea id="editJamKerjaKeterangan" name="keterangan" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" placeholder="Masukkan Keterangan"></textarea>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" onclick="closeEditJamKerjaModal()" class="bg-gray-400 text-white px-4 py-2 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
