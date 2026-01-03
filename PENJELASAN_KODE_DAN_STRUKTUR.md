# Penjelasan Struktur dan Kode Sistem Informasi Rental Mobil

Dokumen ini berisi penjelasan detail mengenai struktur folder, file penting, dan fungsi kode utama untuk keperluan presentasi ke dosen.

## 1. Struktur Folder Utama

*   **`admin/`**: Folder khusus halaman administrator. Berisi file untuk dashboard, manajemen mobil, manajemen user, dan laporan transaksi. User biasa tidak bisa mengakses file di sini tanpa login admin.
*   **`assets/`**: Menyimpan file "statis" yang mempercantik tampilan, seperti:
    *   `css/`: Mengatur warna, layout, dan font.
    *   `js/`: Script untuk animasi dan interaksi (misal: slider gambar).
    *   `fonts/`: Ikon-ikon (seperti ikon mobil, user, kalender).
*   **`includes/`**: Berisi potongan kode modular yang dipanggil berulang kali.
    *   Contoh: `header.php` (menu atas), `footer.php` (bagian bawah), `config.php` (koneksi database).
*   **`image/`** & **`admin/img/`**: Tempat penyimpanan file gambar mobil yang diupload oleh admin.

---

## 2. Penjelasan Kode Penting (Bedah Kode)

Berikut adalah penjelasan fungsi dari potongan kode yang sering muncul di aplikasi ini.

### A. Koneksi Database (`includes/config.php`)
File ini adalah "kunci" agar aplikasi bisa bicara dengan database.

```php
$myHost = "localhost";
$myUser = "root";
$myPass = "";
$myDbs  = "rental_eria";

$koneksidb = mysqli_connect( $myHost, $myUser, $myPass, $myDbs);
```
*   **Penjelasan**:
    *   Variabel `$myHost`, `$myUser`, dll menyimpan kredensial database.
    *   **`mysqli_connect()`**: Fungsi bawaan PHP untuk membuka jalur komunikasi ke MySQL.
    *   Variabel **`$koneksidb`** akan dipakai terus-menerus di file lain saat ingin mengambil atau menyimpan data.

### B. Proteksi Halaman / Cek Login (`booking.php`, `admin/dashboard.php`)
Kode ini memastikan hanya user yang berhak yang bisa melihat halaman tertentu.

```php
session_start();
if(strlen($_SESSION['ulogin'])==0){
    header('location:index.php');
}
```
*   **Penjelasan**:
    *   **`session_start()`**: Memulai sesi browser. Ini memungkinkan server "mengingat" siapa yang sedang login antar halaman.
    *   **`$_SESSION['ulogin']`**: Variabel sesi yang menyimpan email/id user yang login.
    *   **`strlen(...) == 0`**: Mengecek panjang string. Jika 0, artinya kosong (belum login).
    *   **`header('location:index.php')`**: Perintah "tendang" (redirect) user kembali ke halaman depan jika mencoba masuk tanpa login.

### C. Menampilkan Daftar Mobil (`index.php`)
Bagaimana cara menampilkan banyak mobil dari database ke layar?

```php
// 1. Siapkan Query
$sql = "SELECT mobil.*, merek.* FROM mobil, merek WHERE merek.id_merek = mobil.id_merek";
$query = mysqli_query($koneksidb, $sql);

// 2. Looping Data
while($results = mysqli_fetch_array($query)) {
    // HTML Code di sini...
    echo htmlentities($results['nama_mobil']);
}
```
*   **Penjelasan**:
    *   **`SELECT ... JOIN`**: Kita mengambil data dari tabel `mobil` dan `merek` sekaligus. `WHERE merek.id_merek = mobil.id_merek` menghubungkan kedua tabel agar kita dapat nama mereknya (misal "Toyota"), bukan cuma ID angka.
    *   **`while($results = ...)`**: Ini adalah perulangan. Selama database masih memberikan baris data, kode di dalam kurung kurawal `{}` akan dijalankan. Ini yang membuat daftar mobil muncul berderet otomatis meskipun jumlahnya ada 100.
    *   **`htmlentities()`**: Fungsi keamanan untuk membersihkan teks dari database sebelum ditampilkan, mencegah serangan kode berbahaya (XSS).

### D. Logika Cek Ketersediaan Mobil (`booking.php`)
Ini adalah "otak" dari sistem rental untuk mencegah bentrok jadwal.

```php
$sql = "SELECT kode_booking FROM cek_booking 
        WHERE tgl_booking BETWEEN '$fromdate' AND '$todate' 
        AND id_mobil='$vid' AND status!='Cancel'";

$query = mysqli_query($koneksidb, $sql);

if(mysqli_num_rows($query) > 0) {
    echo "Mobil tidak tersedia...";
}
```
*   **Penjelasan**:
    *   **`BETWEEN '$fromdate' AND '$todate'`**: Query ini bertanya ke database: "Ada gak sih booking untuk mobil ini di rentang tanggal yang diminta user?"
    *   **`mysqli_num_rows($query) > 0`**: Jika database menjawab "Ada" (jumlah baris > 0), maka sistem akan menolak booking baru tersebut.

### E. Menghitung Statistik Admin (`admin/dashboard.php`)
Untuk menampilkan angka-angka di dashboard admin.

```php
$sqlbayar = "SELECT kode_booking FROM booking WHERE status='Menunggu Pembayaran'";
$querybayar = mysqli_query($koneksidb, $sqlbayar);
$bayar = mysqli_num_rows($querybayar);
```
*   **Penjelasan**:
    *   Query hanya mengambil data dengan status tertentu.
    *   **`mysqli_num_rows`**: Menghitung total baris yang ditemukan. Hasilnya disimpan di variabel `$bayar` untuk langsung ditampilkan sebagai angka statistik.
