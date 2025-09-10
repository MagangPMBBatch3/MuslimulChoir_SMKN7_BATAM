<!-- Modal Tambah Jam Kerja -->
<div id="modalAddJamKerja" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeAddJamKerjaModal()"class="text-gray-400 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>

        <h2 class="text-xl font-bold mb-6 text-center">Tambah Jam Kerja</h2>

        <form id="formAddJamKerja" onsubmit="event.preventDefault(); createJamKerja()">
            @csrf

            <div class="grid grid-cols-2 gap-0.5">
                <!-- User Profile -->
                <div>
                    <label for="addJamKerjaUserProfile" class="block mb-1 text-sm">Nama User Profile:</label>
                    <select id="addJamKerjaUserProfile" name="users_profile_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-1 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih User Profile</option>
                    </select>
                </div>

                <!-- No WBS -->
                <div>
                    <label for="no_wbs" class="block mb-1 text-sm">No WBS:</label>
                    <input type="text" id="no_wbs" name="no_wbs" placeholder="No WBS" readonly
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-400 p-1 cursor-not-allowed">
                </div>

                <!-- Kode Proyek -->
                <div>
                    <label for="kode_proyek" class="block mb-1 text-sm">Kode Proyek:</label>
                    <input type="text" id="kode_proyek" name="kode_proyek" placeholder="Kode Proyek" readonly
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-400 p-1 cursor-not-allowed">
                </div>

                <!-- Proyek -->
                <div>
                    <label for="addJamKerjaProyekID" class="block mb-1 text-sm">Nama Proyek:</label>
                    <select id="addJamKerjaProyekID" name="proyek_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-1">
                        <option value="">Pilih Nama Proyek</option>
                    </select>
                </div>

                <!-- Aktivitas -->
                <div>
                    <label for="addJamKerjaAktivitasID" class="block mb-1 text-sm">nama Aktivitas:</label>
                    <select id="addJamKerjaAktivitasID" name="aktivitas_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-1">
                        <option value="">Pilih Nama Aktivitas</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="addJamKerjaTanggal" class="block mb-1 text-sm">Tanggal:</label>
                    <input type="date" id="addJamKerjaTanggal" name="tanggal" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-1">
                </div>

                <!-- Jumlah Jam -->
                <div>
                    <label for="addJamKerjaJumlahJam" class="block mb-1 text-sm">Jumlah Jam:</label>
                    <input type="number" id="addJamKerjaJumlahJam" name="jumlah_jam" required
                        placeholder="Masukkan Jumlah Jam"
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-1">
                </div>

                <!-- Status -->
                <div>
                    <label for="addJamKerjaStatusID" class="block mb-1 text-sm">Nama Status:</label>
                    <select id="addJamKerjaStatusID" name="status_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-1">
                        <option value="">Pilih Status</option>
                    </select>
                </div>

                <!-- Mode Jam Kerja -->
                <div>
                    <label for="addJamKerjaModeJamKerjaID" class="block mb-1 text-sm">Nama ModeJamKerja:</label>
                    <select id="addJamKerjaModeJamKerjaID" name="mode_id" required
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-1">
                        <option value="">Pilih Mode</option>
                    </select>
                </div>

                <!-- Keterangan -->
                <div class="col-span-2">
                    <label for="addJamKerjaKeterangan" class="block mb-1 text-sm">nama Keterangan:</label>
                    <textarea id="addJamKerjaKeterangan" name="keterangan"
                        placeholder="Masukkan Keterangan"
                        class="w-full rounded-md border border-slate-600 bg-gray-900 text-gray-200 p-1"></textarea>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-2 mt-6 border-t border-slate-700 pt-4">
                 <x-button type="button" variant="secondary" onclick="closeAddJamKerjaModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Tambah Data</x-button>

                
                
            </div>
        </form>
    </div>
</div>
