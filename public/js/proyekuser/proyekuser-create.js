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
    const select = document.getElementById("addProyekUserProyek"); // disamakan ID-nya

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allProyek.forEach((proyek) => {
        const option = new Option(proyek.nama, proyek.id);
        select.add(option);
    });
}

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
    const select = document.getElementById("addProyekUserUserProfile"); // disamakan ID-nya

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allUserProfile.forEach((userprofile) => {
        const option = new Option(userprofile.nama_lengkap, userprofile.id);
        select.add(option);
    });
}

function openAddModal() {
    document.getElementById("modalAddProyekUser").classList.remove("hidden");
    loadProyekOptions();
    loadUserProfileOptions();
}

function closeAddProyekUserModal() {
    document.getElementById("modalAddProyekUser").classList.add("hidden");
}

async function createProyekUser() {
    const proyek_id = document.getElementById("addProyekUserProyek").value;
    const users_profile_id = document.getElementById("addProyekUserUserProfile").value;

    if (!proyek_id || !users_profile_id) {
        alert("Semua field harus diisi!");
        return;
    }

    const mutation = `
        mutation {
            createProyekUser(input: { 
                proyek_id: "${proyek_id}"
                users_profile_id: "${users_profile_id}"
            }) {
                id
                proyek {
                    nama
                }
                user_profile {
                    nama_lengkap
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

    closeAddProyekUserModal();
    loadProyekUserData();
}
