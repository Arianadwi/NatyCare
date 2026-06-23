<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Produk - NatyCare</title>
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
    color:#333;
}

.container{
    max-width:1200px;
    margin:auto;
    background:white;
    border-radius:20px;
    padding:25px;
}

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.logo-brand{
    width:220px;
    height:auto;
}

.hamburger{
    display:none;
    background:none;
    border:none;
    font-size:24px;
    cursor:pointer;
}

.nav a,
.nav button{
    margin-left:18px;
    text-decoration:none;
    color:#000;
    background:none;
    border:0;
    font-size:16px;
    font-weight:700;
    cursor:pointer;
}

.nav a:hover,
.nav button:hover{
    color:#f06292;
}

.title{
    font-size:36px;
    font-weight:700;
    margin-bottom:20px;
    color:#444;
}

.layout{
    display:grid;
    grid-template-columns:1fr 2fr;
    gap:22px;
}

.panel{
    border:1px solid #eee;
    border-radius:15px;
    padding:18px;
    background:white;
}

.panel h2{
    color:#f06292;
    margin-bottom:15px;
}

input,
textarea{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:10px;
    margin-bottom:12px;
}

textarea{
    min-height:90px;
    resize:vertical;
}

.btn{
    border:0;
    border-radius:10px;
    padding:11px 14px;
    cursor:pointer;
    background:#f06292;
    color:white;
}

.btn.secondary{
    background:#8bc98b;
}

.btn.danger{
    background:#e85757;
}

.btn.light{
    background:#f5f5f5;
    color:#555;
}

.actions{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
}

.grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:15px;
}

.card{
    border:1px solid #eee;
    border-radius:15px;
    overflow:hidden;
    background:white;
}

.card img{
    width:100%;
    height:150px;
    object-fit:contain;
    padding:12px;
    background:#fff7fa;
}

.detail{
    padding:14px;
}

.detail h3{
    font-size:17px;
    margin-bottom:8px;
}

.price{
    font-size:22px;
    color:#f06292;
    font-weight:bold;
    margin-bottom:8px;
}

.muted{
    color:#777;
    font-size:14px;
    margin-bottom:8px;
}

.empty{
    padding:18px;
    text-align:center;
    color:#777;
    background:#fff7fa;
    border-radius:12px;
}

@media(max-width:900px){

    .layout{
        grid-template-columns:1fr;
    }

    .grid{
        grid-template-columns:1fr;
    }

    .navbar{
        position:relative;
        justify-content:space-between;
        align-items:center;
    }

    .logo-brand{
        width:150px;
    }

    .hamburger{
        display:block;
    }

    .nav{
        display:none;
        position:absolute;
        top:60px;
        right:0;
        width:200px;
        background:white;
        border-radius:12px;
        box-shadow:0 4px 12px rgba(0,0,0,.1);
        padding:15px;
        flex-direction:column;
        gap:12px;
        z-index:999;
    }

    .nav.active{
        display:flex;
    }

    .nav a,
    .nav button{
        margin:0;
        text-align:left;
    }

    .title{
        text-align:center;
        font-size:28px;
    }

    .container{
        padding:18px;
    }
}
</style>
</head>
<body>
<div class="container">
    <div class="navbar">

    <img src="{{ asset('images/LogoNatycare.png') }}"
         class="logo-brand"
         alt="NatyCare">

    <button class="hamburger"
            onclick="toggleMenu()">
        ☰
    </button>

    <div class="nav" id="navMenu">
        <a href="/admin">Dashboard</a>
        <a href="/adminproduk">Produk</a>
        <a href="/transaksiadmin">Pesanan</a>
        <a href="/laporanadmin">Laporan</a>
        <button onclick="logoutAdmin()">Keluar</button>
    </div>

</div>
    <h1 class="title">Kelola Produk</h1>
    <div class="layout">
        <form class="panel" id="productForm">
            <h2 id="formTitle">Tambah Produk</h2>
            <input type="hidden" id="productId">
            <input type="text" id="nama_produk" placeholder="Nama Produk" required>
            <input type="number" id="harga" placeholder="Harga" min="0" required>
            <input type="number" id="stok" placeholder="Stok" min="0" required>
            <textarea id="deskripsi" placeholder="Deskripsi"></textarea>
            <input type="file" id="gambar" accept="image/*">
            <div class="actions">
                <button class="btn" type="submit">Simpan Produk</button>
                <button class="btn light" type="button" onclick="resetForm()">Batal</button>
            </div>
        </form>
        <div class="panel">
            <h2>Daftar Produk</h2>
            <input type="text" id="search" placeholder="Cari produk...">
            <div id="productGrid" class="grid"></div>
        </div>
    </div>
</div>
<script>
const apiUrl = 'http://127.0.0.1:8000/api';
let products = [];

