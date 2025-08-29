<!-- Modal Edit Jam Kerja -->
<div id="modalEditJamKerja" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <h2 class="text-xl font-bold mb-6 text-center">Edit Jam Kerja</h2>

        <form id="formEditJamKerja" onsubmit="event.preventDefault(); updateJamKerja()">
            @csrf
            <input type="hidden" id="editJamKerjaId" name="id">

            <div class="grid grid-cols-2 gap-0.5">
                <!-- User Profile -->
                <div>
                    <label for="editJamKerjaUserProfile" class="block mb-1 text-sm">Nama User Profile</label>
                    <select id="editJamKerjaUserProfile" name="users_profile_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-1">
                        <option value="">Pilih User Profile</option>
                    </select>
                </div>

                <!-- No WBS -->
                <div>
                    <label for="editNoWbs" class="block mb-1 text-sm">No WBS</label>
                    <input type="text" id="editNoWbs" name="no_wbs" readonly
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-400 p-1 cursor-not-allowed">
                </div>

                <!-- Kode Proyek -->
                <div>
                    <label for="editKodeProyek" class="block mb-1 text-sm">Kode Proyek</label>
                    <input type="text" id="editKodeProyek" name="kode_proyek" readonly
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-400 p-1 cursor-not-allowed">
                </div>

                <!-- Proyek -->
                <div>
                    <label for="editJamKerjaProyekID" class="block mb-1 text-sm">Proyek</label>
                    <select id="editJamKerjaProyekID" name="proyek_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-1">
                        <option value="">Pilih Nama Proyek</option>
                    </select>
                </div>

                <!-- Aktivitas -->
                <div>
                    <label for="editJamKerjaAktivitasID" class="block mb-1 text-sm">Aktivitas</label>
                    <select id="editJamKerjaAktivitasID" name="aktivitas_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-1">
                        <option value="">Pilih Nama Aktivitas</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="editJamKerjaTanggal" class="block mb-1 text-sm">Tanggal</label>
                    <input type="date" id="editJamKerjaTanggal" name="tanggal" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-1">
                </div>

                <!-- Jumlah Jam -->
                <div>
                    <label for="editJamKerjaJumlahJam" class="block mb-1 text-sm">Jumlah Jam</label>
                    <input type="number" id="editJamKerjaJumlahJam" name="jumlah_jam" required
                        placeholder="Masukkan Jumlah Jam"
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-1">
                </div>

                <!-- Status -->
                <div>
                    <label for="editJamKerjaStatusID" class="block mb-1 text-sm">Status</label>
                    <select id="editJamKerjaStatusID" name="status_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-1">
                        <option value="">Pilih Status</option>
                    </select>
                </div>

                <!-- Mode Jam Kerja -->
                <div>
                    <label for="editJamKerjaModeJamKerjaID" class="block mb-1 text-sm">Mode Jam Kerja</label>
                    <select id="editJamKerjaModeJamKerjaID" name="mode_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-1">
                        <option value="">Pilih Mode</option>
                    </select>
                </div>

                <!-- Keterangan -->
                <div class="col-span-2">
                    <label for="editJamKerjaKeterangan" class="block mb-1 text-sm">Keterangan</label>
                    <textarea id="editJamKerjaKeterangan" name="keterangan"
                        placeholder="Masukkan Keterangan"
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-1"></textarea>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end gap-2 mt-6 border-t border-slate-700 pt-4">
                <button type="button" onclick="closeEditJamKerjaModal()"
                    class="px-4 py-2 bg-slate-600 text-gray-200 rounded-lg hover:bg-slate-500 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
