# 🚗 SISTEM INFORMASI RENTAL MOBIL - DOKUMENTASI

## 📌 OVERVIEW
Sistem informasi berbasis web untuk manajemen rental mobil dengan fitur:
- Booking mobil online
- Manajemen user dan admin
- Upload dokumen (KTP/KK)
- Tracking status sewa
- Laporan transaksi

---

## 🔧 TEKNOLOGI
- **Backend:** PHP 7.x+
- **Database:** MySQL/MariaDB
- **Frontend:** HTML, CSS, Bootstrap, JavaScript
- **Server:** Apache (Laragon/XAMPP)

---

## 📁 STRUKTUR FOLDER

```
Sistem informasi rental mobil/
│
├── admin/                  # Panel admin
│   ├── includes/          # Config & functions admin
│   ├── img/              # Images & vehicle photos
│   ├── css/              # Admin styles
│   └── js/               # Admin scripts
│
├── assets/                # Frontend assets
│   ├── css/              # Styles
│   ├── js/               # Scripts
│   └── images/           # Public images
│
├── database/             # SQL database file
│   └── rental_eria.sql
│
├── image/                # User uploads
│   └── id/              # KTP & KK photos
│
├── includes/             # Shared includes
│   ├── config.php       # Database config
│   ├── header.php       # Header template
│   ├── footer.php       # Footer template
│   ├── login.php        # Login modal
│   └── library.php      # Helper functions
│
├── *.php                # Main pages (user side)
│
├── test_connection.php  # Testing tool
├── setup_folders.php    # Setup tool
├── LAPORAN_PERBAIKAN.md # Bug report
└── TESTING_GUIDE.md     # Testing guide
```

---

## ⚙️ INSTALASI

### 1. Requirements
- Laragon/XAMPP dengan PHP 7.x+
- MySQL/MariaDB
- Browser modern (Chrome, Firefox, Edge)

### 2. Setup Steps

**A. Database**
```sql
1. Buka phpMyAdmin
2. Create database: rental_eria
3. Import: database/rental_eria.sql
```

**B. Config Database** (sudah dikonfigurasi)
```php
File: includes/config.php
- Host: localhost
- User: root
- Password: (kosong)
- Database: rental_eria
```

**C. Folder Structure**
```
Jalankan: http://localhost/Sistem%20informasi%20rental%20mobil/setup_folders.php
```

**D. Test System**
```
Akses: http://localhost/Sistem%20informasi%20rental%20mobil/test_connection.php
```

---

## 👥 USER ROLES

### 1. **ADMIN**
**Login:** `/admin/`
- Username: `admin`
- Password: `admin`

**Akses:**
- Dashboard & statistik
- Kelola merek mobil
- Kelola data mobil
- Kelola user
- Kelola booking & pembayaran
- Manajemen pages (About, Terms, FAQs)
- Generate laporan

### 2. **USER/CUSTOMER**
**Login:** `/` (homepage)
- Register terlebih dahulu atau gunakan data existing

**Akses:**
- Browse daftar mobil
- Booking mobil
- Upload bukti bayar
- Riwayat sewa
- Update profile
- Ganti password
- Contact support

---

## 🎯 FITUR UTAMA

### User Side
1. **Registrasi** - Daftar dengan email, password, upload KTP & KK
2. **Login/Logout** - Autentikasi user
3. **Car Listing** - Lihat semua mobil tersedia
4. **Vehicle Details** - Detail spesifikasi mobil
5. **Booking System** - Pilih tanggal, driver, metode pickup
6. **Availability Check** - Cek ketersediaan mobil real-time
7. **Payment** - Upload bukti transfer
8. **Booking History** - Track semua transaksi
9. **Profile Management** - Update data pribadi
10. **Change Password** - Ganti password
11. **Contact Us** - Kirim pesan ke admin

### Admin Side
1. **Dashboard** - Overview statistik sistem
2. **Brand Management** - CRUD merek mobil
3. **Vehicle Management** - CRUD data mobil + upload 5 foto
4. **User Management** - View, edit, delete users
5. **Booking Management:**
   - Pending payment - List yang belum bayar
   - Payment confirmation - Verifikasi bukti bayar
   - Active rentals - Mobil sedang disewa
   - All bookings - History semua transaksi
