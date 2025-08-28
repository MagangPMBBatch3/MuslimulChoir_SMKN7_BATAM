// public/js/userProfile.js

// Ambil data UserProfile aktif & arsip
async function loadUserProfileData() {
    const queryAktif = `query {
        allUserProfile {
            id
            user_id
            nama_lengkap
            nrp
            alamat
            foto
            bagian_id
            level_id
            status_id
            user { 
                  email }
            bagian {
                   nama }
            level { 
                   nama }
            status {
                    nama }
        }
    }`;

    const resAktif = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: queryAktif }),
    });
    const dataAktif = await resAktif.json();

    renderUserProfileTable(
        dataAktif?.data?.allUserProfile || [],
        "dataUserProfile",
        true
    );

    const queryArsip = `query {
        allUserProfileArsip {
            id
            user_id
            nama_lengkap
            nrp
            alamat
            foto
            bagian_id
            level_id
            status_id
            user { email }
            bagian { nama }
            level { nama }
            status { nama }
        }
    }`;

    const resArsip = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: queryArsip }),
    });
    const dataArsip = await resArsip.json();

    renderUserProfileTable(
        dataArsip?.data?.allUserProfileArsip || [],
        "dataUserProfileArsip",
        false
    );
}

// Render tabel UserProfile
function renderUserProfileTable(UserProfiles, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = "";

    if (!UserProfiles.length) {
        tbody.innerHTML = `
        <tr>
            <td colspan="10" class="text-center text-red-500 p-3">Data tidak ditemukan</td>
        </tr>`;
        return;
    }

    UserProfiles.forEach((item) => {
        let actions = "";
        if (isActive) {
            actions = `
                <button onclick="openEditUserProfileModal(${item.id}, ${item.user_id}, '${item.nama_lengkap}', '${item.nrp}', '${item.alamat}', '${item.foto}', ${item.bagian_id}, ${item.level_id}, ${item.status_id})" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </button>
                <button onclick="archiveUserProfile(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Arsipkan
                </button>`;
        } else {
            actions = `
                <button onclick="restoreUserProfile(${item.id})" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                    Restore
                </button>
                <button onclick="forceDeleteUserProfile(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus Permanen
                </button>`;
        }

        tbody.innerHTML += `
            <tr>
                <td class="p-2 border text-center">${item.id}</td>
                <td class="p-2 border text-center">${item.user.email}</td>
                <td class="p-2 border text-center">${item.nama_lengkap}</td>
                <td class="p-2 border text-center">${item.nrp}</td>
                <td class="p-2 border text-center">${item.alamat}</td>
                <td class="p-2 border text-center">${item.foto}</td>
                <td class="p-2 border text-center">${item.bagian.nama}</td>
                <td class="p-2 border text-center">${item.level.nama}</td>
                <td class="p-2 border text-center">${item.status.nama}</td>
                <td class="p-2 border text-center">${actions}</td>
            </tr>`;
    });
}

// Arsipkan UserProfile
async function archiveUserProfile(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `mutation {
        deleteUserProfile(id: ${id}) { id }
    }`;

    await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: mutation }),
    });

    loadUserProfileData();
}

// Restore UserProfile dari arsip
async function restoreUserProfile(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `mutation {
        restoreUserProfile(id: ${id}) { id }
    }`;

    await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: mutation }),
    });

    loadUserProfileData();
}

// Hapus permanen
async function forceDeleteUserProfile(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `mutation {
        forceDeleteUserProfile(id: ${id}) { id }
    }`;

    await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: mutation }),
    });

    loadUserProfileData();
}

// Pencarian
async function searchUserProfile() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadUserProfileData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        query = `query {
            UserProfile(id: ${keyword}) {
                id
                user_id
                nama_lengkap
                nrp
                alamat
                foto
                bagian_id
                level_id
                status_id
                user { email }
                bagian { nama }
                level { nama }
                status { nama }
            }
        }`;
        const res = await fetch("/graphql", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ query }),
        });
        const data = await res.json();
        renderUserProfileTable(
            data.data.UserProfile ? [data.data.UserProfile] : [],
            "dataUserProfile",
            true
        );
    } else {
        query = `query {
            getUserProfiles(search: "${keyword}") {
                id
                user_id
                nama_lengkap
                nrp
                alamat
                foto
                bagian_id
                level_id
                status_id
                user { email }
                bagian { nama }
                level { nama }
                status { nama }
            }
        }`;
        const res = await fetch("/graphql", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ query }),
        });
        const data = await res.json();
        renderUserProfileTable(
            data.data.getUserProfiles || [],
            "dataUserProfile",
            true
        );
    }
}

// Jalankan saat halaman load
document.addEventListener("DOMContentLoaded", loadUserProfileData);