async function loadModeJamKerjaData() {
    //ambil data aktif
    const queryAktif = `query {
        allModeJamKerja {
            id
            nama
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
    renderModeJamKerjaTable(dataAktif?.data?.allModeJamKerja || [], "dataModeJamKerja", true);

    const queryArsip = `query {
        allModeJamKerjaArsip {
            id
            nama
            deleted_at
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
    renderModeJamKerjaTable(
        dataArsip?.data?.allModeJamKerjaArsip || [],
        "dataModeJamKerjaArsip",
        false
    );
}

function renderModeJamKerjaTable(modeJamKerjas, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = "";

    if (!modeJamKerjas.length) {
        tbody.innerHTML = `
        <tr>
            <td colspan="3" class="text-center text-red-500 p-3">Data tidak ditemukan</td>
        </tr>`;
        return;
    }

    modeJamKerjas.forEach((item) => {
        let actions = "";
        if (isActive) {
            actions = `
                <button onclick="openEditModeJamKerjaModal(${item.id}, '${item.nama}')" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </button>
                <button onclick="archiveModeJamKerja(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus
                </button>`;
        } else {
            actions = `
                <button onclick="restoreModeJamKerja(${item.id})" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                    Restore
                </button>
                <button onclick="forceDeleteModeJamKerja(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus Permanen
                </button>`;
        }

        tbody.innerHTML += `
            <tr>
                <td class="p-2 border text-center">${item.id}</td>
                <td class="p-2 border text-center">${item.nama}</td>
                <td class="p-2 border text-center">${actions}</td>
            </tr>`;
    });
}

async function archiveModeJamKerja(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
        mutation {
            deleteModeJamKerja( id: ${id} ) {
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
    loadModeJamKerjaData();
}

async function restoreModeJamKerja(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `
        mutation {
            restoreModeJamKerja( id: ${id} ) {
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
    loadModeJamKerjaData();
}

async function forceDeleteModeJamKerja(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
        mutation {
            forceDeleteModeJamKerja( id: ${id} ) {
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
    loadModeJamKerjaData();
}

async function searchModeJamKerja() {
    const keyword = document.getElementById("searchModeJamKerja").value.trim();
    if (!keyword) {
        loadModeJamKerjaData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        query = `
            query {
                modeJamKerja(id: ${keyword}) {
                    id
                    nama
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
        renderModeJamKerjaTable(
            data.data.modeJamKerja ? [data.data.modeJamKerja] : [],
            "dataModeJamKerja",
            true
        );
    } else {
        query = `
            query {
                modeJamKerjaByNama(nama: "%${keyword}%") {
                    id
                    nama
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
        renderModeJamKerjaTable(data.data.modeJamKerjaByNama || [], "dataModeJamKerja", true);
    }

}

document.addEventListener("DOMContentLoaded", loadModeJamKerjaData);