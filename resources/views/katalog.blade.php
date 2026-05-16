<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>NatyCare</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: Arial;
    background: #ffeef5;
}

/* CONTAINER */
.container {
    max-width: 1300px;
    margin: auto;
    background: white;
}

/* NAVBAR */
.navbar {
    display: flex;
    justify-content: space-between;
    padding: 25px 50px;
    align-items: center;
}

.logo {
    color: #f06292;
    font-size: 24px;
    font-weight: bold;
}

.nav-menu a {
    margin-left: 30px;
    text-decoration: none;
    color: #555;
    font-size: 16px;
}

/* HERO */
.hero {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 80px 60px;

    /* 🔥 FIX DI SINI */
    background: url('/storage/images/bgkatalog.jpg') no-repeat center;

    background-size: cover;
    position: relative;
    color: white;
}

.hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 182, 193, 0.4);
}

.hero-text {
    width: 50%;
    position: relative;
    z-index: 2;
}

.hero h1 {
    color: white;
    font-size: 32px;
    margin-bottom: 15px;
}

.hero p {
    font-size: 18px;
}

.hero h1, .hero p {
    text-shadow: 2px 2px 5px rgba(0,0,0,0.4);
}

/* TITLE */
.title {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    margin: 30px 0;
}

.line {
    width: 150px;
    height: 3px;
    background: #f06292;
}

/* PRODUK */
.grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    padding: 0 50px 40px;
}

.card {
    background: #fafafa;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
}

.card img {
    width: 100px;
    height: 100px;
    object-fit: cover; /* 🔥 biar rapi */
    margin-bottom: 10px;
}

.btn {
    background: #f06292;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    border-radius: 8px;
    margin-top: 10px;
}

/* FOOTER */
.footer {
    display: flex;
    justify-content: space-between;
    padding: 25px 50px;
    border-top: 1px solid #eee;
}

.col {
    font-size: 15px;
}
</style>

</head>
<body>

<div class="container">

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">🌸 NatyCare</div>

    <div class="nav-menu">
        <a href="/">Beranda</a>
        <a href="/keranjang">Keranjang </a>
        <a href="#kontak">Kontak </a>
    </div>
</div>

<!-- HERO -->
<div class="hero">
    <div class="hero-text">
        <h1>Selamat Datang di NatyCare Skincare</h1>
        <p>Kulit Sehat - Cantik Alami</p>
    </div>
</div>

<!-- TITLE -->
<div class="title">
    <div class="line"></div>
    <b style="color:#f06292; font-size:20px;">Produk Unggulan</b>
    <div class="line"></div>
</div>

<!-- PRODUK DINAMIS -->
<div class="grid" id="produk-container"></div>

<!-- FOOTER -->
<div class="footer" id="kontak">

<div class="col">
<b>Kontak Kami</b><br>
📱 085655970682
</div>

<div class="col">
📍 Jl. Tulip No. 26<br>
🗺️ Lokasi tersedia
</div>

<div class="col">
📧 Email<br>
natycare17106@gmail.com
</div>

</div>

</div>

@verbatim
<script>
fetch('http://127.0.0.1:8000/api/produk')
.then(response => response.json())
.then(data => {

    console.log(data);

    let container = document.getElementById('produk-container');
    container.innerHTML = '';

    data.forEach(item => {

        container.innerHTML += `
        <div class="card">
            <img src="${item.gambar}">
            <p>${item.nama_produk}</p>
            <p>${item.deskripsi}</p>
            <p>Rp ${item.harga}</p>
            <button class="btn" onclick="tambahKeranjang(${item.id})">
                + Keranjang
            </button>
        </div>
        `;
    });

})
.catch(error => console.log(error));

function tambahKeranjang(id){

    fetch('http://127.0.0.1:8000/api/keranjang', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json'
        },

        body: JSON.stringify({
            produk_id: id,
            jumlah: 1
        })

    })

    .then(response => response.json())

    .then(data => {

        alert('Produk berhasil masuk keranjang 💖');

    })

    .catch(error => console.log(error));

}

</script>
@endverbatim

</body>
</html>