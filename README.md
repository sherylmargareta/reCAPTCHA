# reCAPTCHA - Implementasi Google reCAPTCHA

## 📌 Deskripsi Proyek
reCAPTCHA adalah proyek implementasi mandiri **Google reCAPTCHA** untuk meningkatkan keamanan web dengan mencegah bot melakukan spam pada form. Proyek ini dibuat menggunakan **PHP, HTML, dan JavaScript**.

## 🛠 Tech Stack
- **Backend**: PHP
- **Frontend**: HTML, CSS, JavaScript
- **Keamanan**: Google reCAPTCHA v2
- **Database**: MySQL (db_hash)

## 🚀 Fitur Utama
- **Validasi form dengan Google reCAPTCHA**
- **Mencegah spam dan bot otomatis**
- **Integrasi mudah dengan halaman login atau form lainnya**
- **Penyimpanan data pengguna dalam database MySQL**

## 📥 Cara Instalasi
1. **Clone repository ini:**
   ```bash
   git clone https://github.com/sherylmargareta/reCAPTCHA.git
   ```
2. **Buat akun Google reCAPTCHA** di [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin/create)
3. **Dapatkan Site Key & Secret Key**
4. **Masukkan Site Key di file HTML dan Secret Key di backend PHP**
5. **Buat database MySQL dan impor file SQL**
   - Buka **phpMyAdmin** di `http://localhost/phpmyadmin`
   - Buat database dengan nama **db_hash**
   - Impor file `db_hash.sql` yang terdapat dalam folder proyek
6. **Jalankan proyek di server lokal (XAMPP, WAMP, atau lainnya)**
7. **Akses proyek melalui browser:**
   ```
   http://localhost/db_hash
   ```

## 📸 Screenshot
Tampilan dari implementasi Google reCAPTCHA dapat diakses pada direktori /Screenshot/

## 🔥 Contoh Penggunaan
Tambahkan kode berikut ke halaman HTML untuk mengintegrasikan reCAPTCHA:
```html
<form action="validate.php" method="POST">
    <input type="text" name="username" placeholder="Masukkan username" required>
    <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
    <button type="submit">Submit</button>
</form>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
```

Validasi di backend (PHP):
```php
$secretKey = "YOUR_SECRET_KEY";
$response = $_POST['g-recaptcha-response'];
$remoteIP = $_SERVER['REMOTE_ADDR'];

$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$remoteIP");
$responseData = json_decode($verify);

if ($responseData->success) {
    echo "Verifikasi berhasil!";
} else {
    echo "Verifikasi gagal, coba lagi.";
}
```
Proyek ini dibuat untuk tujuan pembelajaran dan dapat dikembangkan lebih lanjut.
