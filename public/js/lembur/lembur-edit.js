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
    const select = document.getElementById("editLemburUserProfile");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allUserProfile.forEach((userprofile) => {
        const option = new Option(userprofile.nama_lengkap, userprofile.id);
        select.add(option);
    });
}

async function loadProyekOptionsForEdit() {
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
    const select = document.getElementById("editLemburProyek");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allProyek.forEach((proyek) => {
        const option = new Option(proyek.nama, proyek.id);
        select.add(option);
    });
}

async function openEditLemburModal(id, users_profile_id, proyek_id, tanggal) {
    await loadUserProfileOptionsForEdit();
    await loadProyekOptionsForEdit();
    document.getElementById("editId").value = id;
    document.getElementById("editLemburUserProfile").value = users_profile_id;
    document.getElementById("editLemburProyek").value = proyek_id;
    document.getElementById("editLemburTanggal").value = tanggal;
    document.getElementById("modalEditLembur").classList.remove("hidden");
}

function closeEditLemburModal() {
    document.getElementById("modalEditLembur").classList.add("hidden");
}

async function updateLembur() {
    const id = document.getElementById("editId").value;
    const users_profile_id = document.getElementById("editLemburUserProfile").value;
    const proyek_id = document.getElementById("editLemburProyek").value;
    const tanggal = document.getElementById("editLemburTanggal").value.trim();

    if (!tanggal || !users_profile_id || !proyek_id) {
        alert("Semua field harus diisi!");
        return;
    }

    const mutation = `
            mutation {
                updateLembur(
                    id: ${id},
                    input: { 
                        users_profile_id: ${users_profile_id}
                        proyek_id: ${proyek_id}
                        tanggal: "${tanggal}"
                    }
                ) {
                    id
                    tanggal
                    user_profile {
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

    loadLemburData();
    closeEditLemburModal();
}