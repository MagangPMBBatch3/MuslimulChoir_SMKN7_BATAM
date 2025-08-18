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
    const select = document.getElementById("editAktivitasBagian");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allBagian.forEach((bagian) => {
        const option = new Option(bagian.nama, bagian.id);
        select.add(option);
    });
}

async function openEditAktivitasModal(id, bagian_id, no_wbs, nama) {
    await loadBagianOptionsForEdit();
    document.getElementById("editId").value = id;
    document.getElementById("editAktivitasBagian").value = bagian_id;
    document.getElementById("editAktivitasNoWbs").value = no_wbs;
    document.getElementById("editAktivitasNama").value = nama;
    document.getElementById("modalEditAktivitas").classList.remove("hidden");
}

function closeEditAktivitasModal() {
    document.getElementById("modalEditAktivitas").classList.add("hidden");
}

async function updateAktivitas() {
    const id = document.getElementById("editId").value;
    const bagian_id = document.getElementById("editAktivitasBagian").value;
    const no_wbs = document.getElementById("editAktivitasNoWbs").value.trim();
    const nama = document.getElementById("editAktivitasNama").value.trim();

    if (!nama || !bagian_id || !no_wbs) {
        alert("Semua field harus diisi!");
        return;
    }

    const mutation = `
            mutation {
                updateAktivitas(
                    id: ${id},
                    input: { 
                        bagian_id: ${parseInt(bagian_id)}
                        no_wbs: "${no_wbs}"
                        nama: "${nama}"
                    }
                ) {
                    id
                    nama
                    bagian {
                        id
                        nama
                    }
                    no_wbs
                }
            }`;

    await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });

    loadAktivitasData();
    closeEditAktivitasModal();
}