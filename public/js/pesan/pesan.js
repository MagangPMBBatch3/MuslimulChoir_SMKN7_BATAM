async function loadPesanData() {
    //ambil data aktif
    const queryAktif = `query {
        allPesan {
            id
            pengirim
            penerima
            isi
            parent_id
            tgl_pesan
            jenis_id
            jenis_pesan {
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
    renderPesanTable(
        dataAktif?.data?.allPesan || [],
        "dataPesan",
        true
    );

    const queryArsip = `query {
        allPesanArsip {
             id
            pengirim
            penerima
            isi
            parent_id
            tgl_pesan
            jenis_id
            jenis_pesan {
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
    renderPesanTable(
        dataArsip?.data?.allPesanArsip || [],
        "dataPesanArsip",
        false
    );
}

function renderPesanTable(keterangans, tableId, isActive) {
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
                <button onclick="openEditPesanModal('${item.id}', '${item.pengirim}','${item.penerima}','${item.isi}','${item.parent_id}' ,'${item.tgl_pesan}', '${item.jenis_id}')" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </button>
                <button onclick="archivePesan(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Arsipkan
                </button>`;
        } else {
            actions = `
                <button onclick="restorePesan(${item.id})" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                    Restore
                </button>
                <button onclick="forceDeletePesan(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus Permanen
                </button>`;
        }

        tbody.innerHTML += `
            <tr>
                <td class="p-2 border text-center">${item.id}</td>
                <td class="p-2 border text-center">${item.pengirim}</td>
                <td class="p-2 border text-center">${item.penerima}</td>
                <td class="p-2 border text-center">${item.isi}</td>
                <td class="p-2 border text-center">${item.parent_id}</td>
                <td class="p-2 border text-center">${item.tgl_pesan}</td>
                <td class="p-2 border text-center">${item.jenis_pesan.nama}</td>
                <td class="p-2 border text-center">${actions}</td>
            </tr>`;
    });
}

async function archivePesan(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
        mutation {
            deletePesan( id: ${id} ) {
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
    loadPesanData();
}

async function restorePesan(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `
        mutation {
            restorePesan( id: ${id} ) {
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
    loadPesanData();
}

async function forceDeletePesan(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
        mutation {
            forceDeletePesan( id: ${id} ) {
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
    loadPesanData();
}

async function searchPesan() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadPesanData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        query = `
            query {
                Pesan(id: ${keyword}) {
                    id
            pengirim
            penerima
            isi
            parent_id
            tgl_pesan
            jenis_id
            jenis_pesan {
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
        renderPesanTable(
            data.data.Pesan ? [data.data.Pesan] : [],
            "dataPesan",
            true
        );
    } else {
        query = `
            query {
                getPesans(search: "${keyword}") {
                    id
            pengirim
            penerima
            isi
            parent_id
            tgl_pesan
            jenis_id
            jenis_pesan {
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
        renderPesanTable(
            data.data.getPesans || [],
            "dataPesan",
            true
        );
    }
}

document.addEventListener("DOMContentLoaded", loadPesanData);