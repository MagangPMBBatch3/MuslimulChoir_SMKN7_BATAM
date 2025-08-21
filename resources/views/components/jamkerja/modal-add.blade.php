<div id="modalAddJamKerja" class="hidden">
    <div class="fixed inset-0 bg-white bg-opacity-50 items-center justify-center flex">
        <div class="bg-white rounded-lg shadow-lg w-[48rem] p-6">
            <h2 class="text-lg font-bold mb-4">Tambah Jam Kerja</h2>
            <form id="formAddJamKerja" onsubmit="createJamKerja(); return false;">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="addJamKerjaUserProfile" class="block mb-1">User</label>
                        <select id="addJamKerjaUserProfile" name="users_profile_id" class="border p-2 w-full rounded" required>
                        <option value="">Pilih User Profile</option> 
                        </select>
                    </div>

                    <div>
                        <label for="addJamKerjaNoWbs" class="block mb-1">No WBS</label>
                        <input type="text" id="addJamKerjaNoWbs" name="no_wbs" class="border p-2 w-full rounded"  placeholder="Masukkan No WBS">
                    </div>

                    <div>
                        <label for="addJamKerjaKodeProyek" class="block mb-1">Kode Proyek</label>
                        <input type="text" id="addJamKerjaKodeProyek" name="kode_proyek" class="border p-2 w-full rounded"  placeholder="Masukkan Kode Proyek">
                    </div>

                    <div>
                        <label for="addJamKerjaProyekID" class="block mb-1">Proyek</label>
                        <select id="addJamKerjaProyekID" name="proyek_id" class="border p-2 w-full rounded" required>
                         <option value="">Pilih Nama Proyek</option>   
                        </select>
                    </div>

                    <div>
                        <label for="addJamKerjaAktivitasID" class="block mb-1">Aktivitas</label>
                        <select id="addJamKerjaAktivitasID" name="aktivitas_id" class="border p-2 w-full rounded" required>
                        <option value="">Pilih Nama Aktivitas</option>  
                        </select>
                    </div>

                    <div>
                        <label for="addJamKerjaTanggal" class="block mb-1">Tanggal</label>
                        <input type="date" id="addJamKerjaTanggal" name="tanggal" class="border p-2 w-full rounded" required>
                    </div>

                    <div>
                        <label for="addJamKerjaJumlahJam" class="block mb-1">Jumlah Jam</label>
                        <input type="number" id="addJamKerjaJumlahJam" name="jumlah_jam" class="border p-2 w-full rounded"  placeholder="Masukkan Jumlah Jam" required>
                    </div>

                    <div>
                        <label for="addJamKerjaStatusID" class="block mb-1">Status</label>
                        <select id="addJamKerjaStatusID" name="status_id" class="border p-2 w-full rounded" required>
                        <option value="">Pilih Nama Status</option>    
                        </select>
                    </div>

                    <div>
                        <label for="addJamKerjaModeID" class="block mb-1">Mode Jam Kerja</label>
                        <select id="addJamKerjaModeID" name="mode_id" class="border p-2 w-full rounded" required>
                        <option value="">Pilih Nama Mode Jam Kerja</option>    
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="addJamKerjaKeterangan" class="block mb-1">Keterangan</label>
                        <textarea id="addJamKerjaKeterangan" name="keterangan" class="border p-2 w-full rounded"  placeholder="Masukkan Keterangan"></textarea>
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