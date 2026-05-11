<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NatyCare - Checkout</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial;
    background:#ffeef5;
}

/* CONTAINER */
.container{
    max-width:1300px;
    margin:auto;
    background:white;
}

/* NAVBAR */
.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:25px 50px;
}

.logo{
    color:#f06292;
    font-size:26px;
    font-weight:bold;
}

.nav-menu a{
    margin-left:30px;
    text-decoration:none;
    color:#555;
    font-size:15px;
}

/* HEADER */
.header{
    background:linear-gradient(to right,#ffd6e5,#fff);
    padding:20px 50px;
}

.header h2{
    color:#f06292;
    margin-bottom:5px;
}

.note{
    color:#777;
    font-size:14px;
}

/* MAIN */
.main{
    display:flex;
    gap:20px;
    padding:30px 50px;
}

/* LEFT */
.left{
    flex:2;
}

/* CARD */
.card{
    background:#fff7fa;
    border-radius:20px;
    padding:25px;
    margin-bottom:25px;
}

.card h3{
    color:#f06292;
    margin-bottom:10px;
}

/* INPUT */
input,
textarea,
select{
    width:100%;
    padding:14px;
    margin-top:12px;
    border:1px solid #eee;
    border-radius:10px;
    font-size:14px;
}

textarea{
    height:120px;
    resize:none;
}

.row{
    display:flex;
    gap:15px;
}

/* SHIPPING */
.shipping-option{
    display:block;
    background:white;
    border:2px solid #f8bbd0;
    border-radius:15px;
    padding:18px;
    margin-top:15px;
    cursor:pointer;
    transition:0.3s;
}

.shipping-option:hover{
    border-color:#f06292;
    background:#fff5f8;
    box-shadow:0 5px 15px rgba(240,98,146,0.12);
}

.shipping-option input{
    accent-color:#f06292;
    transform:scale(1.2);
    margin-right:12px;
}

.shipping-content{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:10px;
}

.shipping-content h4{
    color:#f06292;
    margin-bottom:5px;
}

.shipping-content p{
    color:#777;
    font-size:14px;
}

/* PAYMENT */
.payment-option{
    display:block;
    width:100%;
    border:2px solid #f8bbd0;
    border-radius:16px;
    padding:18px 20px;
    margin-top:18px;
    cursor:pointer;
    background:white;
    transition:0.3s;
}

.payment-option:hover{
    border-color:#f06292;
    background:#fff5f8;
    box-shadow:0 5px 15px rgba(240,98,146,0.12);
}

.payment-option input[type="radio"]{
    accent-color:#f06292;
    transform:scale(1.2);
    margin-right:15px;
}

.payment-content{
    display:flex;
    justify-content:space-between;
    align-items:center;
    width:100%;
    gap:20px;
}

.payment-left{
    display:flex;
    align-items:center;
    gap:15px;
    flex:1;
}

.payment-icon{
    width:45px;
    height:45px;
    object-fit:contain;
}

.payment-text h4{
    color:#f06292;
    font-size:17px;
    margin-bottom:5px;
}

.payment-text p{
    color:#777;
    font-size:14px;
    line-height:1.5;
}

.payment-logo{
    width:80px;
}

.payment-logo-cod{
    width:55px;
}

/* RIGHT */
.right{
    flex:1;
}

.summary{
    background:#fff0f5;
    border-radius:20px;
    padding:25px;
}

.summary h3{
    color:#f06292;
    margin-bottom:20px;
}

.summary-item{
    display:flex;
    gap:15px;
    margin-bottom:20px;
    align-items:center;
}

.summary-item img{
    width:75px;
    border-radius:12px;
}

.total{
    color:#f06292;
    font-size:30px;
    font-weight:bold;
    margin-top:20px;
}

/* BUTTON */
.pay-btn{
    display:block;
    width:100%;
    background:#f06292;
    color:white;
    text-align:center;
    padding:15px;
    border-radius:12px;
    text-decoration:none;
    margin-top:20px;
    font-size:16px;
    transition:0.3s;
}

.pay-btn:hover{
    background:#ec407a;
}

/* RESPONSIVE */
@media(max-width:768px){

    .navbar{
        flex-direction:column;
        gap:15px;
        text-align:center;
    }

    .main{
        flex-direction:column;
        padding:20px;
    }

    .row{
        flex-direction:column;
    }

    .payment-content,
    .shipping-content{
        flex-direction:column;
        align-items:flex-start;
    }

}

</style>
</head>

<body>

<div class="container">

<!-- NAVBAR -->
<div class="navbar">

<div class="logo">
🌸 NatyCare
</div>

<div class="nav-menu">
<a href="/">Beranda</a>
<a href="/keranjang">Keranjang 🛒</a>
<a href="#">Kontak 📞</a>
</div>

</div>

<!-- HEADER -->
<div class="header">

<h2>💖 Checkout Pesanan</h2>

<p class="note">
Lengkapi alamat dan pilih metode pengiriman & pembayaran
</p>

</div>

<!-- MAIN -->
<div class="main">

<!-- LEFT -->
<div class="left">

<!-- ALAMAT -->
<div class="card">

<h3>📍 Informasi Pengiriman</h3>

<p class="note">
Silakan lengkapi alamat pengiriman Anda
</p>

<input type="text" placeholder="Nama Lengkap">

<input type="text" placeholder="No. WhatsApp">

<textarea placeholder="Masukkan alamat lengkap"></textarea>

<div class="row">

<select id="provinsi">
<option>Pilih Provinsi</option>
</select>

<select id="kota">
<option>Pilih Kota / Kabupaten</option>
</select>

</div>

<div class="row">

<select id="kecamatan">
<option>Pilih Kecamatan</option>
</select>

<input type="text" placeholder="Masukkan kode pos">

</div>

<textarea placeholder="Catatan untuk pesanan Anda (opsional)"></textarea>

</div>

<!-- PENGIRIMAN -->
<div class="card">

<h3>🚚 Metode Pengiriman</h3>

<p class="note">
Pilih jasa pengiriman yang ingin digunakan
</p>

<label class="shipping-option">

<input type="radio" name="shipping">

<div class="shipping-content">

<div>
<h4>J&T Express</h4>
<p>Estimasi 2 - 4 Hari</p>
</div>

<b>Rp 15.000</b>

</div>

</label>

<label class="shipping-option">

<input type="radio" name="shipping">

<div class="shipping-content">

<div>
<h4>JNE Reguler</h4>
<p>Estimasi 2 - 5 Hari</p>
</div>

<b>Rp 18.000</b>

</div>

</label>

<label class="shipping-option">

<input type="radio" name="shipping">

<div class="shipping-content">

<div>
<h4>SiCepat Express</h4>
<p>Estimasi 1 - 3 Hari</p>
</div>

<b>Rp 20.000</b>

</div>

</label>

</div>

<!-- PEMBAYARAN -->
<div class="card">

<h3>💳 Metode Pembayaran</h3>

<p class="note">
Pilih metode pembayaran yang diinginkan
</p>

<label class="payment-option">

<div style="display:flex; align-items:center; width:100%;">

<input type="radio" name="payment">

<div class="payment-content">

<div class="payment-left">

<img 
class="payment-icon"
src="https://cdn-icons-png.flaticon.com/512/633/633611.png">

<div class="payment-text">

<h4>QRIS</h4>

<p>
Bayar mudah dan cepat menggunakan QRIS dari semua e-wallet dan mobile banking.
</p>

</div>

</div>

<img 
class="payment-logo"
src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/512px-QRIS_logo.svg.png">

</div>

</div>

</label>

<label class="payment-option">

<div style="display:flex; align-items:center; width:100%;">

<input type="radio" name="payment">

<div class="payment-content">

<div class="payment-left">

<img 
class="payment-icon"
src="https://cdn-icons-png.flaticon.com/512/3081/3081559.png">

<div class="payment-text">

<h4>COD (Bayar di Tempat)</h4>

<p>
Bayar langsung kepada kurir saat pesanan diterima di rumah dengan aman dan praktis.
</p>

</div>

</div>

<img 
class="payment-logo-cod"
src="https://cdn-icons-png.flaticon.com/512/2331/2331941.png">

</div>

</div>

</label>

</div>

</div>

<!-- RIGHT -->
<div class="right">

<div class="summary">

<h3>🛍 Ringkasan Pesanan</h3>

<div class="summary-item">

<img src="https://via.placeholder.com/75">

<div>
<b>Hydra Glowing Toner</b><br>
100ml<br>
Rp 95.000
</div>

</div>

<div class="summary-item">

<img src="https://via.placeholder.com/75">

<div>
<b>Anti-Aging Serum</b><br>
30ml<br>
Rp 150.000
</div>

</div>

<div class="summary-item">

<img src="https://via.placeholder.com/75">

<div>
<b>Moisturizer Glow</b><br>
50g<br>
Rp 60.000
</div>

</div>

<hr style="margin:20px 0;">

<p>Subtotal : Rp 365.000</p>
<p>Diskon : - Rp 15.000</p>
<p>Ongkir : Rp 15.000</p>

<p class="total">
Rp 365.000
</p>

<a href="#" class="pay-btn">
Lanjutkan ke Konfirmasi →
</a>

</div>

</div>

</div>

</div>

<script>

const provinsi = document.getElementById("provinsi");
const kota = document.getElementById("kota");
const kecamatan = document.getElementById("kecamatan");

fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
.then(res => res.json())
.then(data => {

    data.forEach(prov => {

        provinsi.innerHTML += `
            <option value="${prov.id}">
                ${prov.name}
            </option>
        `;

    });

});

provinsi.addEventListener("change", function(){

    kota.innerHTML =
    `<option>Pilih Kota / Kabupaten</option>`;

    kecamatan.innerHTML =
    `<option>Pilih Kecamatan</option>`;

    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${this.value}.json`)
    .then(res => res.json())
    .then(data => {

        data.forEach(kab => {

            kota.innerHTML += `
                <option value="${kab.id}">
                    ${kab.name}
                </option>
            `;

        });

    });

});

kota.addEventListener("change", function(){

    kecamatan.innerHTML =
    `<option>Pilih Kecamatan</option>`;

    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${this.value}.json`)
    .then(res => res.json())
    .then(data => {

        data.forEach(kec => {

            kecamatan.innerHTML += `
                <option>
                    ${kec.name}
                </option>
            `;

        });

    });

});

</script>

</body>
</html>