// jamkerja.js

async function loadJamKerjaData() {
    // Data aktif
    const queryAktif = `query {
        allJamKerja {
            id
            users_profile_id
            no_wbs
            kode_proyek
            proyek_id
            aktivitas_id
            tanggal
            jumlah_jam
            keterangan
            status_id
            mode_id
            userProfile {
                nama_lengkap
            }
            proyek {
                nama
            }
            aktivitas {
                nama
            }
            statusJamKerja {
                nama
            }
            modeJamKerja {
                nama
            }
        }
    }`;

    const resAktif = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: queryAktif }),
    });
    const dataAktif = await resAktif.json();

    renderJamKerjaTable(
        dataAktif?.data?.allJamKerja || [],
        "dataJamKerja",
        true
    );

    // Data arsip
    const queryArsip = `query {
        allJamKerjaArsip {
            id
            users_profile_id
            no_wbs
            kode_proyek
            proyek_id
            aktivitas_id
            tanggal
            jumlah_jam
            keterangan
            status_id
            mode_id
            userProfile {
                nama_lengkap
            }
            proyek {
                nama
            }
            aktivitas {
                nama
            }
            statusJamKerja {
                nama
            }
            modeJamKerja {
                nama
            }
        }
    }`;

    const resArsip = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: queryArsip }),
    });
    const dataArsip = await resArsip.json();

    renderJamKerjaTable(
        dataArsip?.data?.allJamKerjaArsip || [],
        "dataJamKerjaArsip",
        false
    );
}

function renderJamKerjaTable(jamKerjas, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = "";

    if (!jamKerjas.length) {
        tbody.innerHTML = `
        <tr>
            <td colspan="7" class="text-center text-red-500 p-3">Data tidak ditemukan</td>
        </tr>`;
        return;
    }

    jamKerjas.forEach((item) => {
        let actions = "";
        if (isActive) {
            actions = `
               <button 
                    onclick="openEditModal(
                        ${item.id}, 
                        '${item.users_profile_id}', 
                        '${item.no_wbs}', 
                        '${item.kode_proyek}', 
                        '${item.proyek_id}', 
                        '${item.aktivitas_id}', 
                        '${item.tanggal}', 
                        '${item.jumlah_jam}', 
                        '${item.keterangan}', 
                        '${item.status_id}', 
                        '${item.mode_id}'
                    )" 
                    class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </button>


                <button onclick="archiveJamKerja(${item.id})" 
                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                   Arsipkan
                </button>`;
        } else {
            actions = `
                <button onclick="restoreJamKerja(${item.id})" 
                    class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                    Restore
                </button>
                <button onclick="forceDeleteJamKerja(${item.id})" 
                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus Permanen
                </button>`;
        }

        tbody.innerHTML += `
            <tr>
                <td class="p-2 border text-center">${item.id}</td>
                <td class="p-2 border text-center">${item.userProfile.nama_lengkap}</td>
                <td class="p-2 border text-center">${item.no_wbs}</td>
                <td class="p-2 border text-center">${item.kode_proyek}</td>
                <td class="p-2 border text-center">${item.proyek?.nama || '-'}</td>
                <td class="p-2 border text-center">${item.aktivitas?.nama || '-'}</td>
                <td class="p-2 border text-center">${item.tanggal}</td>
                <td class="p-2 border text-center">${item.jumlah_jam}</td>
                <td class="p-2 border text-center">${item.keterangan || '-'}</td>
                <td class="p-2 border text-center">${item.statusJamKerja ? item.statusJamKerja.nama : '-'}</td>
                <td class="p-2 border text-center">${item.modeJamKerja?.nama || '-'}</td>
                <td class="p-2 border text-center">${actions}</td>
            </tr>`;
    });
}

async function archiveJamKerja(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
        mutation {
            deleteJamKerja(id: ${id}) {
                id
            }
        }`;

    await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: mutation }),
    });
    loadJamKerjaData();
}

async function restoreJamKerja(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `
        mutation {
            restoreJamKerja(id: ${id}) {
                id
            }
        }`;

    await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: mutation }),
    });
    loadJamKerjaData();
}

async function forceDeleteJamKerja(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
        mutation {
            forceDeleteJamKerja(id: ${id}) {
                id
            }
        }`;

    await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: mutation }),
    });
    loadJamKerjaData();
}

async function searchJamKerja() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadJamKerjaData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        // Cari berdasarkan ID
        query = `
           query {
    jamKerja(id: ${keyword}) {
        id
        no_wbs
        kode_proyek
        users_profile_id
        proyek_id
        aktivitas_id
        status_id
        mode_id
        tanggal
        jumlah_jam
        keterangan
        
        userProfile {
            nama_lengkap
        }
        proyek {
            nama
        }
        aktivitas {
            nama
        }
        statusJamKerja {
            nama
        }
        modeJamKerja {
            nama
        }
    }
}
`;

        const res = await fetch("/graphql", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ query }),
        });
        const data = await res.json();

        renderJamKerjaTable(
            data.data.jamKerja ? [data.data.jamKerja] : [],
            "dataJamKerja",
            true
        );
    } else {
        // Cari berdasarkan nama / keyword
        query = `
           query {
    getJamKerjas(search: "${keyword}") {
        id
        no_wbs
        kode_proyek
        users_profile_id
        proyek_id
        aktivitas_id
        status_id
        mode_id
        tanggal
        jumlah_jam
        keterangan

        userProfile {
            nama_lengkap
        }
        proyek {
            nama
        }
        aktivitas {
            nama
        }
        statusJamKerja {
            nama
        }
        modeJamKerja {
            nama
        }
    }
}
`;

        const res = await fetch("/graphql", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ query }),
        });
        const data = await res.json();

        renderJamKerjaTable(
            data.data.getJamKerjas || [],
            "dataJamKerja",
            true
        );
    }
}

document.addEventListener("DOMContentLoaded", loadJamKerjaData);