6. **Pages Management** - Edit halaman About, Terms, FAQs
7. **Contact Queries** - Lihat & kelola pesan masuk
8. **Reports** - Generate laporan transaksi

---

## 🔐 KEAMANAN

### Yang Sudah Diterapkan:
✅ SQL Injection protection (mysqli_real_escape_string)
✅ Session management
✅ Password hashing (MD5)
✅ File upload validation
✅ Access control (user vs admin)

### Rekomendasi Peningkatan:
⚠️ Upgrade MD5 ke bcrypt/password_hash()
⚠️ Implement CSRF token
⚠️ Add rate limiting untuk login
⚠️ Validasi MIME type upload file
⚠️ HTTPS untuk production

---

## 📊 DATABASE SCHEMA

### Tables:
1. **users** - Data customer/user
2. **admin** - Data administrator
3. **merek** - Brand mobil (Honda, Toyota, dll)
4. **mobil** - Data mobil (nama, harga, foto, fitur)
5. **booking** - Transaksi sewa mobil
6. **cek_booking** - Availability checker
7. **tblpages** - Content pages (About, Terms, etc)
8. **contactus** - Pesan dari visitor
9. **contactusinfo** - Info kontak perusahaan

---

## 🎨 UI/UX

### User Interface:
- **Responsive Design** - Bootstrap framework
- **Color Switcher** - 6 pilihan warna tema
- **Modern Layout** - Clean & professional
- **Mobile Friendly** - Adaptif di semua device

### User Experience:
- **Easy Navigation** - Menu intuitif
- **Clear Feedback** - Alert messages untuk setiap aksi
- **Form Validation** - Client & server side
- **Fast Loading** - Optimized queries

---

## 🚀 DEPLOYMENT

### Development (Localhost)
```
URL: http://localhost/Sistem%20informasi%20rental%20mobil/
```

### Production
1. Upload semua file ke hosting
2. Import database ke MySQL hosting
3. Update `includes/config.php` dengan kredensial hosting
4. Set folder permissions (755 untuk folders, 644 untuk files)
5. Set writable folders: `image/`, `admin/img/`
6. Update base URL jika perlu
7. Test semua fitur

---

## 📞 TROUBLESHOOTING

### Problem: "Database connection failed"
**Solution:**
- Cek kredensial di `includes/config.php`
- Pastikan MySQL service running
- Test dengan `test_connection.php`

### Problem: "Upload file gagal"
**Solution:**
- Jalankan `setup_folders.php`
- Cek permission folder `image/id/` dan `admin/img/vehicleimages/`
- Set chmod 777 jika di Linux

### Problem: "Session tidak jalan"
**Solution:**
- Pastikan `session_start()` ada di setiap halaman
- Cek browser cookies enabled
- Clear browser cache

### Problem: "Mobil tidak muncul"
**Solution:**
- Cek data di table `mobil` dan `merek`
- Pastikan foreign key `id_merek` valid
- Upload foto mobil di admin panel

---

## 📝 CHANGELOG

### Version 1.1 (01-01-2026)
- ✅ Fixed SQL injection vulnerability
- ✅ Fixed session variable inconsistency
- ✅ Fixed typo in success messages
- ✅ Added input validation for checkboxes
- ✅ Created setup & testing tools
- ✅ Added comprehensive documentation

### Version 1.0 (Original)
- Initial release

---

## 📄 LICENSE
Sistem ini dibuat untuk keperluan edukasi dan pembelajaran.

---

## 👨‍💻 CREDITS
- **Original Developer:** [Nama Developer Asli]
- **Bug Fixes & Documentation:** AI Assistant
- **Date:** 01 Januari 2026

---

## 📚 DOKUMENTASI TAMBAHAN

1. **LAPORAN_PERBAIKAN.md** - Detail semua bug yang diperbaiki
2. **TESTING_GUIDE.md** - Panduan testing lengkap
3. **README.md** - File ini

---

## 🆘 SUPPORT

Untuk pertanyaan atau issue:
1. Baca dokumentasi terlebih dahulu
2. Cek file LAPORAN_PERBAIKAN.md
3. Gunakan testing tools yang disediakan
4. Check browser console untuk error JavaScript
5. Check PHP error log di Laragon

---

**Happy Coding! 🚗💨**
