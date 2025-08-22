<div id="modalAddJamKerja" class="hidden">
    <div  class="fixed inset-0 bg-white/50 items-center justify-center flex z-50 py-10 overflow-y scroll-m-1">
        <div class="bg-white rounded-lg w-96 p-4 shadow-lg shadow-blue-400">
            <h2 class="text-lg font-bold mb-4 text-center">Tambah Jam Kerja</h2>
            <form id="formAddJamKerja" onsubmit="createJamKerja(); return false;">
                @csrf

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label for="addJamKerjaUserProfile" class="block mb-1">Nama User Profile</label>
                        <select id="addJamKerjaUserProfile" name="users_profile_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                        <option value="">Pilih User Profile</option> 
                        </select>
                    </div>

                    <div>
                        <label for="no_wbs">No WBS</label>
                        <input type="text" id="no_wbs" name="no_wbs" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" readonly>
                    </div>

                     <div>
                        <label for="kode_proyek">Kode Proyek</label>
                        <input type="text" id="kode_proyek" name="kode_proyek" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" readonly>
                    </div>

                    <div>
                        <label for="addJamKerjaProyekID" class="block mb-1">Proyek</label>
                        <select id="addJamKerjaProyekID" name="proyek_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                         <option value="">Pilih Nama Proyek</option>   
                        </select>
                    </div>

                    <div>
                        <label for="addJamKerjaAktivitasID" class="block mb-1">Aktivitas</label>
                        <select id="addJamKerjaAktivitasID" name="aktivitas_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                        <option value="">Pilih Nama Aktivitas</option>  
                        </select>
                    </div>

                    <div>
                        <label for="addJamKerjaTanggal" class="block mb-1">Tanggal</label>
                        <input type="date" id="addJamKerjaTanggal" name="tanggal" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="addJamKerjaJumlahJam" class="block mb-1">Jumlah Jam</label>
                        <input type="number" id="addJamKerjaJumlahJam" name="jumlah_jam" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500"  placeholder="Masukkan Jumlah Jam" required>
                    </div>

                    <div>
                        <label for="addJamKerjaStatusID" class="block mb-1">Status</label>
                        <select id="addJamKerjaStatusID" name="status_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                        <option value="">Pilih Nama Status</option>    
                        </select>
                    </div>

                    <div>
                        <label for="addJamKerjaModeJamKerjaID" class="block mb-1">Mode Jam Kerja</label>
                        <select id="addJamKerjaModeJamKerjaID" name="mode_id" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" required>
                        <option value="">Pilih Nama Mode Jam Kerja</option>    
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="addJamKerjaKeterangan" class="block mb-1">Keterangan</label>
                        <textarea id="addJamKerjaKeterangan" name="keterangan" class="border border-gray-300 p-2 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500"  placeholder="Masukkan Keterangan"></textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" onclick="closeAddJamKerjaModal()" class="bg-gray-400 text-white px-4 py-2 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>