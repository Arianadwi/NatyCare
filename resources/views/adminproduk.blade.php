<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Natycare Admin</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background:#fff3f7;
    padding:30px;
}

.container{
    width:1200px;
    margin:auto;
    background:white;
    border-radius:20px;
    padding:25px;
}

/* NAVBAR */
.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.logo-brand{
    width:220px;
    height:auto;
    display:block;
}

.icon{
    display:flex;
    gap:10px;
}

.icon div{
    background:#ffd6e5;
    padding:10px 18px;
    border-radius:10px;
    color:#f06292;
}

/* TITLE */
.title{
    font-size:40px;
    margin-bottom:25px;
    color:#444;
}

/* TOP */
.top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.kategori{
    display:flex;
    gap:10px;
}

.kategori button{
    padding:12px 20px;
    border:none;
    border-radius:10px;
    background:#f5f5f5;
    cursor:pointer;
    transition:0.3s;
    font-size:15px;
}

.kategori button.active{
    background:#f8a7c2;
    color:white;
}

.search input{
    width:250px;
    padding:12px;
    border:1px solid #ddd;
    border-radius:15px;
    outline:none;
}

/* CONTENT */
.content{
    display:flex;
    gap:20px;
}

/* GRID */
.grid{
    flex:3;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:15px;
}

/* CARD */
.card{
    border:1px solid #eee;
    border-radius:15px;
    overflow:hidden;
    background:white;
}

.foto{
    width:100%;
    height:180px;
    overflow:hidden;
}

.foto img{
    width:100%;
    height:100%;
    object-fit:contain;
}

.detail{
    padding:15px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    height:210px;
}

.detail h3{
    font-size:18px;
    margin-bottom:10px;
    color:#333;
}

.harga{
    font-size:30px;
    color:#f06292;
    font-weight:bold;
    margin-bottom:15px;
}

.btn{
    width:100%;
    padding:10px;
    border:none;
    border-radius:8px;
    background:#8bc98b;
    color:white;
    cursor:pointer;
    font-size:16px;
    transition:0.3s;
}

.btn:hover{
    background:#70b870;
}

/* SIDEBAR */
.sidebar{
    flex:1;
}

.box{
    border:1px solid #eee;
    border-radius:15px;
    padding:15px;
    margin-bottom:15px;
}

.box h2{
    margin-bottom:15px;
    color:#444;
}

.item{
    border:1px solid #f3f3f3;
    border-radius:10px;
    padding:10px;
    margin-bottom:10px;
}

.item p{
    color:#777;
    margin-bottom:5px;
}

.item h3{
    color:#f06292;
}

