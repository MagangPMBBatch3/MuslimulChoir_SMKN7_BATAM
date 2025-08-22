// ------------------- LOAD OPTIONS -------------------

async function loadUserProfileOptionsEdit(selectedId = null) {
    const query = `
        query {
            allUserProfile {
                id
                nama_lengkap
            }
        }
    `;
    const response = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query }),
    });
    const data = await response.json();
    const select = document.getElementById("editJamKerjaUserProfile");

    while (select.options.length > 1) select.remove(1);

    data.data.allUserProfile.forEach(user => {
        const option = new Option(user.nama_lengkap, user.id);
        select.add(option);
    });

    if (selectedId) select.value = selectedId;
}

async function loadProyekOptionsEdit(selectedId = null) {
    const query = `
        query {
            allProyek {
                id
                nama
                kode
            }
        }
    `;
    const response = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query }),
    });
    const data = await response.json();
    const select = document.getElementById("editJamKerjaProyekID");

    while (select.options.length > 1) select.remove(1);

    data.data.allProyek.forEach(proyek => {
        const option = new Option(proyek.nama, proyek.id);
        option.dataset.kode = proyek.kode;
        select.add(option);
    });

    if (selectedId) select.value = selectedId;
    updateKodeProyekEdit();
}

async function loadAktivitasOptionsEdit(selectedId = null) {
    const query = `
        query {
            allAktivitas {
                id
                nama
                no_wbs
            }
        }
    `;
    const response = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query }),
    });
    const data = await response.json();
    const select = document.getElementById("editJamKerjaAktivitasID");

    while (select.options.length > 1) select.remove(1);

    data.data.allAktivitas.forEach(aktivitas => {
        const option = new Option(aktivitas.nama, aktivitas.id);
        option.dataset.wbs = aktivitas.no_wbs;
        select.add(option);
    });

    if (selectedId) select.value = selectedId;
    updateNoWbsEdit();
}

async function loadStatusOptionsEdit(selectedId = null) {
    const query = `
        query {
            allStatus {
                id
                nama
            }
        }
    `;
    const response = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query }),
    });
    const data = await response.json();
    const select = document.getElementById("editJamKerjaStatusID");

    while (select.options.length > 1) select.remove(1);

    data.data.allStatus.forEach(status => {
        const option = new Option(status.nama, status.id);
        select.add(option);
    });

    if (selectedId) select.value = selectedId;
}

async function loadModeJamKerjaOptionsEdit(selectedId = null) {
    const query = `
        query {
            allModeJamKerja {
                id
                nama
            }
        }
    `;
    const response = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query }),
    });
    const data = await response.json();
    const select = document.getElementById("editJamKerjaModeJamKerjaID");

    while (select.options.length > 1) select.remove(1);

    data.data.allModeJamKerja.forEach(mode => {
        const option = new Option(mode.nama, mode.id);
        select.add(option);
    });

    if (selectedId) select.value = selectedId;
}

// ------------------- UPDATE INPUT OTOMATIS -------------------

function updateNoWbsEdit() {
    const select = document.getElementById("editJamKerjaAktivitasID");
    const selected = select.options[select.selectedIndex];
    document.getElementById("editNoWbs").value = selected ? selected.dataset.wbs : "";
}

function updateKodeProyekEdit() {
    const select = document.getElementById("editJamKerjaProyekID");
    const selected = select.options[select.selectedIndex];
    document.getElementById("editKodeProyek").value = selected ? selected.dataset.kode : "";
}

document.addEventListener("DOMContentLoaded", () => {
    // event onchange
    document.getElementById("editJamKerjaAktivitasID").addEventListener("change", updateNoWbsEdit);
    document.getElementById("editJamKerjaProyekID").addEventListener("change", updateKodeProyekEdit);
});

// ------------------- OPEN MODAL EDIT -------------------

function openEditModal(id,users_profile_id,no_wbs,kode_proyek,proyek_id,aktivitas_id, tanggal,jumlah_jam,keterangan,status_id,mode_id) {
    // jamKerjaData = object berisi semua field jam kerja
    document.getElementById("modalEditJamKerja").classList.remove("hidden");

    // load options dengan set selected
    loadUserProfileOptionsEdit(users_profile_id);
    loadProyekOptionsEdit(proyek_id);
    loadAktivitasOptionsEdit(aktivitas_id);
    loadStatusOptionsEdit(status_id);
    loadModeJamKerjaOptionsEdit(mode_id);

    // isi input lainnya
    document.getElementById("editJamKerjaTanggal").value = tanggal;
    document.getElementById("editJamKerjaJumlahJam").value = jumlah_jam;
    document.getElementById("editJamKerjaKeterangan").value = keterangan;
    document.getElementById("editJamKerjaId").value = id; // hidden input untuk id
}

// ------------------- SUBMIT EDIT -------------------

async function updateJamKerja() {
    const id = document.getElementById("editJamKerjaId").value;
    const users_profile_id = document.getElementById("editJamKerjaUserProfile").value;
    const no_wbs = document.getElementById("editNoWbs").value;
    const kode_proyek = document.getElementById("editKodeProyek").value;
    const proyek_id = document.getElementById("editJamKerjaProyekID").value;
    const aktivitas_id = document.getElementById("editJamKerjaAktivitasID").value;
    const tanggal = document.getElementById("editJamKerjaTanggal").value;
    const jumlah_jam = document.getElementById("editJamKerjaJumlahJam").value;
    const keterangan = document.getElementById("editJamKerjaKeterangan").value;
    const status_id = document.getElementById("editJamKerjaStatusID").value;
    const mode_id = document.getElementById("editJamKerjaModeJamKerjaID").value;

    if (!users_profile_id || !no_wbs || !kode_proyek || !proyek_id || !aktivitas_id || !tanggal || !jumlah_jam || !keterangan || !status_id || !mode_id) {
        alert("Field tidak boleh kosong!");
        return;
    }

    const mutation = `
        mutation {
            updateJamKerja(
                id: ${id},
                input: {
                    users_profile_id: ${users_profile_id}
                    no_wbs: "${no_wbs}"
                    kode_proyek: "${kode_proyek}"
                    proyek_id: ${proyek_id}
                    aktivitas_id: ${aktivitas_id}
                    tanggal: "${tanggal}"
                    jumlah_jam: ${jumlah_jam}
                    keterangan: "${keterangan}"
                    status_id: ${status_id}
                    mode_id: ${mode_id}
                }
            ) {
                id
            }
        }
    `;

    await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: mutation }),
    });

    closeEditJamKerjaModal();
    loadJamKerjaData(); // refresh data
}

function closeEditJamKerjaModal(){
    document.getElementById("modalEditJamKerja").classList.add("hidden")
}
