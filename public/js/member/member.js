// public/js/member/member.js

// Load data UserProfile dari GraphQL
async function loadUserProfileData() {
    // Query UserProfile Aktif
    const queryAktif = `query {
        allUserProfile {
            id
            user_id
            nama_lengkap
            nrp
            alamat
            foto
            bagian { nama }
            level { nama }
            status { nama }
            user { email
                   role }
        }
    }`;

    const resAktif = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: queryAktif }),
    });
    const dataAktif = await resAktif.json();
    renderUserProfileCards(dataAktif?.data?.allUserProfile || [], "tableAktif");

    // Query UserProfile Arsip
    const queryArsip = `query {
        allUserProfileArsip {
            id
            user_id
            nama_lengkap
            nrp
            alamat
            foto
            bagian { nama }
            level { nama }
            status { nama }
            user { email
                   role }
        }
    }`;

    const resArsip = await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: queryArsip }),
    });
    const dataArsip = await resArsip.json();
    renderUserProfileCards(dataArsip?.data?.allUserProfileArsip || [], "tableArsip");
}

// Render card UserProfile
function renderUserProfileCards(UserProfiles, containerId) {
    const container = document.getElementById(containerId);
    container.innerHTML = "";

    if (!UserProfiles.length) {
        container.innerHTML = `<p class="col-span-full text-center text-red-500 p-3">Data tidak ditemukan</p>`;
        return;
    }

    UserProfiles.forEach(item => {
        const card = document.createElement("div");
        card.className = "bg-slate-700/70 rounded-lg shadow p-4 flex flex-col items-center";

        // Path foto dari storage
        const fotoUrl = item.foto ? `/storage/img/${item.foto}` : 'https://via.placeholder.com/100';

        // Tombol aksi
        let actions = "";
        if (containerId === "tableAktif") {
            actions = `
               
            `;
        } else {
            actions = `
                
            `;
        }

        card.innerHTML = `
            <img src="${fotoUrl}" alt="Foto User" class="w-40 h-40 rounded-full mb-3 object-cover ring-5 ring-gray-500 shadow-lg">
            <h2 class="text-xl font-bold text-white mb-2 text-center">${item.nama_lengkap}</h2>
            <hr class="border-gray-600 w-full mb-3">
            <div class="w-full space-y-1 text-sm">
                <p><span class="font-semibold text-gray-200">Email:</span> <span class="text-gray-400">${item.user.email}</span></p>
                <p><span class="font-semibold text-gray-200">NRP:</span> <span class="text-gray-400">${item.nrp}</span></p>
                <p><span class="font-semibold text-gray-200">Alamat:</span> <span class="text-gray-400">${item.alamat}</span></p>
                <p><span class="font-semibold text-gray-200">Bagian:</span> <span class="text-gray-400">${item.bagian.nama}</span></p>
                <p><span class="font-semibold text-gray-200">Level:</span> <span class="text-gray-400">${item.level.nama}</span></p>
                <p><span class="font-semibold text-gray-200">Status:</span> <span class="text-gray-400">${item.status.nama}</span></p>
                <p><span class="font-semibold text-gray-200">Role:</span> <span class="text-gray-400">${item.user.role}</span></p>
            </div>
        `;

        container.appendChild(card);
    });
}

// Arsipkan UserProfile
async function archiveUserProfile(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `mutation { deleteUserProfile(id: ${id}) { id } }`;
    await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query: mutation }) });
    loadUserProfileData();
}

// Restore UserProfile dari arsip
async function restoreUserProfile(id) {
    if (!confirm("Pulihkan data ini?")) return;
    const mutation = `mutation { restoreUserProfile(id: ${id}) { id } }`;
    await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query: mutation }) });
    loadUserProfileData();
}

// Hapus permanen
async function forceDeleteUserProfile(id) {
    if (!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `mutation { forceDeleteUserProfile(id: ${id}) { id } }`;
    await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query: mutation }) });
    loadUserProfileData();
}

// Search UserProfile
async function searchUserProfile() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadUserProfileData();
        return;
    }

    let query;
    if (!isNaN(keyword)) {
        query = `query { UserProfile(id: ${keyword}) { id user_id nama_lengkap nrp alamat foto bagian { nama } level { nama } status { nama } user { email } } }`;
        const res = await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query }) });
        const data = await res.json();
        renderUserProfileCards(data.data.UserProfile ? [data.data.UserProfile] : [], "tableAktif");
    } else {
        query = `query { getUserProfiles(search: "${keyword}") { id user_id nama_lengkap nrp alamat foto bagian { nama } level { nama } status { nama } user { email } } }`;
        const res = await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query }) });
        const data = await res.json();
        renderUserProfileCards(data.data.getUserProfiles || [], "tableAktif");
    }
}

// Jalankan saat halaman load
document.addEventListener("DOMContentLoaded", loadUserProfileData);
