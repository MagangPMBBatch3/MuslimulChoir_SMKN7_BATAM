async function loadProyekUserData() {
    //ambil data aktif
    const queryAktif = `query {
        allProyekUser {
            id
            proyek_id
            users_profile_id
            proyek {
            nama
            }
            user_profile {
            nama_lengkap
            }
        }
        }
`;
    const resAktif = await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: queryAktif }),
    });
    const dataAktif = await resAktif.json();
    renderProyekUserTable(
        dataAktif?.data?.allProyekUser || [],
        "dataProyekUser",
        true
    );

    const queryArsip = `query {
        allProyekUserArsip {
            id
            proyek_id
            users_profile_id
            proyek {
            nama
            }
            user_profile {
            nama_lengkap
            }
        }
        }`;

    const resArsip = await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: queryArsip }),
    });
    const dataArsip = await resArsip.json();
    renderProyekUserTable(
        dataArsip?.data?.allProyekUserArsip || [],
        "dataProyekUserArsip",
        false
    );
}

function renderProyekUserTable(ProyekUsers, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = "";

    if (!ProyekUsers.length) {
        tbody.innerHTML = `
        <tr>
            <td colspan="4" class="text-center text-red-500 p-3">Data tidak ditemukan</td>
        </tr>`;
        return;
    }

    ProyekUsers.forEach((item) => {
        let actions = "";
        if (isActive) {
            actions = `
                <button onclick="openEditProyekUserModal(${item.id}, '${item.proyek_id}', '${item.users_profile_id}')" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit 
                </button>
                <button onclick="archiveProyekUser(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Arsipkan
                </button>`;
        } else {
            actions = `
                <button onclick="restoreProyekUser(${item.id})" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                    Restore
                </button>
                <button onclick="forceDeleteProyekUser(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus Permanen
                </button>`;
        }

        tbody.innerHTML += `
            <tr>
                <td class="p-2 border text-center">${item.id}</td>
                <td class="p-2 border text-center">${item.proyek.nama}</td>
                <td class="p-2 border text-center">${item.user_profile.nama_lengkap}</td>
                <td class="p-2 border text-center">${actions}</td>
            </tr>`;
    });
}

async function archiveProyekUser(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
        mutation {
            deleteProyekUser( id: ${id} ) {
                id
            }
        }`;

    await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });
    loadProyekUserData();
}

async function restoreProyekUser(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `
        mutation {
            restoreProyekUser( id: ${id} ) {
                id
            }
        }`;

    await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });
    loadProyekUserData();
}

async function forceDeleteProyekUser(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
        mutation {
            forceDeleteProyekUser( id: ${id} ) {
                id
            }
        }`;

    await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });
    loadProyekUserData();
}

async function searchProyekUser() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadProyekUserData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        query = `
            query {
                proyekUser(id: ${keyword}) {
                    id
                    proyek_id
                    users_profile_id
                    proyek {
                        nama
                    }
                    user_profile {
                        nama_lengkap
                    }
                } 
            }
        `;
        const res = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });
        const data = await res.json();
        renderProyekUserTable(
            data.data.proyekUser ? [data.data.proyekUser] : [],
            "dataProyekUser",
            true
        );
    } else {
        query = `
            query {
                getProyekUsers(search: "${keyword}") {
                    id
                    proyek_id
                    users_profile_id
                    proyek {
                        nama
                    }
                    user_profile {
                        nama_lengkap
                    }
                }
            }
        `;
        const res = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });
        const data = await res.json();
        renderProyekUserTable(
            data.data.getProyekUsers || [],
            "dataProyekUser",
            true
        );
    }
}

document.addEventListener("DOMContentLoaded", loadProyekUserData);