<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Keranjang - NatyCare</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font-family:Arial,sans-serif;background:#ffeef5;color:#333}
.container{max-width:1300px;margin:auto;background:white;min-height:100vh;display:flex;flex-direction:column}
.navbar{display:flex;justify-content:space-between;align-items:center;padding:16px 42px;border-bottom:1px solid #f6dbe5;gap:24px}
.logo-brand{width:170px;height:auto;object-fit:contain;display:block}
.nav-right{display:flex;align-items:center;gap:22px}
.nav-menu{display:flex;align-items:center;gap:24px}
.nav-menu a{text-decoration:none;color:#555;font-size:15px;font-weight:600}
.nav-menu a:hover{color:#f06292}
.profile-icon{width:40px;height:40px;object-fit:contain;cursor:pointer;transition:.2s}
.profile-icon:hover{transform:scale(1.06)}
.hamburger{display:none;background:#f06292;color:white;border:0;border-radius:10px;padding:10px 12px;font-size:18px;cursor:pointer}

/* HEADER */
.header{background:linear-gradient(135deg,#ffd6e5 0%,#fff7fa 100%);padding:40px 42px;text-align:center}
.header h2{color:#b03060;font-size:32px;margin-bottom:8px;font-weight:700}
.header p{color:#6f4a58;font-size:16px}

/* MAIN */
.main{display:grid;grid-template-columns:1fr 380px;gap:28px;padding:36px 42px;flex:1}
.left{display:flex;flex-direction:column;gap:20px}

/* CART ITEMS */
.cart-items{display:flex;flex-direction:column;gap:0}
.cart-item{display:grid;grid-template-columns:120px 1fr 100px;gap:20px;padding:20px;background:#fffafc;border-radius:14px;border:1px solid #f5dce6;align-items:center;transition:.2s}
.cart-item:hover{box-shadow:0 6px 16px rgba(240,98,146,.1)}
.item-image{width:120px;height:120px;object-fit:cover;border-radius:10px;background:#fff}
.item-details{display:flex;flex-direction:column;gap:10px}
.item-name{font-weight:700;font-size:16px;color:#333}
.item-price{color:#f06292;font-weight:700;font-size:18px}
.item-qty{display:flex;align-items:center;gap:8px;margin-top:8px}
.qty-btn{width:32px;height:32px;border:1px solid #f8bbd0;background:#fff;border-radius:8px;cursor:pointer;font-weight:700;color:#f06292;transition:.2s}
.qty-btn:hover{background:#fff0f5;border-color:#f06292}
.qty-display{min-width:32px;text-align:center;font-weight:600}
.item-subtotal{text-align:right;display:flex;flex-direction:column;gap:12px;align-items:flex-end}
.subtotal-label{font-size:12px;color:#999;text-align:right}
.subtotal-value{font-weight:700;font-size:18px;color:#f06292}
.remove-btn{width:100%;margin-top:8px;padding:8px;background:#fff0f5;color:#e74c3c;border:1px solid #ffc0cb;border-radius:8px;cursor:pointer;font-size:13px;font-weight:600;transition:.2s}
.remove-btn:hover{background:#ffe0e0;border-color:#e74c3c}

/* EMPTY STATE */
.empty-state{text-align:center;padding:60px 30px;background:#fff7fa;border-radius:14px;border:2px dashed #f5dce6}
.empty-state p{color:#999;font-size:16px;margin-bottom:12px}
.empty-state a{display:inline-block;background:#f06292;color:white;padding:12px 28px;border-radius:8px;text-decoration:none;font-weight:600;transition:.2s}
.empty-state a:hover{background:#ec407a}

/* RIGHT SIDEBAR */
.summary{background:#fff0f5;border-radius:14px;padding:24px;height:fit-content;position:sticky;top:20px}
.summary h3{color:#f06292;font-size:18px;margin-bottom:20px;font-weight:700}
.summary-row{display:flex;justify-content:space-between;margin-bottom:12px;font-size:15px;color:#555}
.summary-row.total{border-top:2px solid #f8bbd0;padding-top:12px;margin-top:12px;font-weight:700;font-size:18px;color:#f06292}
.checkout-btn{width:100%;background:#f06292;color:white;padding:14px;border:none;border-radius:10px;font-weight:700;font-size:16px;cursor:pointer;margin-top:20px;transition:.2s}
.checkout-btn:hover{background:#ec407a}
.checkout-btn:disabled{background:#ccc;cursor:not-allowed}

@media(max-width:900px){
    .navbar{padding:14px 24px}.hamburger{display:block}.nav-right{gap:14px}
    .nav-menu{display:none;position:absolute;top:68px;left:24px;right:24px;background:white;border:1px solid #f5dce6;border-radius:14px;padding:14px;box-shadow:0 12px 26px rgba(0,0,0,.08);z-index:5;flex-direction:column;align-items:stretch;gap:0}
    .nav-menu.active{display:flex}.nav-menu a{padding:12px;border-radius:10px}.nav-menu a:hover{background:#fff3f8}
    .header{padding:30px 24px}.header h2{font-size:24px}
    .main{grid-template-columns:1fr;gap:20px;padding:24px}.summary{position:relative;top:auto}
    .cart-item{grid-template-columns:100px 1fr;gap:16px}
    .item-image{width:100px;height:100px}
    .item-subtotal{position:absolute;top:20px;right:20px}
}

@media(max-width:600px){
    .logo-brand{width:135px}.navbar{padding:12px 16px}.nav-menu{top:62px;left:16px;right:16px}
    .header{padding:24px 16px}.header h2{font-size:20px}.header p{font-size:14px}
    .main{padding:16px;gap:16px}
    .cart-item{grid-template-columns:90px 1fr;gap:12px;padding:16px;position:relative}
    .item-image{width:90px;height:90px}
    .item-name{font-size:14px}.item-price{font-size:16px}
    .item-subtotal{position:absolute;bottom:16px;right:16px}
    .subtotal-value{font-size:16px}
    .item-qty{flex-wrap:wrap}
    .summary{margin-top:12px}
    .cart-items{gap:12px}
}
</style>
</head>
<body>
<div class="container">
    <!-- NAVBAR -->
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

    <!-- HEADER -->
    <div class="header">
        <h2>Keranjang Belanja</h2>
        <p>Periksa kembali produk sebelum melanjutkan ke checkout</p>
    </div>

    <!-- MAIN -->
    <div class="main">
        <!-- LEFT -->
        <div class="left">
            <div class="cart-items" id="keranjang-container">
                <div class="empty-state">
                    <p>Belum ada produk di keranjang.</p>
                    <a href="/katalog">Lanjutkan Belanja</a>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="summary">
            <h3>Ringkasan Belanja</h3>
            <div class="summary-row">
                <span>Subtotal:</span>
                <span id="subtotal">Rp 0</span>
            </div>
            <div class="summary-row total">
                <span>Total:</span>
                <span id="total">Rp 0</span>
            </div>
            <button class="checkout-btn" id="checkoutBtn" onclick="goToCheckout()">Lanjut ke Checkout</button>
        </div>
    </div>
</div>

<script>
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

function handleUnauthorized(){
    localStorage.removeItem('token');
    alert('Sesi login habis. Silakan login lagi');
    window.location.href = '/login';
}

function formatRupiah(value){
    return 'Rp ' + Number(value || 0).toLocaleString('id-ID');
}

function productImage(gambar){
    if(!gambar) return '/images/LogoN.png';
    const fileName = String(gambar).split('/').filter(Boolean).pop();
    return `/images/${fileName}`;
}

function imageFallback(image){
    image.onerror = null;
    image.src = '/images/LogoN.png';
}

function loadKeranjang(){
    const headers = getAuthHeaders();
    if(!headers) return;

    fetch('http://127.0.0.1:8000/api/keranjang', { headers })
        .then(async response => {
            if(response.status === 401){
                handleUnauthorized();
                return [];
            }
            return response.json();
        })
        .then(data => {
            const container = document.getElementById('keranjang-container');
            container.innerHTML = '';

            if(!data || data.length === 0){
                container.innerHTML = `
                    <div class="empty-state">
                        <p>Belum ada produk di keranjang.</p>
                        <a href="/katalog">Lanjutkan Belanja</a>
                    </div>
                `;
                document.getElementById('checkoutBtn').disabled = true;
                document.getElementById('subtotal').innerHTML = 'Rp 0';
                document.getElementById('total').innerHTML = 'Rp 0';
                return;
            }

            let subtotal = 0;

            data.forEach(item => {
                const itemSubtotal = item.produk.harga * item.jumlah;
                subtotal += itemSubtotal;

                container.innerHTML += `
                    <div class="cart-item">
                        <img src="${productImage(item.produk.gambar)}" class="item-image" onerror="imageFallback(this)" alt="${item.produk.nama_produk}">
                        
                        <div class="item-details">
                            <div class="item-name">${item.produk.nama_produk}</div>
                            <div class="item-price">${formatRupiah(item.produk.harga)}</div>
                            <div class="item-qty">
                                <button class="qty-btn" onclick="ubahJumlah(${item.id}, 'kurang')">−</button>
                                <div class="qty-display">${item.jumlah}</div>
                                <button class="qty-btn" onclick="ubahJumlah(${item.id}, 'tambah')">+</button>
                            </div>
                            <button class="remove-btn" onclick="hapusKeranjang(${item.id})">Hapus</button>
                        </div>

                        <div class="item-subtotal">
                            <div class="subtotal-label">Subtotal</div>
                            <div class="subtotal-value">${formatRupiah(itemSubtotal)}</div>
                        </div>
                    </div>
                `;
            });

            document.getElementById('subtotal').innerHTML = formatRupiah(subtotal);
            document.getElementById('total').innerHTML = formatRupiah(subtotal);
            document.getElementById('checkoutBtn').disabled = false;
        })
        .catch(error => console.log(error));
}

function ubahJumlah(id, aksi){
    const headers = getAuthHeaders();
    if(!headers) return;

    fetch(`http://127.0.0.1:8000/api/keranjang/${id}`, {
        method: 'PUT',
        headers: headers,
        body: JSON.stringify({ aksi })
    })
    .then(async response => {
        if(response.status === 401){
            handleUnauthorized();
            return null;
        }
        return response.json();
    })
    .then(data => {
        if(data) loadKeranjang();
    })
    .catch(error => console.log(error));
}

function hapusKeranjang(id){
    if(!confirm('Hapus produk dari keranjang?')) return;

    const headers = getAuthHeaders();
    if(!headers) return;

    fetch(`http://127.0.0.1:8000/api/keranjang/${id}`, {
        method: 'DELETE',
        headers: headers
    })
    .then(async response => {
        if(response.status === 401){
            handleUnauthorized();
            return null;
        }
        return response.json();
    })
    .then(data => {
        if(data) loadKeranjang();
    })
    .catch(error => console.log(error));
}

function goToCheckout(){
    const headers = getAuthHeaders();
    if(!headers) return;

    fetch('http://127.0.0.1:8000/api/keranjang', { headers })
        .then(response => response.json())
        .then(data => {
            if(data && data.length > 0){
                window.location.href = '/checkout';
            }
        });
}

loadKeranjang();
</script>
</body>
</html>
