<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NatyCare</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
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
    padding:10px 50px;
}

.logo-brand{
    height:144px;
    width:auto;
    object-fit:contain;
}

.nav-menu{
    display:flex;
    align-items:center;
}

.nav-menu a{
    margin-left:30px;
    text-decoration:none;
    color:#555;
    font-size:16px;
}

/* PROFILE */
.profile-icon{
    width:40px;
    height:40px;
    object-fit:contain;
    cursor:pointer;
    transition:0.3s;
}

.profile-icon:hover{
    transform:scale(1.1);
}
/* HERO */
.hero{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:80px 60px;
    background:url('/storage/images/bgkatalog.jpg') no-repeat center;
    background-size:cover;
    position:relative;
    color:white;
}

.hero::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background:rgba(255,182,193,0.4);
}

.hero-text{
    width:50%;
    position:relative;
    z-index:2;
}

.hero h1{
    color:white;
    font-size:42px;
    margin-bottom:15px;
    text-shadow:2px 2px 5px rgba(0,0,0,0.4);
}

.hero p{
    font-size:22px;
    color:white;
    text-shadow:2px 2px 5px rgba(0,0,0,0.4);
}

.hero img{
    width:500px;
    max-width:100%;
    position:relative;
    z-index:2;
    object-fit:contain;
}

/* TITLE */
.title{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:20px;
    margin:35px 0;
}

.line{
    width:150px;
    height:3px;
    background:#f06292;
}

/* PRODUK */
.grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
    padding:0 50px 40px;
}

.card{
    background:#fafafa;
    padding:25px;
    border-radius:16px;
    text-align:center;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.card img{
    width:140px;
    height:140px;
    object-fit:contain;
    margin-bottom:15px;
}
.card p{
    margin-top:5px;
}

.btn{
    width:100%;
    background:#f06292;
    color:white;
    border:none;
    padding:12px;
    border-radius:10px;
    margin-top:15px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#ec407a;
}

/* FOOTER */
.footer{
    display:flex;
    justify-content:space-between;
    padding:25px 50px;
    border-top:1px solid #eee;
}

.col{
    font-size:15px;
    color:#555;
}
.footer{
    display:flex;
    justify-content:space-between;
    padding:25px 50px;
    border-top:1px solid #eee;
}

.col{
    font-size:15px;
    color:#555;
}
</style>
</head>

<body>

<div class="container">

<!-- NAVBAR -->
<div class="navbar">

   <div class="logo">
    <img src="{{ asset('images/LogoNatyCare.png') }}" class="logo-brand">
</div>

    <div class="nav-menu">

        <a href="/">Beranda</a>

        <a href="/keranjang">
            Keranjang 🛒
        </a>

        <a href="#kontak">
            Kontak 📞
        </a>

        <!-- PROFILE -->
        <a href="/profile">
         <img src="{{ asset('images/profil-admin.png') }}"
         class="profile-icon">
</a>

    </div>

</div>

<!-- HERO -->
<div class="hero">

    <div class="hero-text">

        <h1>
            Selamat Datang di NatyCare Skincare
        </h1>

        <p>
            Kulit Sehat • Cantik Alami • Percaya Diri
        </p>

    </div>

   <img src="{{ asset('images/HeroProduk.png') }}">
</div>

<!-- TITLE -->
<div class="title">

    <div class="line"></div>

    <b style="color:#f06292; font-size:22px;">
        Produk Unggulan
    </b>

    <div class="line"></div>

</div>

<!-- PRODUK -->
<div class="grid">

  <div class="card">
    <img src="{{ asset('images/FacialWash.png') }}">
    <p>Brightening Cleanser</p>
    <p>Rp 120.000</p>
    <button class="btn">+ Keranjang</button>
</div>

<div class="card">
    <img src="{{ asset('images/Toner.png') }}">
    <p>Hydra Glowing Toner</p>
    <p>Rp 95.000</p>
    <button class="btn">+ Keranjang</button>
</div>

<div class="card">
    <img src="{{ asset('images/Serum.png') }}">
    <p>Anti-Aging Serum</p>
    <p>Rp 150.000</p>
    <button class="btn">+ Keranjang</button>
</div>

<div class="card">
    <img src="{{ asset('images/Moisturizer.png') }}">
    <p>Moisturizer Glow</p>
    <p>Rp 60.000</p>
    <button class="btn">+ Keranjang</button>
</div>

<div class="card">
    <img src="{{ asset('images/SerumBrightening.png') }}">
    <p>Serum Brightening</p>
    <p>Rp 75.000</p>
    <button class="btn">+ Keranjang</button>
</div>

<div class="card">
    <img src="{{ asset('images/Essence.png') }}">
    <p>Hydrating Essence</p>
    <p>Rp 110.000</p>
    <button class="btn">+ Keranjang</button>
</div>

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
        📍 Jl. Tulip No.26<br>
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

        method:'POST',

        headers:{
            'Content-Type':'application/json'
        },

        body:JSON.stringify({
            produk_id:id,
            jumlah:1
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