# 🚗 PANDUAN TESTING SISTEM RENTAL MOBIL

## ⚡ QUICK START

### 1️⃣ Setup Database
```
1. Buka phpMyAdmin: http://localhost/phpmyadmin
2. Buat database: rental_eria
3. Import: database/rental_eria.sql
```

### 2️⃣ Setup Folder
```
Akses: http://localhost/Sistem%20informasi%20rental%20mobil/setup_folders.php
```

### 3️⃣ Test Koneksi
```
Akses: http://localhost/Sistem%20informasi%20rental%20mobil/test_connection.php
```

---

## 🔑 LOGIN CREDENTIALS

### ADMIN
- URL: `/admin/`
- Username: `admin`
- Password: `admin`

### USER (Sample)
- Daftar user baru via menu Register
- Atau gunakan data dari database

---

## ✅ CHECKLIST TESTING

### 🏠 USER SIDE

#### Halaman Publik (Tidak Perlu Login)
- [ ] Homepage - Lihat daftar mobil
- [ ] Car Listing - Semua mobil tersedia
- [ ] Vehicle Details - Detail mobil
- [ ] About Us
- [ ] Contact Us
- [ ] FAQs

#### Autentikasi
- [ ] Register user baru
  - Upload foto KTP
  - Upload foto KK
  - Validasi email unique
  - Validasi password match
- [ ] Login user
  - Email & password benar
  - Error jika salah
- [ ] Logout

#### Fitur User (Harus Login)
- [ ] **Profile Management**
  - Lihat profile
  - Edit nama, telp, alamat
  - Ganti foto KTP
  - Ganti foto KK
  
- [ ] **Update Password**
  - Ganti password
  - Validasi old password
  - Confirm new password

- [ ] **Booking Mobil**
  - Pilih mobil dari listing
  - Set tanggal mulai & selesai
  - Pilih metode pickup
  - Pilih dengan/tanpa driver
  - Cek ketersediaan
  - Konfirmasi booking
  - Lihat detail booking
  
- [ ] **Riwayat Sewa**
  - Lihat semua booking
  - Filter by status
  - Detail setiap booking
  - Upload bukti pembayaran

---

### 👨‍💼 ADMIN SIDE

#### Login Admin
- [ ] Login dengan username & password
- [ ] Redirect ke dashboard
- [ ] Logout

#### Dashboard
- [ ] Statistik booking:
  - Menunggu pembayaran
  - Menunggu konfirmasi
  - Belum dikembalikan
- [ ] Statistik master data:
  - Total merek
  - Total mobil
  - Total sewa
  - Total user
  - Total contact queries

#### Kelola Merek Mobil
- [ ] Lihat daftar merek
- [ ] Tambah merek baru
- [ ] Edit merek
- [ ] Hapus merek

#### Kelola Mobil
- [ ] Lihat daftar mobil
- [ ] Tambah mobil baru:
  - Pilih merek
  - Input nama, nopol, deskripsi
  - Set harga per hari
  - Upload 5 foto mobil
  - Set fitur mobil (AC, power steering, etc)
- [ ] Edit mobil
- [ ] Ganti foto mobil (5 gambar)
- [ ] Hapus mobil

#### Kelola User
- [ ] Lihat daftar user
- [ ] Lihat detail user
- [ ] Edit user
- [ ] Hapus user

#### Kelola Booking
- [ ] **Menunggu Pembayaran**
  - Lihat daftar
  - Lihat detail
  - Cancel booking
  
- [ ] **Menunggu Konfirmasi**
  - Lihat bukti bayar
  - Approve/Reject pembayaran
  
- [ ] **Belum Dikembalikan**
  - Lihat mobil yang sedang disewa
  - Proses pengembalian
  - Input kondisi mobil

- [ ] **Semua Booking**
  - Lihat semua transaksi
  - Filter by status

#### Pages Management
- [ ] Update About Us
- [ ] Update Terms & Conditions
- [ ] Update FAQs
- [ ] Update Contact Info

#### Contact Queries
- [ ] Lihat pesan dari user
- [ ] Mark as read
- - Hapus query

#### Laporan
- [ ] Generate laporan booking
- [ ] Filter by tanggal
- [ ] Print laporan

---

## 🧪 TEST CASES KHUSUS

### Test 1: Booking Mobil yang Sudah Disewa
**Tujuan:** Cek sistem pencegahan double booking

1. User A booking mobil ID 10 tanggal 10-01-2026 s/d 12-01-2026
2. User B coba booking mobil yang sama di tanggal overlap
3. **Expected:** Sistem menolak dengan pesan "Mobil tidak tersedia"

### Test 2: Upload File
**Tujuan:** Cek upload foto berfungsi

1. Register user baru
2. Upload KTP (format: JPG/PNG, max 2MB)
3. Upload KK (format: JPG/PNG, max 2MB)
4. **Expected:** File tersimpan di folder `image/id/`

### Test 3: Perhitungan Biaya
**Tujuan:** Cek kalkulasi harga booking

1. Booking mobil harga 450.000/hari
2. Durasi 3 hari
3. Dengan driver (450.000/hari)
4. **Expected:** 
   - Biaya mobil: 1.350.000
   - Biaya driver: 1.350.000
   - Total: 2.700.000

### Test 4: SQL Injection Prevention
**Tujuan:** Cek keamanan dari SQL injection

1. Login dengan email: `' OR '1'='1`
2. **Expected:** Login gagal (tidak bisa bypass)

### Test 5: Session Management
**Tujuan:** Cek session handling

1. Login sebagai user
2. Copy URL halaman profile
3. Logout
4. Paste URL profile
5. **Expected:** Redirect ke homepage (akses ditolak)

---

## 🐛 BUG REPORT TEMPLATE

Jika menemukan bug saat testing, catat dengan format:

```
BUG ID: #001
Halaman: [nama halaman]
Langkah Reproduksi:
1. [langkah 1]
2. [langkah 2]
3. [langkah 3]

Expected Result: [apa yang seharusnya terjadi]
Actual Result: [apa yang terjadi]
Severity: [Critical/High/Medium/Low]
Screenshot: [lampirkan jika ada]
```

---

## 📱 TEST DEVICES

### Browser Testing
- [ ] Chrome
- [ ] Firefox
- [ ] Edge
- [ ] Safari (jika ada Mac)

### Responsive Testing
- [ ] Desktop (1920x1080)
- [ ] Tablet (768x1024)
- [ ] Mobile (375x667)

---

## ⚠️ KNOWN ISSUES

1. **Error Reporting OFF**: Beberapa file menggunakan `error_reporting(0)`
2. **MD5 Password**: Gunakan password yang kuat, MD5 sudah tidak aman
3. **File Upload**: Belum ada validasi MIME type detail

---

## 📞 SUPPORT

Jika ada error atau pertanyaan:
1. Cek file: `LAPORAN_PERBAIKAN.md` untuk detail perbaikan
2. Run: `test_connection.php` untuk cek sistem
3. Cek error log: Laragon > PHP error log

---

## ✅ HASIL TESTING

Setelah testing selesai, isi checklist ini:

- [ ] Semua fitur user berfungsi
- [ ] Semua fitur admin berfungsi
- [ ] Database connection stable
- [ ] Upload file berhasil
- [ ] Session management bekerja
- [ ] No SQL injection vulnerability
- [ ] Responsive di semua device

**Catatan:**
```
[Tulis catatan hasil testing di sini]
```

---

**Testing Guide Version 1.0**
**Last Updated: 01 Januari 2026**
