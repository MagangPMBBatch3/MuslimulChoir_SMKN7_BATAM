async function loadUserProfileOptionsForEdit() {
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
    const select = document.getElementById("editJamPerTanggalUserProfile");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allUserProfile.forEach((userProfile) => {
        const option = new Option(userProfile.nama_lengkap, userProfile.id);
        select.add(option);
    });
}

async function loadProyekOptionsForEdit() {
    const query = `
        query {
            allProyeks {
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
    const select = document.getElementById("editJamPerTanggalProyek");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allProyeks.forEach((proyek) => {
        const option = new Option(proyek.nama, proyek.id);
        select.add(option);
    });
}

async function openEditJamPerTanggalModal(id, users_profile_id, proyek_id, tanggal, jam) {
    await loadUserProfileOptionsForEdit();
    await loadProyekOptionsForEdit();
    document.getElementById("editId").value = id;
    document.getElementById("editJamPerTanggalUserProfile").value = users_profile_id;
    document.getElementById("editJamPerTanggalProyek").value = proyek_id;
    document.getElementById("editJamPerTanggalTanggal").value = tanggal;
    document.getElementById("editJamPerTanggalJam").value = jam;
    document.getElementById("modalEditJamPerTanggal").classList.remove("hidden");
}

function closeEditJamPerTanggalModal() {
    document.getElementById("modalEditJamPerTanggal").classList.add("hidden");
}

async function updateJamPerTanggal() {
    const id = document.getElementById("editId").value;
    const users_profile_id = document.getElementById("editJamPerTanggalUserProfile").value;
    const proyek_id = document.getElementById("editJamPerTanggalProyek").value;
    const tanggal = document.getElementById("editJamPerTanggalTanggal").value;
    const jam = document.getElementById("editJamPerTanggalJam").value;

    if (!users_profile_id || !proyek_id || !tanggal || !jam) {
        alert("Semua field harus diisi!");
        return;
    }

    const mutation = `
            mutation {
                updateJamPerTanggal(
                    id: ${id},
                    input: { 
                        users_profile_id: ${users_profile_id}
                        proyek_id: ${proyek_id}
                        tanggal: "${tanggal}"
                        jam: ${parseFloat(jam)}
                    }
                ) {
                    id
                    tanggal
                    userProfile {
                        id
                        nama_lengkap
                    }
                     proyek {
                        id
                        nama
                    }
                }
            }`;

    await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });

    loadJamPerTanggalData();
    closeEditJamPerTanggalModal();
}