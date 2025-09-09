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
            user { email role }
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
            user { email role }
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
        // Reset class kalau kosong
        container.className = "p-4";
        container.innerHTML = `
            <p class="text-center text-red-500 p-3 animate-fadeIn">
                Data tidak ditemukan
            </p>`;
        return;
    }

    // Tambahkan grid layout kalau ada data
    container.className = "grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4";

    UserProfiles.forEach(item => {
        const card = document.createElement("div");
        card.className = "user-card animate-fadeIn";

        // Path foto dari storage
        const fotoUrl = item.foto ? `/storage/img/${item.foto}` : "https://via.placeholder.com/100";

        // Tombol aksi
        let actions = "";
        if (currentUserRole === "admin") {   //  cek role login sekarang
            if (containerId === "tableAktif") {
                actions = `
                    <button class="btn-arsip" onclick="archiveUserProfile(${item.id})">Arsipkan</button>
                `;
            } else {
                actions = `
                    <button class="btn-restore" onclick="restoreUserProfile(${item.id})">Pulihkan</button>
                    <button class="btn-delete" onclick="forceDeleteUserProfile(${item.id})">Hapus</button>
                `;
            }
        }

        card.innerHTML = `
            <img src="${fotoUrl}" alt="Foto User">
            <h2>${item.nama_lengkap}</h2>
            <hr class="border-gray-600 w-full mb-3">
            <div class="info text-left text-sm text-gray-300">
                <p><span>Email:</span> ${item.user.email}</p>
                <p><span>NRP:</span> ${item.nrp}</p>
                <p><span>Alamat:</span> ${item.alamat}</p>
                <p><span>Bagian:</span> ${item.bagian.nama}</p>
                <p><span>Level:</span> ${item.level.nama}</p>
                <p><span>Status:</span> ${item.status.nama}</p>
                <p><span>Role:</span> ${item.user.role}</p>
            </div>
            <div class="user-actions">
                ${actions}
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
        query = `query { UserProfile(id: ${keyword}) { id user_id nama_lengkap nrp alamat foto bagian { nama } level { nama } status { nama } user { email role } } }`;
        const res = await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query }) });
        const data = await res.json();
        renderUserProfileCards(data.data.UserProfile ? [data.data.UserProfile] : [], "tableAktif");
    } else {
        query = `query { getUserProfiles(search: "${keyword}") { id user_id nama_lengkap nrp alamat foto bagian { nama } level { nama } status { nama } user { email role } } }`;
        const res = await fetch("/graphql", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ query }) });
        const data = await res.json();
        renderUserProfileCards(data.data.getUserProfiles || [], "tableAktif");
    }
}

// Jalankan saat halaman load
document.addEventListener("DOMContentLoaded", loadUserProfileData);


/* ================= CSS STYLE ================= */
const style = document.createElement("style");
style.innerHTML = `
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(15px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn { animation: fadeIn 0.6s ease-in-out; }

/* Card style */
.user-card {
  background: linear-gradient(145deg, #1e293b, #0f172a);
  border-radius: 1rem;
  padding: 1.5rem;
  text-align: center;
  color: #e2e8f0;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 6px 15px rgba(0,0,0,0.4);
  position: relative;
  overflow: hidden;
}
.user-card:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 10px 25px rgba(0,0,0,0.6);
}

/* Foto user */
.user-card img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border-radius: 50%;
  border: 4px solid #4b5563;
  width: 130px;
  height: 130px;
  object-fit: cover;
  margin-bottom: 1rem;
  transition: all 0.3s ease;
}

/* Nama User */
.user-card h2 {
  font-size: 1.3rem;
  font-weight: 700;
  background: linear-gradient(to right, #38bdf8, #22c55e);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-bottom: 0.75rem;
}

/* Detail info */
.user-card .info p {
  font-size: 0.9rem;
  margin: 0.25rem 0;
}
.user-card .info span {
  font-weight: 600;
  color: #f1f5f9;
}

/* Aksi tombol */
.user-actions {
  margin-top: 1rem;
  display: flex;
  justify-content: center;
  gap: 0.5rem;
}
.user-actions button {
  padding: 0.4rem 0.8rem;
  font-size: 0.85rem;
  font-weight: 600;
  border-radius: 0.5rem;
  border: none;
  cursor: pointer;
  transition: 0.3s ease;
}
.btn-arsip { background: #f59e0b; color: #fff; }
.btn-arsip:hover { background: #d97706; }
.btn-restore { background: #22c55e; color: #fff; }
.btn-restore:hover { background: #16a34a; }
.btn-delete { background: #ef4444; color: #fff; }
.btn-delete:hover { background: #b91c1c; }
`;
document.head.appendChild(style);
