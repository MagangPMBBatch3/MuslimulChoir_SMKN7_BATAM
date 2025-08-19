async function loadBagianOptionsForEdit() {
    const query = `
        query {
            allBagian {
                id
                nama
            }
        }
    `;

    try {
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });

        const data = await response.json();

        if (data.errors) {
            throw new Error(data.errors[0].message);
        }

        const select = document.getElementById("editUserProfileBagian");

        while (select.options.length > 1) {
            select.remove(1);
        }

        data.data.allBagian.forEach((bagian) => {
            const option = new Option(bagian.nama, bagian.id);
            select.add(option);
        });
    } catch (error) {
        console.error("Error loading bagian:", error);
        alert("Gagal memuat data bagian");
    }
}

async function loadLevelOptionsForEdit() {
    const query = `
        query {
            allLevel {
                id
                nama
            }
        }
    `;

    try {
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });

        const data = await response.json();

        if (data.errors) {
            throw new Error(data.errors[0].message);
        }
        
        const select = document.getElementById("editUserProfileLevel");

        while (select.options.length > 1) {
            select.remove(1);
        }

        data.data.allLevel.forEach((level) => {
            const option = new Option(level.nama, level.id);
            select.add(option);
        });
    } catch (error) {
        console.error("Error loading level:", error);
        alert("Gagal memuat data level");
    }
}
async function loadUserOptionsForEdit() {
    const query = `
        query {
            allUser {
                id
                email
            }
        }
    `;

    try {
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });

        const data = await response.json();

        if (data.errors) {
            throw new Error(data.errors[0].message);
        }
        
        const select = document.getElementById("editUserProfileUserID");

        while (select.options.length > 1) {
            select.remove(1);
        }

        data.data.allUser.forEach((user) => {
            const option = new Option(user.email, user.id);
            select.add(option);
        });
    } catch (error) {
        console.error("Error loading user:", error);
        alert("Gagal memuat data user");
    }
}

async function loadStatusOptionsForEdit() {
    const query = `
        query {
            allStatus {
                id
                nama
            }
        }
    `;

    try {
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });

        const data = await response.json();

        if (data.errors) {
            throw new Error(data.errors[0].message);
        }

        const select = document.getElementById("editUserProfileStatus");

        while (select.options.length > 1) {
            select.remove(1);
        }

        data.data.allStatus.forEach((status) => {
            const option = new Option(status.nama, status.id);
            select.add(option);
        });
    } catch (error) {
        console.error("Error loading status:", error);
        alert("Gagal memuat data status");
    }
}

async function openEditUserProfileModal(
    id,
    user_id,
    nama_lengkap,
    nrp,
    alamat,
    foto,
    bagian_id,
    level_id,
    status_id
) {
    try {
        await Promise.all([
            loadBagianOptionsForEdit(),
            loadUserOptionsForEdit(),
            loadLevelOptionsForEdit(),
            loadStatusOptionsForEdit(),
        ]);

        document.getElementById("editId").value = id;
        document.getElementById("editUserProfileNama").value = nama_lengkap;
        document.getElementById("editUserProfileUserID").value = user_id;
        document.getElementById("editUserProfileNrp").value = nrp;
        document.getElementById("editUserProfileAlamat").value = alamat;
        document.getElementById("editUserProfileFoto").value = foto;
        document.getElementById("editUserProfileBagian").value = bagian_id;
        document.getElementById("editUserProfileLevel").value = level_id;
        document.getElementById("editUserProfileStatus").value = status_id;

        document
            .getElementById("modalEditUserProfile")
            .classList.remove("hidden");
    } catch (error) {
        console.error("Error preparing edit modal:", error);
        alert("Gagal mempersiapkan form edit");
    }
}

function closeEditAktivitasModal() {
    document.getElementById("modalEditUserProfile").classList.add("hidden");
}

async function updateUserProfile() {
    try {
        const id = document.getElementById("editId").value;
        const user_id = document.getElementById("editUserProfileUserID").value;
        const nama_lengkap = document.getElementById("editUserProfileNama").value.trim();
        const nrp = document.getElementById("editUserProfileNrp").value.trim();
        const alamat = document.getElementById("editUserProfileAlamat").value.trim();
        const foto = document.getElementById("editUserProfileFoto").value.trim();
        const bagian_id = document.getElementById("editUserProfileBagian").value;
        const level_id = document.getElementById("editUserProfileLevel").value;
        const status_id = document.getElementById("editUserProfileStatus").value;

        if (!nama_lengkap) {
            alert("Nama Lengkap harus diisi!");
            return;
        }

        const mutation = `
            mutation {
                updateUserProfile(
                    id: ${id},
                    input: {
                        user_id: "${user_id}"
                        nama_lengkap: "${nama_lengkap}"
                        nrp: "${nrp}"
                        alamat: "${alamat}"
                        foto: "${foto}"
                        bagian_id: "${bagian_id}"
                        level_id: "${level_id}"
                        status_id: "${status_id}"
                    }
                ) {
                    id
                    nama_lengkap
                    nrp
                    alamat
                    foto
                    bagian{
                        nama
                    }
                    level{
                        nama
                    }
                    status{
                        nama
                    }
                    user {
                        email
                    }
                }
            }
        `;

        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query: mutation }),
        });

        const result = await response.json();

        if (result.errors) {
            throw new Error(result.errors[0].message);
        }

        closeEditAktivitasModal();
        loadUserProfileData();
        alert("Data berhasil diupdate!");
    } catch (error) {
        alert("Error: " + error.message);
    }
}