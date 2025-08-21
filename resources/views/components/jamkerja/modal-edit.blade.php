<div id="modalEdit" class="hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center flex">
        <div class="bg-white rounded-lg shadow-lg w-[48rem] p-6">
            <h2 class="text-lg font-bold mb-4">Edit Jam Kerja</h2>
            <form id="formEditJamKerja" onsubmit="updateJamKerja(); return false;">
                @csrf
                <input type="hidden" id="editId" name="id">

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="editUsersProfile" class="block mb-1">User</label>
                        <select id="editUsersProfile" name="users_profile_id" class="border p-2 w-full rounded" required>
                        </select>
                    </div>

                    <div>
                        <label for="editNoWbs" class="block mb-1">No WBS</label>
                        <input type="text" id="editNoWbs" name="no_wbs" class="border p-2 w-full rounded">
                    </div>

                    <div>
                        <label for="editKodeProyek" class="block mb-1">Kode Proyek</label>
                        <input type="text" id="editKodeProyek" name="kode_proyek" class="border p-2 w-full rounded">
                    </div>

                    <div>
                        <label for="editProyek" class="block mb-1">Proyek</label>
                        <select id="editProyek" name="proyek_id" class="border p-2 w-full rounded" required>
                        </select>
                    </div>

                    <div>
                        <label for="editAktivitas" class="block mb-1">Aktivitas</label>
                        <select id="editAktivitas" name="aktivitas_id" class="border p-2 w-full rounded" required>
                        </select>
                    </div>

                    <div>
                        <label for="editTanggal" class="block mb-1">Tanggal</label>
                        <input type="date" id="editTanggal" name="tanggal" class="border p-2 w-full rounded" required>
                    </div>

                    <div>
                        <label for="editJumlahJam" class="block mb-1">Jumlah Jam</label>
                        <input type="number" id="editJumlahJam" name="jumlah_jam" class="border p-2 w-full rounded" required>
                    </div>

                    <div>
                        <label for="editStatus" class="block mb-1">Status</label>
                        <select id="editStatus" name="status_id" class="border p-2 w-full rounded" required>
                        </select>
                    </div>

                    <div>
                        <label for="editMode" class="block mb-1">Mode Jam Kerja</label>
                        <select id="editMode" name="mode_id" class="border p-2 w-full rounded" required>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="editKeterangan" class="block mb-1">Keterangan</label>
                        <textarea id="editKeterangan" name="keterangan" class="border p-2 w-full rounded"></textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-400 text-white px-4 py-2 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>