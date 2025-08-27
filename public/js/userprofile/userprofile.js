// Ambil data UserProfile aktif & arsip
async function loadUserProfileData() {
    // Data Aktif
    const queryAktif = `query { allUserProfile { id user_id nama_lengkap nrp alamat foto bagian_id level_id status_id user { email } bagian { nama } level { nama } status { nama } } }`;
    const resAktif = await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query: queryAktif }) });
    const dataAktif = await resAktif.json();
    renderUserProfileCard(dataAktif?.data?.allUserProfile || [], "tableAktif", true);

    // Data Arsip
    const queryArsip = `query { allUserProfileArsip { id user_id nama_lengkap nrp alamat foto bagian_id level_id status_id user { email } bagian { nama } level { nama } status { nama } } }`;
    const resArsip = await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query: queryArsip }) });
    const dataArsip = await resArsip.json();
    renderUserProfileCard(dataArsip?.data?.allUserProfileArsip || [], "tableArsip", false);
}

// Render data sebagai card
function renderUserProfileCard(UserProfiles, containerId, isActive) {
    const container = document.getElementById(containerId);
    container.innerHTML = "";

    if (!UserProfiles.length) {
        container.innerHTML = `<p class="col-span-full text-center text-red-500 p-3">Data tidak ditemukan</p>`;
        return;
    }

    UserProfiles.forEach(item => {
        const fotoUrl = item.foto ? `/storage/img/${item.foto}` : `https://via.placeholder.com/100`;
        let actions = "";

        if (isActive) {
            actions = `
                <button onclick="openEditUserProfileModal(${item.id}, ${item.user_id}, '${item.nama_lengkap}', '${item.nrp}', '${item.alamat}', '${item.foto}', ${item.bagian_id}, ${item.level_id}, ${item.status_id})" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</button>
                <button onclick="archiveUserProfile(${item.id})" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Arsipkan</button>
            `;
        } else {
            actions = `
                <button onclick="restoreUserProfile(${item.id})" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Restore</button>
                <button onclick="forceDeleteUserProfile(${item.id})" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus Permanen</button>
            `;
        }

        container.innerHTML += `
            <div class="bg-gray-100 p-4 rounded shadow flex flex-col items-center">
                <img src="${fotoUrl}" alt="Foto" class="w-24 h-24 rounded-full mb-2 object-cover">
                <h2 class="font-bold text-lg text-center">${item.nama_lengkap ?? ''}</h2>
                <p class="text-gray-600 text-center">NRP: ${item.nrp ?? ''}</p>
                <p class="text-gray-600 text-center">Alamat: ${item.alamat ?? ''}</p>
                <p class="text-gray-600 text-center">Bagian: ${item.bagian?.nama ?? ''}</p>
                <p class="text-gray-600 text-center">Level: ${item.level?.nama ?? ''}</p>
                <p class="text-gray-600 text-center">Status: ${item.status?.nama ?? ''}</p>
                <div class="mt-2 flex gap-2">
                    ${actions}
                </div>
            </div>
        `;
    });
}

// Arsipkan
async function archiveUserProfile(id) {
    if (!confirm("Pindahkan ke arsip?")) return;
    const mutation = `mutation { deleteUserProfile(id: ${id}) { id } }`;
    await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query: mutation }) });
    loadUserProfileData();
}

// Restore
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

// Pencarian
async function searchUserProfile() {
    const keyword = document.getElementById("search").value.trim();
    if (!keyword) {
        loadUserProfileData();
        return;
    }

    let query = "";
    if (!isNaN(keyword)) {
        query = `query { UserProfile(id: ${keyword}) { id user_id nama_lengkap nrp alamat foto bagian_id level_id status_id user { email } bagian { nama } level { nama } status { nama } } }`;
        const res = await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query }) });
        const data = await res.json();
        renderUserProfileCard(data.data.UserProfile ? [data.data.UserProfile] : [], "tableAktif", true);
    } else {
        query = `query { getUserProfiles(search: "${keyword}") { id user_id nama_lengkap nrp alamat foto bagian_id level_id status_id user { email } bagian { nama } level { nama } status { nama } } }`;
        const res = await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query }) });
        const data = await res.json();
        renderUserProfileCard(data.data.getUserProfiles || [], "tableAktif", true);
    }
}

// Load awal
document.addEventListener("DOMContentLoaded", loadUserProfileData);
