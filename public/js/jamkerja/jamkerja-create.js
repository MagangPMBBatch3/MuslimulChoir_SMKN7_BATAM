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
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query }),
    });

    const data = await response.json();
    const select = document.getElementById("addJamKerjaUserProfile");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allUserProfile.forEach((userProfile) => {
        const option = new Option(userProfile.nama_lengkap, userProfile.id);
        select.add(option);
    });
}

async function loadProyekOptions() {
    const query = `
        query {
            allProyek {
                id
                nama
            }
        }
    `;

    const response = await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query }),
    });

    const data = await response.json();
    const select = document.getElementById("addJamKerjaProyek");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allProyeks.forEach((proyek) => {
        const option = new Option(proyek.nama, proyek.id);
        select.add(option);
    });
}

async function loadAktivitasOptions() {
    const query = `
        query {
            allAktivitas {
                id
                nama
            }
        }
    `;

    const response = await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query }),
    });

    const data = await response.json();
    const select = document.getElementById("addJamKerjaAktivitas");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allAktivitas.forEach((aktivitas) => {
        const option = new Option(aktivitas.nama_lengkap, aktivitas.id);
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
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query }),
    });

    const data = await response.json();
    const select = document.getElementById("addJamKerjaStatus");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allStatus.forEach((status) => {
        const option = new Option(status.nama_lengkap, status.id);
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
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query }),
    });

    const data = await response.json();
    const select = document.getElementById("addJamKerjaModeJamKerja");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allModeJamKerja.forEach((modejamkerja) => {
        const option = new Option(modejamkerja.nama_lengkap, modejamkerja.id);
        select.add(option);
    });
}

function openAddModal() {
    document.getElementById("modalAddJamKerja").classList.remove("hidden");
    loadUserProfileOptions();
    loadProyekOptions();
    loadAktivitasOptions();
    loadStatusOptions();
    loadModeJamKerjaptions();
}

function closeAddJamKerjaModal() {
    document.getElementById("modalAddJamKerja").classList.add("hidden");
}

async function createJamKerja() {
    const users_profile_id = document.getElementById("addJamKerjaUserProfile").value;
    const no_wbs = document.getElementById("addJamKerjaNoWbs").value;
    const kode_proyek = document.getElementById("addJamKerjaKodeProyek").value;
    const proyek_id = document.getElementById("addJamKerjaProyekID").value;
    const aktivitas_id = document.getElementById("addJamKerjaAktivitasID").value;
    const tanggal = document.getElementById("addJamKerjaTanggal").value;
    const jumlah_jam = document.getElementById("addJamKerjaJumlahJam").value;
    const keterangan = document.getElementById("addJamKerjaKeterangan").value;
    const status_id = document.getElementById("addJamKerjaStatusID").value;
    const mode_id = document.getElementById("addJamKerjaModeID").value;

    if (!users_profile_id || !no_wbs || !kode_proyek || !proyek_id || !aktivitas_id || !tanggal || !jumlah_jam || !keterangan || !status_id || !mode_id) {
        alert("Field tidak boleh kosong!");
        return;
    }
    if (!jam || parseFloat(jam) <= 0) {
        alert("Jam harus diisi dengan angka lebih dari 0!");
        return;
    }

    const mutation = `
                    mutation {
                createJamKerja(
                    input: { 
                    users_profile_id: ${users_profile_id}
                    no_wbs: "${no_wbs}"
                    kode_proyek: "${kode_proyek}""
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
                    users_profile_id
                    no_wbs
                    kode_proyek
                    tanggal
                    jumlah_jam
                    keterangan
                    
                    # Relasi
                    userProfile {
                    nama_lengkap
                    }
                    proyek {
                    nama
                    }
                    aktivitas {
                    nama
                    }
                    status {
                    nama
                    }
                    modeJamKerja {
                    nama
                    }
                }
                }
                `;

        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query: mutation }),
        });

            closeAddJamKerjaModal();
            loadJamKerjaData();

}