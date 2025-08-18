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
    const select = document.getElementById("addKeteranganBagian");


    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allBagian.forEach((bagian) => {
        const option = new Option(bagian.nama, bagian.id);
        select.add(option);
    });
}

async function loadProyekOptions() {
    const query = `
        query {
            allProyek {
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
    const select = document.getElementById("addKeteranganProyek");


    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allProyek.forEach((proyek) => {
        const option = new Option(proyek.nama, proyek.id);
        select.add(option);
    });
}


function openAddModal() {
    document.getElementById("modalAddKeterangan").classList.remove("hidden");
    loadBagianOptions();
    loadProyekOptions();
}

function closeAddKeteranganModal() {
    document.getElementById("modalAddKeterangan").classList.add("hidden");
}

async function createKeterangan() {
    const bagian_id = document.getElementById("addKeteranganBagian").value;
    const proyek_id = document.getElementById("addKeteranganProyek").value;
    const tanggal = document.getElementById("addKeteranganTanggal").value.trim();

    if (!bagian_id || !proyek_id || !tanggal) {
        alert("Semua field harus diisi!");
        return;
    }

    const mutation = `
        mutation {
            createKeterangan(input: { 
                bagian_id: "${bagian_id}"
                proyek_id: "${proyek_id}"
                tanggal: "${tanggal}"
            }) {
                id
                tanggal
                bagian {
                    nama
                }
                proyek {
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

    closeAddKeteranganModal();
    loadKeteranganData();
}