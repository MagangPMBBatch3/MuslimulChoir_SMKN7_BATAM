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

function openAddModal() {
    document.getElementById("modalAddPesan").classList.remove("hidden");
    loadJenisPesanOptions();
}

function closeAddPesanModal() {
    document.getElementById("modalAddPesan").classList.add("hidden");
}

async function createPesan() {
    const pengirim = document.getElementById("addPesanPengirim").value;
    const penerima = document.getElementById("addPesanPenerima").value;
    const isi = document.getElementById("addPesanIsi").value;
    const parent_id = document.getElementById("addPesanParentID").value;
    let tgl_pesan = document.getElementById("addPesanTglPesan").value;
    const jenis_id = document.getElementById("addPesanJenisPesan").value;

    if (!pengirim || !penerima || !isi || !tgl_pesan || !jenis_id) {
        alert("Semua field harus diisi!");
        return;
    }

    if (tgl_pesan.includes("T")) {
    tgl_pesan = tgl_pesan.replace("T", " ") + ":00";
}

    const mutation = `
        mutation {
            createPesan(input: { 
                pengirim : "${pengirim}"
                penerima : "${penerima}"
                isi : "${isi}"
                parent_id : ${parent_id}
                tgl_pesan : "${tgl_pesan}"
                jenis_id : ${jenis_id}
            }) {
                id
                pengirim
                penerima
                isi
                parent_id
                tgl_pesan
                jenis_id
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