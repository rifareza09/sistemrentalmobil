<?php
// Script untuk membuat folder yang diperlukan

echo "<h2>Setup Folder untuk Sistem Rental Mobil</h2>";

$folders = [
    'image',
    'image/id',
    'admin/img',
    'admin/img/vehicleimages',
    'assets',
    'assets/images',
    'assets/css',
    'assets/js'
];

echo "<h3>Membuat folder yang diperlukan:</h3>";

foreach($folders as $folder) {
    if(!is_dir($folder)) {
        if(mkdir($folder, 0777, true)) {
            echo "<p style='color: green;'>✓ Folder '$folder' berhasil dibuat</p>";
        } else {
            echo "<p style='color: red;'>✗ Gagal membuat folder '$folder'</p>";
        }
    } else {
        echo "<p style='color: blue;'>• Folder '$folder' sudah ada</p>";
        
        // Set permissions
        if(chmod($folder, 0777)) {
            echo "<p style='color: green;'>✓ Permission folder '$folder' berhasil diupdate</p>";
        }
    }
}

echo "<hr>";
echo "<h3>Setup selesai!</h3>";
echo "<p><a href='test_connection.php'>Test Koneksi Database</a></p>";
echo "<p><a href='index.php'>Kembali ke Halaman Utama</a></p>";
?>
