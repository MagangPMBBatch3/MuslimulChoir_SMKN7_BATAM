async function loadKeteranganData() {
    //ambil data aktif
    const queryAktif = `query {
        allKeterangan {
            id
            bagian_id
            proyek_id
            tanggal
            bagian {
                nama
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
    renderKeteranganTable(
        dataAktif?.data?.allKeterangan || [],
        "dataKeterangan",
        true
    );

    const queryArsip = `query {
        allKeteranganArsip {
            id
            bagian_id
            proyek_id
            tanggal
            bagian {
                nama
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
    renderKeteranganTable(
        dataArsip?.data?.allKeteranganArsip || [],
        "dataKeteranganArsip",
        false
    );
}

function renderKeteranganTable(keterangans, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = "";

    if (!keterangans.length) {
        tbody.innerHTML = `
        <tr>
            <td colspan="4" class="text-center text-red-500 p-3">Data tidak ditemukan</td>
        </tr>`;
        return;
    }

    keterangans.forEach((item) => {
        let actions = "";
        if (isActive) {
            actions = `
                <button onclick="openEditKeteranganModal(${item.id}, '${item.bagian_id}', '${item.proyek_id}', '${item.tanggal}')" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </button>
                <button onclick="archiveKeterangan(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Arsipkan
                </button>`;
        } else {
            actions = `
                <button onclick="restoreKeterangan(${item.id})" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                    Restore
                </button>
                <button onclick="forceDeleteKeterangan(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus Permanen
                </button>`;
        }

        tbody.innerHTML += `
            <tr>
                <td class="p-2 border">${item.id}</td>
                <td class="p-2 border">${item.bagian.nama}</td>
                <td class="p-2 border">${item.proyek.nama}</td>
                <td class="p-2 border">${item.tanggal}</td>
                <td class="p-2 border">${actions}</td>
            </tr>`;
    });
}

async function archiveKeterangan(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
        mutation {
            deleteKeterangan( id: ${id} ) {
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
    loadKeteranganData();
}

async function restoreKeterangan(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `
        mutation {
            restoreKeterangan( id: ${id} ) {
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
    loadKeteranganData();
}

async function forceDeleteKeterangan(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
        mutation {
            forceDeleteKeterangan( id: ${id} ) {
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
    loadKeteranganData();
}

async function searchKeterangan() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadKeteranganData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        query = `
            query {
                keterangan(id: ${keyword}) {
                    id
                    bagian_id
                    proyek_id
                    tanggal
                    bagian {
                        nama
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
        renderKeteranganTable(
            data.data.keterangan ? [data.data.keterangan] : [],
            "dataKeterangan",
            true
        );
    } else {
        query = `
            query {
                getKeterangans(search: "${keyword}") {
                    id
                    bagian_id
                    proyek_id
                    tanggal
                    bagian {
                        nama
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
        renderKeteranganTable(
            data.data.getKeterangans || [],
            "dataKeterangan",
            true
        );
    }
}

document.addEventListener("DOMContentLoaded", loadKeteranganData);