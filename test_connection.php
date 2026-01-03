<?php
// Test Database Connection
include('includes/config.php');

echo "<h2>Test Koneksi Database</h2>";

if ($koneksidb) {
    echo "<p style='color: green;'>✓ Koneksi database berhasil!</p>";
    
    // Test query
    $sql = "SELECT COUNT(*) as total FROM users";
    $result = mysqli_query($koneksidb, $sql);
    if($result) {
        $row = mysqli_fetch_assoc($result);
        echo "<p>✓ Total users: " . $row['total'] . "</p>";
    }
    
    $sql = "SELECT COUNT(*) as total FROM mobil";
    $result = mysqli_query($koneksidb, $sql);
    if($result) {
        $row = mysqli_fetch_assoc($result);
        echo "<p>✓ Total mobil: " . $row['total'] . "</p>";
    }
    
    $sql = "SELECT COUNT(*) as total FROM booking";
    $result = mysqli_query($koneksidb, $sql);
    if($result) {
        $row = mysqli_fetch_assoc($result);
        echo "<p>✓ Total booking: " . $row['total'] . "</p>";
    }
    
    echo "<p style='color: green;'><strong>Database berfungsi dengan baik!</strong></p>";
} else {
    echo "<p style='color: red;'>✗ Koneksi database gagal!</p>";
    echo "<p>Error: " . mysqli_connect_error() . "</p>";
}

// Test folder structure
echo "<h2>Test Struktur Folder</h2>";

$folders = [
    'image',
    'image/id',
    'admin/img',
    'admin/img/vehicleimages',
    'assets',
    'includes'
];

foreach($folders as $folder) {
    if(is_dir($folder)) {
        if(is_writable($folder)) {
            echo "<p style='color: green;'>✓ Folder '$folder' ada dan dapat ditulis</p>";
        } else {
            echo "<p style='color: orange;'>⚠ Folder '$folder' ada tapi tidak dapat ditulis</p>";
        }
    } else {
        echo "<p style='color: red;'>✗ Folder '$folder' tidak ada</p>";
        if(mkdir($folder, 0777, true)) {
            echo "<p style='color: green;'>✓ Folder '$folder' berhasil dibuat</p>";
        }
    }
}

echo "<h2>Test Session</h2>";
session_start();
if(isset($_SESSION['test'])) {
    echo "<p style='color: green;'>✓ Session berfungsi</p>";
} else {
    $_SESSION['test'] = true;
    echo "<p style='color: green;'>✓ Session berhasil dimulai</p>";
}

echo "<hr>";
echo "<p><a href='index.php'>Kembali ke Halaman Utama</a></p>";
?>
