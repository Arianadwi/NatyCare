<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NatyCare</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font-family:Arial,sans-serif;background:#ffeef5;color:#333}
.container{max-width:1300px;margin:auto;background:white;min-height:100vh}
.navbar{display:flex;justify-content:space-between;align-items:center;padding:16px 42px;border-bottom:1px solid #f6dbe5;gap:24px}
.logo-brand{width:170px;height:auto;object-fit:contain;display:block}
.nav-right{display:flex;align-items:center;gap:22px}
.nav-menu{display:flex;align-items:center;gap:24px}
.nav-menu a{text-decoration:none;color:#555;font-size:15px;font-weight:600}
.nav-menu a:hover{color:#f06292}
.profile-icon{width:40px;height:40px;object-fit:contain;cursor:pointer;transition:.2s}
.profile-icon:hover{transform:scale(1.06)}
.hamburger{display:none;background:#f06292;color:white;border:0;border-radius:10px;padding:10px 12px;font-size:18px;cursor:pointer}
.hero{display:grid;grid-template-columns:1.05fr .95fr;align-items:center;gap:24px;padding:52px 54px;background:linear-gradient(135deg,#ffd6e5 0%,#fff7fa 100%)}
.hero-text h1{color:#b03060;font-size:38px;line-height:1.16;margin-bottom:12px}
.hero-text p{font-size:19px;color:#6f4a58;line-height:1.5}
.hero img{width:min(430px,100%);justify-self:end;object-fit:contain}
.title{display:flex;justify-content:center;align-items:center;gap:18px;margin:34px 0 24px;padding:0 24px}
.line{width:120px;height:3px;background:#f06292;border-radius:99px}
.title b{color:#f06292;font-size:22px;text-align:center}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;padding:0 50px 44px}
.card{background:#fffafc;border:1px solid #f5dce6;border-radius:16px;padding:24px;text-align:center;transition:.2s;display:flex;flex-direction:column;min-height:430px}
.card:hover{transform:translateY(-4px);box-shadow:0 12px 28px rgba(240,98,146,.13)}
.product-image{width:180px;height:180px;object-fit:contain;margin:0 auto 18px;display:block}
.product-name{font-weight:700;font-size:18px;line-height:1.35;margin-bottom:10px;color:#333;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.product-desc{color:#777;font-size:14px;line-height:1.5;min-height:42px;margin-bottom:14px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.price{color:#f06292;font-weight:800;font-size:22px;margin-top:auto;margin-bottom:16px}
.btn{width:100%;background:#f06292;color:white;border:none;padding:13px;border-radius:10px;cursor:pointer;transition:.2s;font-weight:700;font-size:15px}
.btn:hover{background:#ec407a}
.empty{grid-column:1/-1;background:#fff7fa;border-radius:14px;padding:22px;text-align:center;color:#777}
.footer{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;padding:28px 50px;border-top:1px solid #f3dce5;background:#fffafc}
.col{font-size:15px;color:#555;line-height:1.7}
.col b{color:#b03060}
@media(max-width:900px){
    .navbar{padding:14px 24px}.hamburger{display:block}.nav-right{gap:14px}
    .nav-menu{display:none;position:absolute;top:78px;left:24px;right:24px;background:white;border:1px solid #f5dce6;border-radius:14px;padding:14px;box-shadow:0 12px 26px rgba(0,0,0,.08);z-index:5;flex-direction:column;align-items:stretch;gap:0}
    .nav-menu.active{display:flex}.nav-menu a{padding:12px;border-radius:10px}.nav-menu a:hover{background:#fff3f8}
    .hero{grid-template-columns:1fr;text-align:center;padding:38px 28px}.hero img{justify-self:center;width:min(330px,82vw)}
    .grid{grid-template-columns:repeat(2,1fr);padding:0 28px 36px}.footer{grid-template-columns:1fr;padding:26px 28px}
}
@media(max-width:600px){
    .logo-brand{width:135px}.navbar{padding:12px 16px}.nav-menu{top:68px;left:16px;right:16px}
    .hero{padding:30px 20px}.hero-text h1{font-size:28px}.hero-text p{font-size:16px}
    .title{gap:10px;margin:28px 0 20px}.line{width:54px}
    .grid{grid-template-columns:1fr;gap:18px;padding:0 18px 30px}.card{min-height:400px;padding:22px}.product-image{width:170px;height:170px}
}
</style>
</head>
<body>
<div class="container">
    <div class="navbar">
        <a href="/katalog" class="logo">
            <img src="{{ asset('images/LogoN.png') }}" class="logo-brand" alt="NatyCare">
        </a>
        <div class="nav-right">
            <button class="hamburger" type="button" onclick="toggleMenu()">☰</button>
            <div class="nav-menu" id="navMenu">
                <a href="/katalog">Beranda</a>
                <a href="/keranjang">Keranjang</a>
                <a href="/katalog#kontak">Kontak</a>
            </div>
            <a href="/profile">
                <img src="{{ asset('images/profil-admin.png') }}" class="profile-icon" alt="Profile">
            </a>
        </div>
    </div>

    <section class="hero">
        <div class="hero-text">
            <h1>Selamat Datang di NatyCare Skincare</h1>
            <p>Kulit sehat, cantik alami, dan percaya diri dengan rangkaian skincare pilihan.</p>
        </div>
        <img src="{{ asset('images/HeroProduk.png') }}" alt="Produk NatyCare">
    </section>

    <div class="title">
        <div class="line"></div>
        <b>Produk Unggulan</b>
        <div class="line"></div>
    </div>

    <div class="grid" id="produk-container">
        <div class="empty">Memuat produk...</div>
    </div>

    <footer class="footer" id="kontak">
        <div class="col"><b>Kontak</b><br>085655970682</div>
        <div class="col"><b>Alamat</b><br>Jl. Tulip No.26<br>Lokasi tersedia</div>
        <div class="col"><b>Email</b><br>natycare17106@gmail.com</div>
    </footer>
</div>

@verbatim
<script>
let produkList = [];

function toggleMenu(){
    document.getElementById('navMenu').classList.toggle('active');
}

function getAuthHeaders(){
    const token = localStorage.getItem('token');

    if(!token){
        alert('Silakan login terlebih dahulu');
        window.location.href = '/login';
        return null;
    }

    return {
        'Content-Type':'application/json',
        'Accept':'application/json',
        'Authorization':'Bearer ' + token
    };
}

function formatRupiah(value){
    return 'Rp ' + Number(value || 0).toLocaleString('id-ID');
}

function productImage(item){
    const source = item.gambar || item.gambar_url || '';
    const fileName = String(source).split('/').filter(Boolean).pop();

    if(!fileName){
        return '/images/LogoN.png';
    }

    return `/images/${fileName}`;
}

function imageFallback(image){
    image.onerror = null;
    image.src = '/images/LogoN.png';
}

fetch('http://127.0.0.1:8000/api/produk')
.then(response => response.json())
.then(data => {
    produkList = Array.isArray(data) ? data : [];
    const container = document.getElementById('produk-container');

    if(produkList.length === 0){
        container.innerHTML = '<div class="empty">Belum ada produk tersedia</div>';
        return;
    }

    container.innerHTML = produkList.map(item => `
        <div class="card">
            <img class="product-image" src="${productImage(item)}" alt="${item.nama_produk}" onerror="imageFallback(this)">
            <h3 class="product-name">${item.nama_produk}</h3>
            <p class="product-desc">${item.deskripsi || 'Produk skincare NatyCare untuk perawatan kulit harian.'}</p>
            <div class="price">${formatRupiah(item.harga)}</div>
            <button class="btn" onclick="tambahKeranjang(${item.id})">+ Keranjang</button>
        </div>
    `).join('');
})
.catch(error => {
    console.log(error);
    document.getElementById('produk-container').innerHTML = '<div class="empty">Produk gagal dimuat</div>';
});

function tambahKeranjang(id){
    const headers = getAuthHeaders();

    if(!headers){
        return;
    }

    fetch('http://127.0.0.1:8000/api/keranjang', {
        method:'POST',
        headers:headers,
        body:JSON.stringify({
            produk_id:id,
            jumlah:1
        })
    })
    .then(async response => {
        const data = await response.json();

        if(response.status === 401){
            localStorage.removeItem('token');
            alert('Sesi login habis. Silakan login lagi');
            window.location.href = '/login';
            return null;
        }

        if(!response.ok){
            alert(data.message || 'Produk gagal masuk keranjang');
            return null;
        }

        return data;
    })
    .then(data => {
        if(!data){
            return;
        }

        alert('Produk berhasil masuk keranjang');
    })
    .catch(error => console.log(error));
}
</script>
@endverbatim
</body>
</html>
