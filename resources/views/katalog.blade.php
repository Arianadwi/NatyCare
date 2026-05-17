<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>NatyCare</title>

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
    font-size:28px;
    font-weight:bold;
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
.profile-link{
    margin-left:30px;
    font-size:28px;
    text-decoration:none;
    color:#f06292 !important;
    transition:0.3s;
}

.profile-link:hover{
    transform:scale(1.1);
}

/* HERO */
.hero{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:60px;
    background:linear-gradient(to right,#ffd6e5,#fff);
}

.hero-text{
    width:50%;
}

.hero h1{
    color:#f06292;
    font-size:42px;
    margin-bottom:15px;
}

.hero p{
    font-size:22px;
    color:#555;
}

.hero img{
    width:320px;
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
    width:100px;
    margin-bottom:10px;
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

        <a href="/keranjang">
            Keranjang 🛒
        </a>

        <a href="#">
            Kontak 📞
        </a>

        <!-- PROFILE -->
        <a href="/profile" class="profile-link">
            👤
        </a>

    </div>

</div>

<!-- HERO -->
<div class="hero">

    <div class="hero-text">
        <h1>Selamat Datang di NatyCare Skincare</h1>

        <p>
            Kulit Sehat • Cantik Alami • Percaya Diri
        </p>
    </div>

    <img src="https://via.placeholder.com/320">

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

    <!-- PRODUK 1 -->
    <div class="card">

        <img src="https://via.placeholder.com/100">

        <p>
            Brightening Cleanser
        </p>

        <p>
            Rp 120.000
        </p>

        <button class="btn">
            + Keranjang
        </button>

    </div>

    <!-- PRODUK 2 -->
    <div class="card">

        <img src="https://via.placeholder.com/100">

        <p>
            Hydra Glowing Toner
        </p>

        <p>
            Rp 95.000
        </p>

        <button class="btn">
            + Keranjang
        </button>

    </div>

    <!-- PRODUK 3 -->
    <div class="card">

        <img src="https://via.placeholder.com/100">

        <p>
            Anti-Aging Serum
        </p>

        <p>
            Rp 150.000
        </p>

        <button class="btn">
            + Keranjang
        </button>

    </div>

    <!-- PRODUK 4 -->
    <div class="card">

        <img src="https://via.placeholder.com/100">

        <p>
            Moisturizer Glow
        </p>

        <p>
            Rp 60.000
        </p>

        <button class="btn">
            + Keranjang
        </button>

    </div>

    <!-- PRODUK 5 -->
    <div class="card">

        <img src="https://via.placeholder.com/100">

        <p>
            Serum Brightening
        </p>

        <p>
            Rp 75.000
        </p>

        <button class="btn">
            + Keranjang
        </button>

    </div>

    <!-- PRODUK 6 -->
    <div class="card">

        <img src="https://via.placeholder.com/100">

        <p>
            Hydrating Essence
        </p>

        <p>
            Rp 110.000
        </p>

        <button class="btn">
            + Keranjang
        </button>

    </div>

</div>

<!-- FOOTER -->
<div class="footer">

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

</body>
</html>