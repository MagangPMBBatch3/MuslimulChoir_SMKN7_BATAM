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
    const select = document.getElementById("addJamPerTanggalUserProfile");

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
    const select = document.getElementById("addJamPerTanggalProyek");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allProyek.forEach((proyek) => {
        const option = new Option(proyek.nama, proyek.id);
        select.add(option);
    });
}

function openAddModal() {
    document.getElementById("modalAddJamPerTanggal").classList.remove("hidden");
    loadUserProfileOptions();
    loadProyekOptions();
}

function closeAddJamPerTanggalModal() {
    document.getElementById("modalAddJamPerTanggal").classList.add("hidden");
}

async function createJamPerTanggal() {
    const users_profile_id = document.getElementById("addJamPerTanggalUserProfile").value;
    const proyek_id = document.getElementById("addJamPerTanggalProyek").value;
    const tanggal = document.getElementById("addJamPerTanggalTanggal").value;
    const jam = document.getElementById("addJamPerTanggalJam").value;

    if (!users_profile_id || !proyek_id || !tanggal) {
        alert("Field tidak boleh kosong!");
        return;
    }
    if (!jam || parseFloat(jam) <= 0) {
        alert("Jam harus diisi dengan angka lebih dari 0!");
        return;
    }

    const mutation = `
        mutation {
            createJamPerTanggal(input: { 
                users_profile_id: "${users_profile_id}"
                proyek_id: "${proyek_id}"
                tanggal: "${tanggal}"
                jam: ${parseFloat(jam)}
            }) {    
                id
                tanggal
                userProfile {
                    nama_lengkap
                }
                proyek {
                    nama
                }
            }
        }`;

        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query: mutation }),
        });

            closeAddJamPerTanggalModal();
            loadJamPerTanggalData();

}