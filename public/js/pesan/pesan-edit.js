async function loadJenisPesanOptionsForEdit() {
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
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query }),
    });

    const data = await response.json();
    const select = document.getElementById("editPesanJenisPesan");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allJenisPesan.forEach((jenispesan) => {
        const option = new Option(jenispesan.nama, jenispesan.id);
        select.add(option);
    });
}

async function loadUserOptionsForEdit() {
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
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query }),
    });

    const data = await response.json();
    const pengirimSelect = document.getElementById("editPesanPengirim");
    const penerimaSelect = document.getElementById("editPesanPenerima");

    while (pengirimSelect.options.length > 1) {
        pengirimSelect.remove(1);
    }
    while (penerimaSelect.options.length > 1) {
        penerimaSelect.remove(1);
    }

    data.data.allUser.forEach((user) => {
        const option1 = new Option(user.name, user.id);
        const option2 = new Option(user.name, user.id);
        pengirimSelect.add(option1);
        penerimaSelect.add(option2);
    });
}

async function openEditPesanModal(id, pengirim_id, penerima_id, isi, tgl_pesan, jenis_id) {
    await loadJenisPesanOptionsForEdit();
    await loadUserOptionsForEdit();

    document.getElementById("editId").value = id;
    document.getElementById("editPesanPengirim").value = pengirim_id;
    document.getElementById("editPesanPenerima").value = penerima_id;
    document.getElementById("editPesanIsi").value = isi;
    document.getElementById("editPesanTglPesan").value = tgl_pesan;
    document.getElementById("editPesanJenisPesan").value = jenis_id;

    document.getElementById("modalEditPesan").classList.remove("hidden");
}

function closeEditPesanModal() {
    document.getElementById("modalEditPesan").classList.add("hidden");
}

async function updatePesan() {
    const id = document.getElementById("editId").value;
    const pengirim_id = document.getElementById("editPesanPengirim").value;
    const penerima_id = document.getElementById("editPesanPenerima").value;
    const isi = document.getElementById("editPesanIsi").value;
    let tgl_pesan = document.getElementById("editPesanTglPesan").value;
    const jenis_id = document.getElementById("editPesanJenisPesan").value;

    if (!pengirim_id || !penerima_id || !isi || !tgl_pesan || !jenis_id) {
        alert("Semua field harus diisi!");
        return;
    }

    if (tgl_pesan.includes("T")) {
        tgl_pesan = tgl_pesan.replace("T", " ") + ":00";
    }

    const mutation = `
        mutation {
            updatePesan(
                id: ${id},
                input: {
                    pengirim_id: ${pengirim_id}
                    penerima_id: ${penerima_id}
                    isi: "${isi.replace(/"/g, '\\"')}"
                    tgl_pesan: "${tgl_pesan}"
                    jenis_id: ${jenis_id}
                }
            ) {
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
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: mutation }),
    });
    const result = await response.json();
    console.log(result);

    loadPesanData();
    closeEditPesanModal();
}
