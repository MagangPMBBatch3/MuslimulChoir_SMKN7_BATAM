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
    const select = document.getElementById("editProyekUserProyek");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allProyek.forEach((proyek) => {
        const option = new Option(proyek.nama, proyek.id);
        select.add(option);
    });
}

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
    const select = document.getElementById("editProyekUserUsersProfile");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allUserProfile.forEach((userprofile) => {
        const option = new Option(userprofile.nama_lengkap, userprofile.id);
        select.add(option);
    });
}

async function openEditProyekUserModal(id, proyek_id, users_profile_id) {
    await loadUserProfileOptionsForEdit();
    await loadProyekOptionsForEdit();
    document.getElementById("editId").value = id;
    document.getElementById("editProyekUserUsersProfile").value = users_profile_id;
    document.getElementById("editProyekUserProyek").value = proyek_id;
   
    document.getElementById("modalEditProyekUser").classList.remove("hidden");
}

function closeEditProyekUserModal() {
    document.getElementById("modalEditProyekUser").classList.add("hidden");
}

async function updateProyekUser() {
    const id = document.getElementById("editId").value;
    const users_profile_id = document.getElementById("editProyekUserUsersProfile").value;
    const proyek_id = document.getElementById("editProyekUserProyek").value;
    console.log(id, users_profile_id, proyek_id);

    if ( !users_profile_id || !proyek_id) {
        alert("Semua field harus diisi!");
        return;
    }

    const mutation = `
            mutation {
                updateProyekUser(
                    id: ${id},
                    input: { 
                        proyek_id: ${proyek_id}
                        users_profile_id: ${users_profile_id}
                    }
                ) {
                    id
                    proyek {
                        id
                        nama
                    }
                    user_profile {
                        id
                        nama_lengkap
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
    
}