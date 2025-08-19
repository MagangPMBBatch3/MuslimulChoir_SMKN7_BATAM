async function loadBagianOptions() {
    const query = `
        query {
            allBagian {
                id
                nama
            }
        }
    `;

        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });

        const data = await response.json();
        const select = document.getElementById("addUserProfileBagian");

        while (select.options.length > 1) {
            select.remove(1);
        }

        data.data.allBagian.forEach((bagian) => {
            const option = new Option(bagian.nama, bagian.id);
            select.add(option);
        });
}

async function loadLevelOptions() {
    const query = `
        query {
            allLevel {
                id
                nama
            }
        }
    `;
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });

        const data = await response.json();
        const select = document.getElementById("addUserProfileLevel");

        while (select.options.length > 1) {
            select.remove(1);
        }

        data.data.allLevel.forEach((level) => {
            const option = new Option(level.nama, level.id);
            select.add(option);
        });
}

async function loadStatusOptions() {
    const query = `
        query {
            allStatus {
                id
                nama
            }
        }
    `;
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });

        const data = await response.json();

        const select = document.getElementById("addUserProfileStatus");

        while (select.options.length > 1) {
            select.remove(1);
        }

        data.data.allStatus.forEach((status) => {
            const option = new Option(status.nama, status.id);
            select.add(option);
        });
}

async function loadUserOptions() {
    const query = `
        query {
            allUser {
                id
                email
            }
        }
    `;
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ query }),
        });

        const data = await response.json();

        const select = document.getElementById("addUserProfileUser");

        while (select.options.length > 1) {
            select.remove(1);
        }

        data.data.allUser.forEach((user) => {
            const option = new Option(user.email, user.id);
            select.add(option);
        });
}

function openAddModal() {
    document.getElementById("modalAddUserProfile").classList.remove("hidden");
        loadUserOptions();
        loadBagianOptions();
        loadLevelOptions();
        loadStatusOptions();
}

function closeAddUserProfileModal() {
    document.getElementById("modalAddUserProfile").classList.add("hidden");
}

async function createUserProfile() {

        const user_id = document.getElementById("addUserProfileUser").value;
        const nama_lengkap = document.getElementById("addUserProfileNamaLengkap").value.trim();
        const nrp = document.getElementById("addUserProfileNrp").value.trim();
        const alamat = document.getElementById("addUserProfileAlamat").value.trim();
        const foto = document.getElementById("addUserProfileFoto").value.trim();
        const bagian_id = document.getElementById("addUserProfileBagian").value;
        const level_id = document.getElementById("addUserProfileLevel").value;
        const status_id = document.getElementById("addUserProfileStatus").value;

        if (!user_id || !nama_lengkap || !foto || !bagian_id || !level_id || !status_id) {
            alert("Semua field harus diisi!");
            return;
        }

        const mutation = `
            mutation {
                createUserProfile(
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

        closeAddUserProfileModal();
        loadUserProfileData();
}