function toggleMenu(){
    document.getElementById('navMenu')
            .classList.toggle('active');
}
function headers(json = true){
    const token = localStorage.getItem('token');
    if(!token){ window.location.href = '/login'; return null; }
    const h = {'Accept':'application/json','Authorization':'Bearer '+token};
    if(json){ h['Content-Type'] = 'application/json'; }
    return h;
}
function rupiah(value){ return 'Rp ' + Number(value || 0).toLocaleString('id-ID'); }
function image(product){

    const gambar = product.gambar_url || product.gambar;

    if(!gambar){
        return '/images/LogoN.png';
    }

    const source = String(gambar);

    if(source.startsWith('http') || source.startsWith('/images/')){
        return source;
    }

    const fileName = source.split('/').filter(Boolean).pop();

    return `/images/${fileName}`;
}
function logoutAdmin(){ localStorage.removeItem('token'); localStorage.removeItem('role'); localStorage.removeItem('user'); window.location.href='/login'; }
function loadProducts(){
    fetch(`${apiUrl}/produk`, {headers:{'Accept':'application/json'}})
    .then(res => res.json())
    .then(data => {

    console.log(data);

    products = Array.isArray(data) ? data : [];

    renderProducts();

});
}
function renderProducts(){
    const keyword = document.getElementById('search').value.toLowerCase();
    const filtered = products.filter(p => p.nama_produk.toLowerCase().includes(keyword));

document.getElementById('productGrid').innerHTML = filtered.length ? filtered.map(product => `
    <div class="card">

        <img src="${image(product)}"
             alt="${product.nama_produk}"
             onerror="this.onerror=null;this.src='/images/LogoN.png';">

        <div class="detail">
            <h3>${product.nama_produk}</h3>
            <div class="price">${rupiah(product.harga)}</div>
            <p class="muted">Stok: ${product.stok}</p>
            <p class="muted">${product.deskripsi || '-'}</p>

            <div class="actions">
                <button class="btn secondary" onclick="editProduct(${product.id})">Edit</button>
                <button class="btn light" onclick="adjustStock(${product.id}, 1)">+ Stok</button>
                <button class="btn light" onclick="adjustStock(${product.id}, -1)">- Stok</button>
                <button class="btn danger" onclick="deleteProduct(${product.id})">Hapus</button>
            </div>
        </div>

    </div>
`).join('') : '<div class="empty">Produk tidak ditemukan</div>';
}
function resetForm(){
    document.getElementById('productForm').reset();
    document.getElementById('productId').value = '';
    document.getElementById('formTitle').innerText = 'Tambah Produk';
}
function editProduct(id){
    const product = products.find(p => Number(p.id) === Number(id));
    if(!product){ return; }
    document.getElementById('productId').value = product.id;
    document.getElementById('nama_produk').value = product.nama_produk;
    document.getElementById('harga').value = product.harga;
    document.getElementById('stok').value = product.stok;
    document.getElementById('deskripsi').value = product.deskripsi || '';
    document.getElementById('formTitle').innerText = 'Edit Produk';
}
function formData(){
    const data = new FormData();
    data.append('nama_produk', document.getElementById('nama_produk').value.trim());
    data.append('harga', document.getElementById('harga').value);
    data.append('stok', document.getElementById('stok').value);
    data.append('deskripsi', document.getElementById('deskripsi').value.trim());
    const file = document.getElementById('gambar').files[0];
    if(file){ data.append('gambar', file); }
    return data;
}
document.getElementById('productForm').addEventListener('submit', function(event){
    event.preventDefault();
    const tokenHeaders = headers(false); if(!tokenHeaders){ return; }
    const id = document.getElementById('productId').value;
    const url = id ? `${apiUrl}/produk/${id}/update` : `${apiUrl}/produk`;
    fetch(url, {method:'POST', headers:tokenHeaders, body:formData()})
    .then(async res => {
        const data = await res.json();
        if(!res.ok){ alert(data.message || 'Produk gagal disimpan'); return null; }
        return data;
    })
    .then(data => { if(data){ alert(data.message); resetForm(); loadProducts(); } });
});
function adjustStock(id, delta){
    const product = products.find(p => Number(p.id) === Number(id));
    if(!product){ return; }
    const stok = Math.max(0, Number(product.stok) + delta);
    fetch(`${apiUrl}/produk/${id}`, {method:'PUT', headers:headers(), body:JSON.stringify({stok})})
    .then(res => res.json())
    .then(() => loadProducts());
}
function deleteProduct(id){
    if(!confirm('Hapus produk ini?')){ return; }
    fetch(`${apiUrl}/produk/${id}`, {method:'DELETE', headers:headers()})
    .then(res => res.json())
    .then(data => { alert(data.message || 'Produk dihapus'); loadProducts(); });
}
document.getElementById('search').addEventListener('input', renderProducts);
loadProducts();
</script>
</body>
</html>
