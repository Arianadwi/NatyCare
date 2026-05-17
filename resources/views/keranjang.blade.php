<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>NatyCare - Keranjang</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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

/* HEADER */
.header {
    background: linear-gradient(to right,#ffd6e5,#fff);
    padding: 20px 50px;
}

.header h2 {
    color: #f06292;
}

.note {
    font-size: 13px;
    color: #777;
}

/* MAIN */
.main {
    display: flex;
    gap: 20px;
    padding: 30px 50px;
}

/* LEFT */
.left {
    flex: 2;
}

.item {
    display: flex;
    gap: 15px;
    padding: 15px;
    border-bottom: 1px solid #eee;
}

.item img {
    width: 80px;
    border-radius: 10px;
}

.qty {
    margin-top: 10px;
}

.qty button {
    padding: 5px 10px;
    border: none;
    background: #f8bbd0;
    border-radius: 5px;
}

/* RIGHT */
.right {
    flex: 1;
    background: #fff0f5;
    padding: 20px;
    border-radius: 10px;
}

.total {
    color: #f06292;
    font-weight: bold;
    font-size: 18px;
}

/* BUTTON */
.checkout {
    background: #f06292;
    color: white;
    padding: 12px;
    width: 100%;
    border: none;
    border-radius: 8px;
    margin-top: 10px;
    font-size: 15px;

    display: block;
    text-align: center;
    text-decoration: none;
}
</style>

</head>

<body>

<div class="container">

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">🌸 NatyCare</div>

    <div class="nav-menu">
        <a href="/katalog">Beranda</a>
        <a href="/keranjang">Keranjang </a>
        <a href="/katalog/#kontak">Kontak </a>
    </div>
</div>

<!-- HEADER -->
<div class="header">
    <h2>🛒 Keranjang Belanja Kamu</h2>
    <p class="note">Cek kembali produk sebelum checkout ya 💖</p>
</div>

<!-- MAIN -->
<div class="main">

<!-- LEFT -->
<div class="left">

<h3>Produk di Keranjang</h3>

<div id="keranjang-container"></div>

</div>

<!-- RIGHT -->
<div class="right">

<h3>Ringkasan Belanja</h3>

<p>Subtotal: <span id="subtotal">Rp 0</span></p>

<p>Diskon: -</p>

<p class="total">
    Total: <span id="total">Rp 0</span>
</p>

<a href="/checkout" class="checkout">
    Checkout Sekarang
</a>

<p class="note">*Promo berlaku hari ini</p>

</div>

</div>

</div>

<script>
fetch('http://127.0.0.1:8000/api/keranjang')
.then(response => response.json())
.then(data => {

    let container = document.getElementById('keranjang-container');

    container.innerHTML = '';

    let subtotal = 0;

    data.forEach(item => {
        
    subtotal += item.produk.harga * item.jumlah;

        container.innerHTML += `


        <div class="item">

            <img src="/storage/uploads/${item.produk.gambar}">

            <div>
                <b>${item.produk.nama_produk}</b><br>

                Rp ${item.produk.harga}

                <div class="qty">

                <button onclick="ubahJumlah(${item.id}, 'kurang')">-</button>

                ${item.jumlah}

                <button onclick="ubahJumlah(${item.id}, 'tambah')">+</button>

                <button onclick="hapusKeranjang(${item.id})">
                    Hapus
                </button>

                </div>
            </div>

        </div>
        `;
    });

    document.getElementById('subtotal').innerHTML =
    'Rp ' + subtotal;

    document.getElementById('total').innerHTML =
    'Rp ' + subtotal;

})
.catch(error => console.log(error));


function ubahJumlah(id, aksi){

    fetch(`http://127.0.0.1:8000/api/keranjang/${id}`, {

        method: 'PUT',

        headers: {
            'Content-Type': 'application/json'
        },

        body: JSON.stringify({
            aksi: aksi
        })

    })

    .then(response => response.json())

    .then(data => {

        location.reload();

    })

    .catch(error => console.log(error));
}

function hapusKeranjang(id){

    fetch(`http://127.0.0.1:8000/api/keranjang/${id}`, {

        method: 'DELETE'

    })

    .then(response => response.json())

    .then(data => {

        location.reload();

    })

    .catch(error => console.log(error));
}

</script>



</body>
</html>