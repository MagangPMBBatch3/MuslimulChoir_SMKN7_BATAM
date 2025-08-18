async function loadAktivitasData() {
    //ambil data aktif
    const queryAktif = `query {
        allAktivitas {
            id
            bagian_id
            no_wbs
            nama
            bagian {
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
    renderAktivitasTable(
        dataAktif?.data?.allAktivitas || [],
        "dataAktivitas",
        true
    );

    const queryArsip = `query {
        allAktivitasArsip {
            id
            bagian_id
            no_wbs
            nama
            deleted_at
            bagian {
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
    renderAktivitasTable(
        dataArsip?.data?.allAktivitasArsip || [],
        "dataAktivitasArsip",
        false
    );
}

function renderAktivitasTable(aktivitas, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = "";

    if (!aktivitas.length) {
        tbody.innerHTML = `
        <tr>
            <td colspan="5" class="text-center text-red-500 p-3">Data tidak ditemukan</td>
        </tr>`;
        return;
    }

    aktivitas.forEach((item) => {
        let actions = "";
        if (isActive) {
            actions = `
                <button onclick="openEditAktivitasModal(${item.id}, '${item.bagian_id}', '${item.no_wbs}', '${item.nama}')" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </button>
                <button onclick="archiveAktivitas(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                   Arsipkan
                </button>`;
        } else {
            actions = `
                <button onclick="restoreAktivitas(${item.id})" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                    Restore
                </button>
                <button onclick="forceDeleteAktivitas(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus Permanen
                </button>`;
        }

        tbody.innerHTML += `
            <tr>
                <td class="p-2 border text-center">${item.id}</td>
                <td class="p-2 border text-center">${item.bagian.nama}</td>
                <td class="p-2 border text-center">${item.no_wbs}</td>
                <td class="p-2 border text-center">${item.nama}</td>
                <td class="p-2 border text-center">${actions}</td>
            </tr>`;
    });
}

async function archiveAktivitas(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
        mutation {
            deleteAktivitas( id: ${id} ) {
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
    loadAktivitasData();
}

async function restoreAktivitas(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `
        mutation {
            restoreAktivitas( id: ${id} ) {
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
    loadAktivitasData();
}

async function forceDeleteAktivitas(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
        mutation {
            forceDeleteAktivitas( id: ${id} ) {
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
    loadAktivitasData();
}

async function searchAktivitas() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadAktivitasData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        query = `
            query {
                aktivitas(id: ${keyword}) {
                    id
                    bagian_id
                    no_wbs
                    nama
                    bagian {
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
        renderAktivitasTable(
            data.data.aktivitas ? [data.data.aktivitas] : [],
            "dataAktivitas",
            true
        );
    } else {
        query = `
            query {
                getAktivitas(search: "${keyword}") {
                    id
                    bagian_id
                    no_wbs
                    nama
                    bagian {
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
        renderAktivitasTable(
            data.data.getAktivitas || [],
            "dataAktivitas",
            true
        );
    }
}

document.addEventListener("DOMContentLoaded", loadAktivitasData);