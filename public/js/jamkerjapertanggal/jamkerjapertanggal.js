async function loadJamPerTanggalData() {
    //ambil data aktif
    const queryAktif = `query {
        allJamPerTanggal {
            id
            users_profile_id
            proyek_id
            tanggal
            jam
            userProfile {
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
    renderJamPerTanggalTable(
        dataAktif?.data?.allJamPerTanggal || [],
        "dataJamPerTanggal",
        true
    );

    const queryArsip = `query {
        allJamPerTanggalArsip {
            id
            users_profile_id
            proyek_id
            tanggal
            jam
            userProfile {
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
    renderJamPerTanggalTable(
        dataArsip?.data?.allJamPerTanggalArsip || [],
        "dataJamPerTanggalArsip",
        false
    );
}

function renderJamPerTanggalTable(jamPerTanggals, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = "";

    if (!jamPerTanggals.length) {
        tbody.innerHTML = `
        <tr>
            <td colspan="4" class="text-center text-red-500 p-3">Data tidak ditemukan</td>
        </tr>`;
        return;
    }

    jamPerTanggals.forEach((item) => {
        let actions = "";
        if (isActive) {
            actions = `
                <button onclick="openEditJamPerTanggalModal(${item.id}, '${item.users_profile_id}', '${item.proyek_id}', '${item.tanggal}', '${item.jam}')" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </button>
                <button onclick="archiveJamPerTanggal(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                   Arsipkan
                </button>`;
        } else {
            actions = `
                <button onclick="restoreJamPerTanggal(${item.id})" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                    Restore
                </button>
                <button onclick="forceDeleteJamPerTanggal(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus Permanen
                </button>`;
        }

        tbody.innerHTML += `
            <tr>
                <td class="p-2 border text-center">${item.id}</td>
                <td class="p-2 border text-center">${item.userProfile.nama_lengkap}</td>
                <td class="p-2 border text-center">${item.proyek.nama}</td>
                <td class="p-2 border text-center">${item.tanggal}</td>
                <td class="p-2 border text-center">${item.jam}</td>
                <td class="p-2 border text-center">${actions}</td>
            </tr>`;
    });
}

async function archiveJamPerTanggal(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
        mutation {
            deleteJamPerTanggal( id: ${id} ) {
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
    loadJamPerTanggalData();
}

async function restoreJamPerTanggal(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `
        mutation {
            restoreJamPerTanggal( id: ${id} ) {
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
    loadJamPerTanggalData();
}

async function forceDeleteJamPerTanggal(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
        mutation {
            forceDeleteJamPerTanggal( id: ${id} ) {
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
    loadJamPerTanggalData();
}

async function searchJamPerTanggal() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadJamPerTanggalData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        query = `
            query {
                jamPerTanggal(id: ${keyword}) {
                    id
                    users_profile_id
                    proyek_id
                    tanggal
                    jam
                    userProfile {
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
        console.log(data.errors);
        renderJamPerTanggalTable(
            data.data.jamPerTanggal ? [data.data.jamPerTanggal] : [],
            "dataJamPerTanggal",
            true
        );
    } else {
        query = `
            query {
                getJamPerTanggals(search: "${keyword}") {
                    id
                    users_profile_id
                    proyek_id
                    tanggal
                    jam
                    userProfile {
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
        console.log(data.errors);

        renderJamPerTanggalTable(
            data.data.getJamPerTanggals || [],
            "dataJamPerTanggal",
            true
        );
    }
}

document.addEventListener("DOMContentLoaded", loadJamPerTanggalData);