/* FOOTER */
.footer{
    text-align:right;
    color:#aaa;
    margin-top:10px;
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

        <div class="icon">

            <div>➖</div>

            <div>👤</div>

        </div>

    </div>

    <!-- TITLE -->
    <h1 class="title">
        Katalog Produk
    </h1>

    <!-- TOP -->
    <div class="top">

        <div class="kategori">

            <button class="active" data-kategori="semua">
                Semua
            </button>

            <button data-kategori="cleanser">
                Cleanser
            </button>

            <button data-kategori="toner">
                Toner
            </button>

            <button data-kategori="serum">
                Serum
            </button>

        </div>

        <div class="search">

            <input type="text" placeholder="Cari produk...">

        </div>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- PRODUK -->
        <div class="grid">

            <!-- 1 -->
           <div class="card" data-kategori="cleanser">

    <div class="foto">
        <img src="{{ asset('images/FacialWash.png') }}">
    </div>

    <div class="detail">

        <h3>Brightening Cleanser</h3>

        <div class="harga">
            Rp 120.000
        </div>

        <button class="btn">
            Edit
        </button>

    </div>

</div>

            <!-- 2 -->
           <!-- 2 -->

<div class="card" data-kategori="toner">

```
<div class="foto">
    <img src="{{ asset('images/Toner.png') }}">
</div>

<div class="detail">

    <h3>Hydra Glowing Toner</h3>

    <div class="harga">
        Rp 95.000
    </div>

    <button class="btn">
        Edit
    </button>

</div>
```

</div>

<!-- 3 -->

<div class="card" data-kategori="serum">

```
<div class="foto">
    <img src="{{ asset('images/Serum.png') }}">
</div>

<div class="detail">

    <h3>Anti-Aging Serum</h3>

    <div class="harga">
        Rp 150.000
    </div>

    <button class="btn">
        Edit
    </button>

</div>
```

</div>

<!-- 4 -->

<div class="card" data-kategori="serum">

```
<div class="foto">
    <img src="{{ asset('images/Moisturizer.png') }}">
</div>

<div class="detail">

    <h3>Moisturizer Glow</h3>

    <div class="harga">
        Rp 60.000
    </div>

    <button class="btn">
        Edit
    </button>

</div>
```

</div>

<!-- 5 -->

<div class="card" data-kategori="serum">

```
<div class="foto">
    <img src="{{ asset('images/SerumBrightening.png') }}">
</div>

<div class="detail">

    <h3>Serum Brightening</h3>

    <div class="harga">
        Rp 75.000
    </div>

    <button class="btn">
        Edit
    </button>

</div>
```

</div>

<!-- 6 -->

<div class="card" data-kategori="toner">

```
<div class="foto">
    <img src="{{ asset('images/Essence.png') }}">
</div>

<div class="detail">

    <h3>Hydrating Essence</h3>

    <div class="harga">
        Rp 110.000
    </div>

    <button class="btn">
        Edit
    </button>

</div>
```

</div>

        <!-- SIDEBAR -->
        <div class="sidebar">

            <div class="box">

                <h2>Laporan Penjualan</h2>

                <div class="item">

                    <p>Total Penjualan</p>

                    <h3>Rp 16.000.000</h3>

                </div>

                <div class="item">

                    <p>Total Transaksi</p>

                    <h3>4</h3>

                </div>

                <div class="item">

                    <p>Bulanan</p>

                    <h3>Rp 15.000.000</h3>

                </div>

            </div>

            <div class="box">

                <h2>Laporan Bulanan</h2>

                <div class="item">

                    <p>Pendapatan</p>

                    <h3>Rp 10.000.000</h3>

                </div>

                <div class="item">

                    <p>Pesanan</p>

                    <h3>20</h3>

                </div>

            </div>

            <div class="footer">
                Lihat semua >
            </div>

        </div>

    </div>

</div>

<script>

// SEARCH
const searchInput = document.querySelector(".search input");

searchInput.addEventListener("keyup", function(){

    let keyword = this.value.toLowerCase();

    let cards = document.querySelectorAll(".card");

    cards.forEach(card => {

        let nama = card.querySelector("h3").innerText.toLowerCase();

        if(nama.includes(keyword)){
            card.style.display = "block";
        }else{
            card.style.display = "none";
        }

    });

});

// FILTER
const buttons = document.querySelectorAll(".kategori button");

buttons.forEach(button => {

    button.addEventListener("click", function(){

        buttons.forEach(btn => {
            btn.classList.remove("active");
        });

        this.classList.add("active");

        let kategori = this.dataset.kategori;

        let cards = document.querySelectorAll(".card");

        cards.forEach(card => {

            if(kategori == "semua"){
                card.style.display = "block";
            }
            else if(card.dataset.kategori == kategori){
                card.style.display = "block";
            }
            else{
                card.style.display = "none";
            }

        });

    });

});

// BUTTON EDIT
const editButtons = document.querySelectorAll(".btn");

editButtons.forEach(button => {

    button.addEventListener("click", function(){

        let nama = this.parentElement.querySelector("h3").innerText;

        alert("Edit produk: " + nama);

    });

});

</script>

</body>
</html>