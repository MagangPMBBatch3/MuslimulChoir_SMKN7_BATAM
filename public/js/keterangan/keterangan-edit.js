async function loadBagianOptionsForEdit() {
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
    const select = document.getElementById("editKeteranganBagian");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allBagian.forEach((bagian) => {
        const option = new Option(bagian.nama, bagian.id);
        select.add(option);
    });
}

async function loadProyekOptionsForEdit() {
    const query = `
        query {
            allProyeks {
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
    const select = document.getElementById("editKeteranganProyek");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allProyeks.forEach((proyek) => {
        const option = new Option(proyek.nama, proyek.id);
        select.add(option);
    });
}

async function openEditKeteranganModal(id, bagian_id, proyek_id, tanggal) {
    await loadBagianOptionsForEdit();
    await loadProyekOptionsForEdit();
    document.getElementById("editId").value = id;
    document.getElementById("editKeteranganBagian").value = bagian_id;
    document.getElementById("editKeteranganProyek").value = proyek_id;
    document.getElementById("editKeteranganTanggal").value = tanggal;
    document.getElementById("modalEditKeterangan").classList.remove("hidden");
}

function closeEditKeteranganModal() {
    document.getElementById("modalEditKeterangan").classList.add("hidden");
}

async function updateKeterangan() {
    const id = document.getElementById("editId").value;
    const bagian_id = document.getElementById("editKeteranganBagian").value;
    const proyek_id = document.getElementById("editKeteranganProyek").value;
    const tanggal = document
        .getElementById("editKeteranganTanggal")
        .value.trim();

    if (!tanggal || !bagian_id || !proyek_id) {
        alert("Semua field harus diisi!");
        return;
    }

    const mutation = `
            mutation {
                updateKeterangan(
                    id: ${id},
                    input: { 
                        bagian_id: ${bagian_id}
                        proyek_id: ${proyek_id}
                        tanggal: "${tanggal}"
                    }
                ) {
                    id
                    tanggal
                    bagian {
                        id
                        nama
                    }
                    proyek {
                        id
                        nama
                    }
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
    closeEditKeteranganModal();
}