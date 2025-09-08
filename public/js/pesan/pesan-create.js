async function loadJenisPesanOptions() {
    const query = `
        query {
            allJenisPesan {
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
    const select = document.getElementById("addPesanJenisPesan");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allJenisPesan.forEach((jenispesan) => {
        const option = new Option(jenispesan.nama, jenispesan.id);
        select.add(option);
    });
}

async function loadUserOptions() {
    const query = `
        query {
            allUser {
                id
                name
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
    const pengirim = document.getElementById("addPengirim");
    const penerima = document.getElementById("addPenerima");

    while (pengirim.options.length > 1) {
        pengirim.remove(1);
    }
    while (penerima.options.length > 1) {
        penerima.remove(1);
    }

    data.data.allUser.forEach((u) => {
        const option1 = new Option(u.name, u.id);
        const option2 = new Option(u.name, u.id);
        pengirim.add(option1);
        penerima.add(option2);
    });
}

function openAddModal() {
    document.getElementById("modalAddPesan").classList.remove("hidden");
    loadJenisPesanOptions();
    loadUserOptions();
}

function closeAddPesanModal() {
    document.getElementById("modalAddPesan").classList.add("hidden");
}

async function createPesan() {
    const pengirim_id = document.getElementById("addPengirim").value;
    const penerima_id = document.getElementById("addPenerima").value;
    const isi = document.getElementById("addPesanIsi").value.trim();
    let tgl_pesan = document.getElementById("addPesanTglPesan").value;
    const jenis_id = document.getElementById("addPesanJenisPesan").value;

    if (!pengirim_id || !penerima_id || !isi || !tgl_pesan || !jenis_id) {
        alert("Semua field harus diisi!");
        return;
    }

    if (tgl_pesan.includes("T")) {
        tgl_pesan = tgl_pesan.replace("T", " ") + ":00";
    }

    const mutation = `
        mutation {
            createPesan(input: { 
                pengirim_id : ${pengirim_id}
                penerima_id : ${penerima_id}
                isi : "${isi.replace(/"/g, '\\"')}"
                tgl_pesan : "${tgl_pesan}"
                jenis_id : ${jenis_id}
            }) {
                id
                pengirim_id
                penerima_id
                isi
                tgl_pesan
                jenis_id
                user {
                    name
                }
                penerima {
                    name
                }
                jenis_pesan {
                    nama
                }
            }
        }`;

    console.log(mutation);

    const response = await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });

    const result = await response.json();
    console.log(result);

    closeAddPesanModal();
    loadPesanData();
}
