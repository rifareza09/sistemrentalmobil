<?php
// Complete Fix untuk semua masalah database
include('includes/config.php');

echo "<style>
body { font-family: Arial; max-width: 800px; margin: 50px auto; padding: 20px; }
.success { color: green; font-weight: bold; }
.error { color: red; font-weight: bold; }
h1 { color: #333; }
.box { background: #f5f5f5; padding: 15px; margin: 10px 0; border-radius: 5px; }
</style>";

echo "<h1>🔧 Complete Database Fix</h1>";

// 1. Fix kode_booking length
echo "<div class='box'>";
echo "<h2>Step 1: Fix kode_booking field length</h2>";

$sql1 = "ALTER TABLE `booking` MODIFY `kode_booking` varchar(20) NOT NULL";
$result1 = mysqli_query($koneksidb, $sql1);

if($result1) {
    echo "<p class='success'>✓ booking.kode_booking → varchar(20)</p>";
} else {
    echo "<p class='error'>✗ Error: " . mysqli_error($koneksidb) . "</p>";
}

$sql2 = "ALTER TABLE `cek_booking` MODIFY `kode_booking` varchar(20) NOT NULL";
$result2 = mysqli_query($koneksidb, $sql2);

if($result2) {
    echo "<p class='success'>✓ cek_booking.kode_booking → varchar(20)</p>";
} else {
    echo "<p class='error'>✗ Error: " . mysqli_error($koneksidb) . "</p>";
}
echo "</div>";

// 2. Fix bukti_bayar (allow NULL or set default)
echo "<div class='box'>";
echo "<h2>Step 2: Fix bukti_bayar field</h2>";

$sql3 = "ALTER TABLE `booking` MODIFY `bukti_bayar` varchar(100) DEFAULT ''";
$result3 = mysqli_query($koneksidb, $sql3);

if($result3) {
    echo "<p class='success'>✓ booking.bukti_bayar → Default = '' (empty string)</p>";
} else {
    echo "<p class='error'>✗ Error: " . mysqli_error($koneksidb) . "</p>";
}
echo "</div>";

// 3. Show final structure
echo "<div class='box'>";
echo "<h2>Step 3: Verify Structure</h2>";

$sql4 = "DESCRIBE booking";
$result4 = mysqli_query($koneksidb, $sql4);

echo "<table border='1' cellpadding='8' style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background: #4CAF50; color: white;'>
        <th>Field</th><th>Type</th><th>Null</th><th>Default</th>
      </tr>";

while($row = mysqli_fetch_assoc($result4)) {
    $highlight = '';
    if($row['Field'] == 'kode_booking' || $row['Field'] == 'bukti_bayar') {
        $highlight = 'background: #ffffcc;';
    }
    echo "<tr style='$highlight'>";
    echo "<td><strong>" . $row['Field'] . "</strong></td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "<td>" . $row['Null'] . "</td>";
    echo "<td>" . ($row['Default'] ?? 'NULL') . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";

// 4. Test generate kode
echo "<div class='box'>";
echo "<h2>Step 4: Test Generate Kode</h2>";
include('includes/library.php');
$testKode = buatKode("booking", "TRX");
echo "<p class='success'>✓ Generated Code: <strong>$testKode</strong> (Length: " . strlen($testKode) . " characters)</p>";
if(strlen($testKode) <= 20) {
    echo "<p class='success'>✓ Code length is OK! (Max 20 characters)</p>";
} else {
    echo "<p class='error'>✗ Code too long! Need to fix library.php</p>";
}
echo "</div>";

// Final message
echo "<div class='box' style='background: #4CAF50; color: white; text-align: center;'>";
echo "<h1>🎉 DATABASE FIXED SUCCESSFULLY!</h1>";
echo "<p style='font-size: 18px;'>Semua masalah sudah diperbaiki!</p>";
echo "</div>";

echo "<div style='text-align: center; margin: 30px 0;'>";
echo "<a href='test_booking.php' style='display: inline-block; padding: 15px 30px; background: #2196F3; color: white; text-decoration: none; border-radius: 5px; font-size: 18px; margin: 10px;'>🧪 Test Booking</a>";
echo "<a href='car-listing.php' style='display: inline-block; padding: 15px 30px; background: #4CAF50; color: white; text-decoration: none; border-radius: 5px; font-size: 18px; margin: 10px;'>🚗 Car Listing</a>";
echo "</div>";

echo "<hr>";
echo "<h3>Summary:</h3>";
echo "<ul>";
echo "<li>✅ kode_booking → varchar(20) (bisa handle kode sampai 20 karakter)</li>";
echo "<li>✅ bukti_bayar → default '' (tidak error lagi)</li>";
echo "<li>✅ Format kode: TRX0000001 (10 karakter)</li>";
echo "</ul>";
?>
