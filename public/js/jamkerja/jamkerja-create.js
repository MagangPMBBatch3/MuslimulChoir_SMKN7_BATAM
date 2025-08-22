// ------------------- LOAD OPTIONS -------------------

async function loadUserProfileOptions() {
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
    const select = document.getElementById("addJamKerjaUserProfile");

    while (select.options.length > 1) select.remove(1);

    data.data.allUserProfile.forEach(user => {
        const option = new Option(user.nama_lengkap, user.id);
        select.add(option);
    });
}

async function loadProyekOptions() {
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
    const select = document.getElementById("addJamKerjaProyekID");

    while (select.options.length > 1) select.remove(1);

    data.data.allProyek.forEach(proyek => {
        const option = new Option(proyek.nama, proyek.id);
        option.dataset.kode = proyek.kode; // simpan kode proyek
        select.add(option);
    });
}

async function loadAktivitasOptions() {
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
    const select = document.getElementById("addJamKerjaAktivitasID");

    while (select.options.length > 1) select.remove(1);

    data.data.allAktivitas.forEach(aktivitas => {
        const option = new Option(aktivitas.nama, aktivitas.id);
        option.dataset.wbs = aktivitas.no_wbs; // simpan no_wbs
        select.add(option);
    });
}

async function loadStatusOptions() {
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
    const select = document.getElementById("addJamKerjaStatusID");

    while (select.options.length > 1) select.remove(1);

    data.data.allStatus.forEach(status => {
        const option = new Option(status.nama, status.id);
        select.add(option);
    });
}

async function loadModeJamKerjaOptions() {
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
    const select = document.getElementById("addJamKerjaModeJamKerjaID");

    while (select.options.length > 1) select.remove(1);

    data.data.allModeJamKerja.forEach(mode => {
        const option = new Option(mode.nama, mode.id);
        select.add(option);
    });
}

// ------------------- EVENT LISTENERS -------------------

document.addEventListener("DOMContentLoaded", () => {
    // Dropdown Proyek -> isi kode_proyek
    const proyekSelect = document.getElementById("addJamKerjaProyekID");
    proyekSelect.addEventListener("change", function () {
        const selected = this.options[this.selectedIndex];
        document.getElementById("kode_proyek").value = selected.dataset.kode || "";
    });

    // Dropdown Aktivitas -> isi no_wbs
    const aktivitasSelect = document.getElementById("addJamKerjaAktivitasID");
    aktivitasSelect.addEventListener("change", function () {
        const selected = this.options[this.selectedIndex];
        document.getElementById("no_wbs").value = selected.dataset.wbs || "";
    });
});

// ------------------- MODAL -------------------

function openAddModal() {
    document.getElementById("modalAddJamKerja").classList.remove("hidden");
    loadUserProfileOptions();
    loadProyekOptions();
    loadAktivitasOptions();
    loadStatusOptions();
    loadModeJamKerjaOptions();
}

function closeAddJamKerjaModal() {
    document.getElementById("modalAddJamKerja").classList.add("hidden");
}

// ------------------- CREATE JAM KERJA -------------------

async function createJamKerja() {
    const users_profile_id = document.getElementById("addJamKerjaUserProfile").value;
    const no_wbs = document.getElementById("no_wbs").value;
    const kode_proyek = document.getElementById("kode_proyek").value;
    const proyek_id = document.getElementById("addJamKerjaProyekID").value;
    const aktivitas_id = document.getElementById("addJamKerjaAktivitasID").value;
    const tanggal = document.getElementById("addJamKerjaTanggal").value;
    const jumlah_jam = document.getElementById("addJamKerjaJumlahJam").value;
    const keterangan = document.getElementById("addJamKerjaKeterangan").value;
    const status_id = document.getElementById("addJamKerjaStatusID").value;
    const mode_id = document.getElementById("addJamKerjaModeJamKerjaID").value;

    // Validasi
    if (!users_profile_id || !no_wbs || !kode_proyek || !proyek_id || !aktivitas_id || !tanggal || !jumlah_jam || !keterangan || !status_id || !mode_id) {
        alert("Field tidak boleh kosong!");
        return;
    }
    if (parseFloat(jumlah_jam) <= 0) {
        alert("Jam harus diisi dengan angka lebih dari 0!");
        return;
    }

    const mutation = `
        mutation {
            createJamKerja(
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

    closeAddJamKerjaModal();
    loadJamKerjaData(); // pastikan fungsi ini ada untuk refresh data
}
