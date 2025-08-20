async function loadLemburData() {
    //ambil data aktif
    const queryAktif = `query {
        allLembur {
            id
            users_profile_id
            proyek_id
            tanggal
            user_profile {
                nama_lengkap
            }
            proyek {
                nama
            }
    }
}`;
    const resAktif = await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: queryAktif }),
    });
    const dataAktif = await resAktif.json();
    renderLemburTable(
        dataAktif?.data?.allLembur || [],
        "dataLembur",
        true
    );

    const queryArsip = `query {
        allLemburArsip {
            id
            users_profile_id
            proyek_id
            tanggal
            user_profile {
                nama_lengkap
            }
            proyek {
                nama
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
    renderLemburTable(
        dataArsip?.data?.allLemburArsip || [],
        "dataLemburArsip",
        false
    );
}

function renderLemburTable(lemburs, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = "";

    if (!lemburs.length) {
        tbody.innerHTML = `
        <tr>
            <td colspan="4" class="text-center text-red-500 p-3">Data tidak ditemukan</td>
        </tr>`;
        return;
    }

    lemburs.forEach((item) => {
        let actions = "";
        if (isActive) {
            actions = `
                <button onclick="openEditLemburModal(${item.id}, '${item.users_profile_id}', '${item.proyek_id}', '${item.tanggal}')" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </button>
                <button onclick="archiveLembur(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Arsipkan
                </button>`;
        } else {
            actions = `
                <button onclick="restoreLembur(${item.id})" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                    Restore
                </button>
                <button onclick="forceDeleteLembur(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus Permanen
                </button>`;
        }

        tbody.innerHTML += `
            <tr>
                <td class="p-2 border text-center">${item.id}</td>
                <td class="p-2 border text-center">${item.user_profile.nama_lengkap}</td>
                <td class="p-2 border text-center">${item.proyek.nama}</td>
                <td class="p-2 border text-center">${item.tanggal}</td>
                <td class="p-2 border text-center">${actions}</td>
            </tr>`;
    });
}

async function archiveLembur(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
        mutation {
            deleteLembur( id: ${id} ) {
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
    loadLemburData();
}

async function restoreLembur(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `
        mutation {
            restoreLembur( id: ${id} ) {
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
    loadLemburData();
}

async function forceDeleteLembur(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
        mutation {
            forceDeleteLembur( id: ${id} ) {
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
    loadLemburData();
}

async function searchLembur() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadLemburData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        query = `
            query {
                lembur(id: ${keyword}) {
                    id
            users_profile_id
            proyek_id
            tanggal
            user_profile {
                nama_lengkap
            }
            proyek {
                nama
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
        renderLemburTable(
            data.data.lembur ? [data.data.lembur] : [],
            "dataLembur",
            true
        );
    } else {
        query = `
            query {
                getLemburs(search: "${keyword}") {
                     id
            users_profile_id
            proyek_id
            tanggal
            user_profile {
                nama_lengkap
            }
            proyek {
                nama
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
        renderLemburTable(
            data?.data?.getLemburs || [],
            "dataLembur",
            true
        );
    }
}

document.addEventListener("DOMContentLoaded", loadLemburData);