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
    const select = document.getElementById("addLemburUserProfile");


    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allUserProfile.forEach((userprofile) => {
        const option = new Option(userprofile.nama_lengkap, userprofile.id);
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
    const select = document.getElementById("addLemburProyek");


    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allProyek.forEach((proyek) => {
        const option = new Option(proyek.nama, proyek.id);
        select.add(option);
    });
}


function openAddModal() {
    document.getElementById("modalAddLembur").classList.remove("hidden");
    loadUserProfileOptions();
    loadProyekOptions();
}

function closeAddLemburModal() {
    document.getElementById("modalAddLembur").classList.add("hidden");
}

async function createLembur() {
    const users_profile_id = document.getElementById("addLemburUserProfile").value;
    const proyek_id = document.getElementById("addLemburProyek").value;
    const tanggal = document.getElementById("addLemburTanggal").value.trim();

    if (!users_profile_id || !proyek_id || !tanggal) {
        alert("Semua field harus diisi!");
        return;
    }

    const mutation = `
        mutation {
            createLembur(input: { 
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

    closeAddLemburModal();
    loadLemburData();
}