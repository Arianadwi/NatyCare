<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin NatyCare</title>

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

.container{
    width:1200px;
    margin:30px auto;
    background:white;
    border-radius:20px;
    padding:30px;
}

/* NAVBAR */
.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:40px;
}

.logo{
    color:#f06292;
    font-size:35px;
    font-weight:bold;
}

.logo-brand{
    width:220px;
    height:auto;
}

.admin{
    background:none;
    padding:0;
}

.admin-icon{
    width:70px;
    height:70px;
    object-fit:contain;
}

/* TITLE */
.title{
    text-align:center;
    color:#f06292;
    margin-bottom:40px;
    font-size:35px;
}

/* CARD */
.card-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-bottom:40px;
}

.card{
    padding:25px;
    border-radius:15px;
    color:white;
}

.pink{
    background:#ff8fb1;
}

.green{
    background:#8bc98b;
}

.orange{
    background:#ffbf80;
}

.softpink{
    background:#ffb6c1;
}

.card h2{
    font-size:40px;
    margin-top:10px;
}

/* PRODUK */
.produk-box{
    border:1px solid #eee;
    padding:20px;
    border-radius:15px;
}

.produk-title{
    margin-bottom:20px;
    color:#555;
}

.produk-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.produk{
    border:1px solid #eee;
    border-radius:15px;
    overflow:hidden;
    background:white;
}

.produk img{
    width:100%;
    height:180px;
    object-fit:contain;
    padding:15px;
}

.produk-detail{
    padding:15px;
}

.produk-detail h3{
    margin-bottom:10px;
}

.harga{
    color:#f06292;
    font-weight:bold;
    font-size:22px;
}

.badge{
    margin-top:10px;
    display:inline-block;
    background:#d8ffd8;
    color:green;
    padding:5px 12px;
    border-radius:8px;
}

</style>

</head>
<body>

<div class="container">

    <!-- NAVBAR -->
    <div class="navbar">

        <div class="logo">
            <img src="{{ asset('images/LogoNatycare.png') }}" class="logo-brand">
        </div>

      <div class="admin">
         <a href="/profile">
            <img src="{{ asset('images/AdminPutih.png') }}" class="admin-icon">
    </a>
        </div>
    </div>

    <!-- TITLE -->
    <h1 class="title">
        Selamat Datang, Admin NatyCare!
    </h1>

    <!-- CARD -->
    <div class="card-grid">

        <div class="card pink">
            <p>Transaksi Hari Ini</p>
            <h2>12</h2>
        </div>

        <div class="card green">
            <p>Stok Habis</p>
            <h2>5</h2>
        </div>

        <div class="card orange">
            <p>Pesanan</p>
            <h2>5</h2>
        </div>

        <div class="card softpink">
            <p>Antrian</p>
            <h2>8</h2>
        </div>

    </div>

    <!-- PRODUK -->
    <div class="produk-box">

        <h2 class="produk-title">
            Rekomendasi Produk
        </h2>

        <div class="produk-grid">

            <div class="produk">

                <img src="{{ asset('images/FacialWash.png') }}">

                <div class="produk-detail">

                    <h3>Brightening Cleanser</h3>

                    <div class="harga">
                        Rp 120.000
                    </div>

                    <div class="badge">
                        Baru
                    </div>

                </div>

            </div>

            <div class="produk">

                <img src="{{ asset('images/Toner.png') }}">

                <div class="produk-detail">

                    <h3>Hydra Glowing Toner</h3>

                    <div class="harga">
                        Rp 95.000
                    </div>

                    <div class="badge">
                        Baru
                    </div>

                </div>

            </div>

            <div class="produk">

                <img src="{{ asset('images/Serum.png') }}">

                <div class="produk-detail">

                    <h3>Anti-Aging Serum</h3>

                    <div class="harga">
                        Rp 150.000
                    </div>

                    <div class="badge">
                        Baru
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>