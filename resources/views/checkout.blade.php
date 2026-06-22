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

.saved-address-list{
    margin-top:15px;
}

.address-choice{
    background:white;
    border:2px solid #f8bbd0;
    border-radius:15px;
    padding:16px;
    margin-top:12px;
}

.address-choice h4{
    color:#f06292;
    margin-bottom:6px;
}

.address-choice p{
    color:#666;
    font-size:14px;
    line-height:1.5;
}

.address-actions{
    display:flex;
    gap:10px;
    margin-top:12px;
}

.address-btn{
    background:#f06292;
    color:white;
    border:none;
    padding:10px 14px;
    border-radius:10px;
    cursor:pointer;
}

.address-btn.secondary{
    background:white;
    color:#f06292;
    border:1px solid #f06292;
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
    display:none;
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
    width:76px;
    height:76px;
    object-fit:cover;
    flex:0 0 76px;
    border-radius:12px;
    background:white;
    border:1px solid #f8d6e2;
}

.summary-item div{
    line-height:1.35;
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

</div>

<!-- HEADER -->
<div class="header">

<h2>Checkout Pesanan</h2>

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

<h3>Informasi Pengiriman</h3>

<p class="note">
Silakan lengkapi alamat pengiriman Anda
</p>

<div id="saved-address-section" style="display:none;">
<p class="note">Alamat Tersimpan</p>
<div id="saved-address-list" class="saved-address-list"></div>
<button class="address-btn secondary" type="button" onclick="useNewAddress()">
Tambah Alamat Baru
</button>
</div>

<input type="text" id="nama_lengkap" placeholder="Nama Lengkap" required>

<input type="text" id="no_whatsapp" placeholder="No. WhatsApp" required>

<textarea id="alamat_lengkap" placeholder="Masukkan alamat lengkap" required></textarea>

<div class="row">

<select id="provinsi">
<option value="">Pilih Provinsi</option>
</select>

<select id="kota">
<option value="">Pilih Kota / Kabupaten</option>
</select>

</div>

<div class="row">

<select id="kecamatan">
<option value="">Pilih Kecamatan</option>
</select>

<input type="text" id="kode_pos" placeholder="Masukkan kode pos" required>

</div>

<textarea id="catatan" placeholder="Catatan untuk pesanan Anda (opsional)"></textarea>

</div>

<!-- PENGIRIMAN -->
<div class="card">

<h3>&#128666; Metode Pengiriman</h3>

<p class="note">
Pilih jasa pengiriman yang ingin digunakan
</p>

<label class="shipping-option">

<input type="radio" name="shipping" value="J&T Express" data-ongkir="15000">

<div class="shipping-content">

<div>
<h4>J&T Express</h4>
<p>Estimasi 2 - 4 Hari</p>
</div>

<b>Rp 15.000</b>

</div>

</label>

<label class="shipping-option">

<input type="radio" name="shipping" value="JNE Reguler" data-ongkir="18000">

<div class="shipping-content">

<div>
<h4>JNE Reguler</h4>
<p>Estimasi 2 - 5 Hari</p>
</div>

<b>Rp 18.000</b>

</div>

</label>

<label class="shipping-option">

<input type="radio" name="shipping" value="SiCepat Express" data-ongkir="20000">

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

<h3>&#128179; Metode Pembayaran</h3>

<p class="note">
Pilih metode pembayaran yang diinginkan
</p>

<label class="payment-option">

<div style="display:flex; align-items:center; width:100%;">

<input type="radio" name="payment" value="QRIS">

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

<input type="radio" name="payment" value="COD">

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

</div>

</div>

</label>

</div>

</div>

<!-- RIGHT -->
<div class="right">

<div class="summary">

<h3>&#128717; Ringkasan Pesanan</h3>

<div id="checkout-items"></div>

<hr style="margin:20px 0;">

<p>Subtotal : <span id="subtotal">Rp 0</span></p>
<p>Ongkir : <span id="ongkir">Rp 0</span></p>

<p class="total" id="total">
Rp 0
</p>

<a href="#" class="pay-btn" id="checkout-btn">
Lanjutkan ke Konfirmasi &rarr;
</a>

</div>

</div>

</div>

</div>

<script>

const apiUrl = 'http://127.0.0.1:8000/api';
const provinsi = document.getElementById("provinsi");
const kota = document.getElementById("kota");
const kecamatan = document.getElementById("kecamatan");
const checkoutBtn = document.getElementById("checkout-btn");
const checkoutItems = document.getElementById("checkout-items");
const subtotalEl = document.getElementById("subtotal");
const ongkirEl = document.getElementById("ongkir");
const totalEl = document.getElementById("total");
let subtotal = 0;
let ongkir = 0;
let savedAddress = null;
let savedAddresses = [];

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
    return 'Rp ' + Number(value).toLocaleString('id-ID');
}

