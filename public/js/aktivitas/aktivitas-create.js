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
    const select = document.getElementById("addAktivitasBagian");


    while (select.options.length > 1) {
        select.remove(1);
    }

    // Add new options
    data.data.allBagian.forEach((bagian) => {
        const option = new Option(bagian.nama, bagian.id);
        select.add(option);
    });
}

function openAddModal() {
    document.getElementById("modalAddAktivitas").classList.remove("hidden");
    loadBagianOptions();
}

function closeAddAktivitasModal() {
    document.getElementById("modalAddAktivitas").classList.add("hidden");
}

async function createAktivitas() {
    const bagian_id = document.getElementById("addAktivitasBagian").value;
    const no_wbs = document.getElementById("addAktivitasNoWbs").value.trim();
    const nama = document.getElementById("addAktivitasNama").value.trim();

    if (!bagian_id || !nama || !no_wbs) {
        alert("Semua field harus diisi!");
        return;
    }

    const mutation = `
        mutation {
            createAktivitas(input: { 
                bagian_id: "${bagian_id}"
                no_wbs: "${no_wbs}"
                nama: "${nama}"
            }) {
                id
                nama
                bagian {
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

    closeAddAktivitasModal();
    loadAktivitasData();
}