function productImage(gambar){
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

function imageFallback(image){
    image.onerror = null;
    image.src = '/images/LogoN.png';
}

function getSelectedText(select){
    return select.options[select.selectedIndex]?.text.trim() || '';
}

function getSelectedShipping(){
    return document.querySelector('input[name="shipping"]:checked');
}

function getSelectedPayment(){
    return document.querySelector('input[name="payment"]:checked');
}

function normalizeText(value){
    return String(value || '').trim().toLowerCase();
}

function selectOptionByText(select, text){
    const target = normalizeText(text);

    if(!target){
        return false;
    }

    for(const option of select.options){
        if(normalizeText(option.text) === target){
            select.value = option.value;
            return true;
        }
    }

    return false;
}

function populateOptions(select, items, placeholder, valueKey = 'id', textKey = 'name'){
    select.innerHTML = `<option value="">${placeholder}</option>`;

    items.forEach(item => {
        select.innerHTML += `
            <option value="${item[valueKey]}">
                ${item[textKey]}
            </option>
        `;
    });
}

function loadRegencies(provinceId){
    kota.innerHTML = `<option value="">Pilih Kota / Kabupaten</option>`;
    kecamatan.innerHTML = `<option value="">Pilih Kecamatan</option>`;

    if(!provinceId){
        return Promise.resolve([]);
    }

    return fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
        .then(res => res.json())
        .then(data => {
            populateOptions(kota, data, 'Pilih Kota / Kabupaten');
            return data;
        });
}

function loadDistricts(regencyId){
    kecamatan.innerHTML = `<option value="">Pilih Kecamatan</option>`;

    if(!regencyId){
        return Promise.resolve([]);
    }

    return fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyId}.json`)
        .then(res => res.json())
        .then(data => {
            populateOptions(kecamatan, data, 'Pilih Kecamatan', 'name', 'name');
            return data;
        });
}

async function applySavedAddress(address){
    if(!address){
        return;
    }

    document.getElementById('nama_lengkap').value = address.nama_lengkap || '';
    document.getElementById('no_whatsapp').value = address.no_whatsapp || '';
    document.getElementById('alamat_lengkap').value = address.alamat_lengkap || '';
    document.getElementById('kode_pos').value = address.kode_pos || '';

    if(selectOptionByText(provinsi, address.provinsi)){
        await loadRegencies(provinsi.value);
        if(selectOptionByText(kota, address.kota)){
            await loadDistricts(kota.value);
            selectOptionByText(kecamatan, address.kecamatan);
        }
    }

    validateCheckoutForm();
}

function clearShippingAddress(){
    savedAddress = null;
    document.getElementById('nama_lengkap').value = '';
    document.getElementById('no_whatsapp').value = '';
    document.getElementById('alamat_lengkap').value = '';
    document.getElementById('kode_pos').value = '';
    provinsi.value = '';
    kota.innerHTML = `<option value="">Pilih Kota / Kabupaten</option>`;
    kecamatan.innerHTML = `<option value="">Pilih Kecamatan</option>`;
    validateCheckoutForm();
}

function renderSavedAddresses(){
    const section = document.getElementById('saved-address-section');
    const list = document.getElementById('saved-address-list');

    if(savedAddresses.length === 0){
        section.style.display = 'none';
        return;
    }

    section.style.display = 'block';
    list.innerHTML = savedAddresses.map(address => `
        <div class="address-choice">
            <h4>${address.nama_lengkap}${address.is_default ? ' - Utama' : ''}</h4>
            <p>${address.no_whatsapp}</p>
            <p>${address.alamat_lengkap}</p>
            <p>${address.kecamatan}, ${address.kota}, ${address.provinsi} ${address.kode_pos}</p>
            <div class="address-actions">
                <button class="address-btn" type="button" onclick="useSavedAddress(${address.id})">
                    Gunakan Alamat Ini
                </button>
            </div>
        </div>
    `).join('');
}

function useSavedAddress(id){
    const address = savedAddresses.find(item => Number(item.id) === Number(id));
    savedAddress = address || null;
    applySavedAddress(savedAddress);
}

function useNewAddress(){
    clearShippingAddress();
}

function loadDefaultAddress(){
    const headers = getAuthHeaders();

    if(!headers){
        return;
    }

    fetch(`${apiUrl}/addresses`, {headers})
    .then(async response => {
        if(response.status === 401){
            localStorage.removeItem('token');
            localStorage.removeItem('role');
            localStorage.removeItem('user');
            alert('Sesi login habis. Silakan login lagi');
            window.location.href = '/login';
            return [];
        }

        return response.json();
    })
    .then(data => {
        if(!Array.isArray(data) || data.length === 0){
            savedAddresses = [];
            renderSavedAddresses();
            return;
        }

        savedAddresses = data;
        renderSavedAddresses();
        savedAddress = savedAddresses.find(address => address.is_default) || savedAddresses[0];
        applySavedAddress(savedAddress);
    })
    .catch(error => console.log(error));
}

function updateTotal(){
    const shipping = getSelectedShipping();
    ongkir = shipping ? Number(shipping.dataset.ongkir) : 0;

    subtotalEl.innerHTML = formatRupiah(subtotal);
    ongkirEl.innerHTML = formatRupiah(ongkir);
    totalEl.innerHTML = formatRupiah(subtotal + ongkir);

    validateCheckoutForm();
}

function validateCheckoutForm(){
    const isComplete =
        document.getElementById('nama_lengkap').value.trim() &&
        document.getElementById('no_whatsapp').value.trim() &&
        document.getElementById('alamat_lengkap').value.trim() &&
        provinsi.value &&
        kota.value &&
        kecamatan.value &&
        document.getElementById('kode_pos').value.trim() &&
        getSelectedShipping() &&
        getSelectedPayment() &&
        subtotal > 0;

    checkoutBtn.style.pointerEvents = isComplete ? 'auto' : 'none';
    checkoutBtn.style.opacity = isComplete ? '1' : '0.5';

    return Boolean(isComplete);
}

function loadKeranjang(){
    const headers = getAuthHeaders();

    if(!headers){
        return;
    }

    fetch(`${apiUrl}/keranjang`, {
        headers: headers
    })
    .then(async response => {
        if(response.status === 401){
            localStorage.removeItem('token');
            localStorage.removeItem('role');
            localStorage.removeItem('user');
            alert('Sesi login habis. Silakan login lagi');
            window.location.href = '/login';
            return [];
        }

        return response.json();
    })
    .then(data => {
        checkoutItems.innerHTML = '';
        subtotal = 0;

        if(data.length === 0){
            checkoutItems.innerHTML = '<p>Keranjang masih kosong</p>';
            updateTotal();
            return;
        }

        data.forEach(item => {
            const harga = Number(item.produk.harga);
            const jumlah = Number(item.jumlah);

            subtotal += harga * jumlah;

            checkoutItems.innerHTML += `
                <div class="summary-item">
                    <img src="${productImage(item.produk.gambar)}" onerror="imageFallback(this)" alt="${item.produk.nama_produk}">
                    <div>
                        <b>${item.produk.nama_produk}</b><br>
                        Jumlah: ${jumlah}<br>
                        ${formatRupiah(harga)}
                    </div>
                </div>
            `;
        });

        updateTotal();
    })
    .catch(error => console.log(error));
}

fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
.then(res => res.json())
.then(data => {
    populateOptions(provinsi, data, 'Pilih Provinsi');
    loadDefaultAddress();
});

provinsi.addEventListener("change", function(){

    validateCheckoutForm();
    loadRegencies(this.value);

});

kota.addEventListener("change", function(){

    validateCheckoutForm();
    loadDistricts(this.value);

});

document.querySelectorAll('input, textarea, select').forEach(element => {
    element.addEventListener('input', validateCheckoutForm);
    element.addEventListener('change', validateCheckoutForm);
});

document.querySelectorAll('input[name="shipping"]').forEach(element => {
    element.addEventListener('change', updateTotal);
});

checkoutBtn.addEventListener('click', function(event){
    event.preventDefault();

    if(!validateCheckoutForm()){
        alert('Lengkapi data checkout terlebih dahulu');
        return;
    }

    const headers = getAuthHeaders();

    if(!headers){
        return;
    }

    const payment = getSelectedPayment().value;

    fetch(`${apiUrl}/checkout`, {
        method: 'POST',
        headers: headers,
        body: JSON.stringify({
            nama_lengkap: document.getElementById('nama_lengkap').value.trim(),
            no_whatsapp: document.getElementById('no_whatsapp').value.trim(),
            alamat_lengkap: document.getElementById('alamat_lengkap').value.trim(),
            provinsi: getSelectedText(provinsi),
            kota: getSelectedText(kota),
            kecamatan: getSelectedText(kecamatan),
            kode_pos: document.getElementById('kode_pos').value.trim(),
            catatan: document.getElementById('catatan').value.trim(),
            metode_pengiriman: getSelectedShipping().value,
            metode_pembayaran: payment
        })
    })
    .then(async response => {
        const data = await response.json();

        if(response.status === 401){
            localStorage.removeItem('token');
            localStorage.removeItem('role');
            localStorage.removeItem('user');
            alert('Sesi login habis. Silakan login lagi');
            window.location.href = '/login';
            return null;
        }

        if(!response.ok){
            alert(data.message || 'Checkout gagal');
            return null;
        }

        return data;
    })
    .then(data => {
        if(!data){
            return;
        }

        const orderId = data.data.id;

        if(payment === 'QRIS'){
            window.location.href = `/payment-qris/${orderId}`;
            return;
        }

        window.location.href = `/orders/${orderId}`;
    })
    .catch(error => console.log(error));
});

loadKeranjang();
validateCheckoutForm();

</script>

</body>
</html>
