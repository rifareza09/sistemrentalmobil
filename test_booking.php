<!DOCTYPE html>
<html>
<head>
	<title>Test Booking Flow</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			max-width: 800px;
			margin: 50px auto;
			padding: 20px;
			background: #f5f5f5;
		}
		.test-box {
			background: white;
			padding: 20px;
			border-radius: 10px;
			margin: 20px 0;
			box-shadow: 0 2px 10px rgba(0,0,0,0.1);
		}
		.success {
			color: green;
			font-weight: bold;
		}
		.error {
			color: red;
			font-weight: bold;
		}
		.info {
			color: blue;
		}
		button {
			background: #4CAF50;
			color: white;
			padding: 15px 30px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}
		button:hover {
			background: #45a049;
		}
		pre {
			background: #f4f4f4;
			padding: 10px;
			border-radius: 5px;
			overflow-x: auto;
		}
	</style>
</head>
<body>
	<h1>🔧 Test Booking System</h1>
	
	<div class="test-box">
		<h2>Step 1: Test Database Connection</h2>
		<?php
		include('includes/config.php');
		if($koneksidb) {
			echo '<p class="success">✓ Database Connected!</p>';
		} else {
			echo '<p class="error">✗ Database Connection Failed!</p>';
			exit;
		}
		?>
	</div>
	
	<div class="test-box">
		<h2>Step 2: Test Session</h2>
		<?php
		session_start();
		if(isset($_SESSION['ulogin'])) {
			echo '<p class="success">✓ User logged in: ' . $_SESSION['ulogin'] . '</p>';
		} else {
			echo '<p class="error">✗ User not logged in!</p>';
			echo '<p class="info">Please <a href="index.php">login</a> first</p>';
		}
		?>
	</div>
	
	<div class="test-box">
		<h2>Step 3: Test Booking Data</h2>
		<?php
		// Simulate booking data
		$vid = isset($_GET['vid']) ? $_GET['vid'] : 10;
		$mulai = isset($_GET['mulai']) ? $_GET['mulai'] : '2026-01-02';
		$selesai = isset($_GET['selesai']) ? $_GET['selesai'] : '2026-01-05';
		$driver = isset($_GET['driver']) ? $_GET['driver'] : 0;
		$pickup = isset($_GET['pickup']) ? $_GET['pickup'] : 'Ambil Sendiri';
		
		echo '<pre>';
		echo "Vehicle ID: $vid\n";
		echo "Tanggal Mulai: $mulai\n";
		echo "Tanggal Selesai: $selesai\n";
		echo "Driver: $driver\n";
		echo "Pickup: $pickup\n";
		
		// Calculate duration
		$start = new DateTime($mulai);
		$finish = new DateTime($selesai);
		$int = $start->diff($finish);
		$dur = $int->days;
		$durasi = $dur+1;
		
		echo "Durasi: $durasi hari\n";
		echo '</pre>';
		
		if($durasi > 0) {
			echo '<p class="success">✓ Duration calculation OK!</p>';
		}
		?>
	</div>
	
	<div class="test-box">
		<h2>Step 4: Test Vehicle Data</h2>
		<?php
		$sql = "SELECT mobil.*, merek.* FROM mobil, merek WHERE merek.id_merek=mobil.id_merek AND mobil.id_mobil='$vid'";
		$query = mysqli_query($koneksidb, $sql);
		$result = mysqli_fetch_array($query);
		
		if($result) {
			echo '<p class="success">✓ Vehicle found!</p>';
			echo '<pre>';
			echo "Mobil: " . $result['nama_merek'] . " " . $result['nama_mobil'] . "\n";
			echo "Harga: Rp " . number_format($result['harga'], 0, ',', '.') . " /hari\n";
			echo '</pre>';
		} else {
			echo '<p class="error">✗ Vehicle not found!</p>';
		}
		?>
	</div>
	
	<div class="test-box">
		<h2>Step 5: Test Library Functions</h2>
		<?php
		include('includes/library.php');
		if(function_exists('buatKode')) {
			echo '<p class="success">✓ buatKode() function exists</p>';
			$testKode = buatKode("booking", "TRX");
			echo '<p class="info">Generated Code: ' . $testKode . '</p>';
		} else {
			echo '<p class="error">✗ buatKode() function not found!</p>';
		}
		?>
	</div>
	
	<div class="test-box">
		<h2>Step 6: Direct Test Booking</h2>
		<p class="info">Click button below to test direct booking:</p>
		<form method="GET" action="booking_ready.php">
			<input type="hidden" name="vid" value="<?php echo $vid; ?>">
			<input type="hidden" name="mulai" value="<?php echo $mulai; ?>">
			<input type="hidden" name="selesai" value="<?php echo $selesai; ?>">
			<input type="hidden" name="driver" value="<?php echo $driver; ?>">
			<input type="hidden" name="pickup" value="<?php echo $pickup; ?>">
			<button type="submit">Go to Booking Confirmation Page</button>
		</form>
	</div>
	
	<div class="test-box">
		<h2>Debug Info</h2>
		<p class="info">Current URL:</p>
		<pre><?php echo $_SERVER['REQUEST_URI']; ?></pre>
		
		<p class="info">PHP Version:</p>
		<pre><?php echo phpversion(); ?></pre>
		
		<p class="info">MySQL Version:</p>
		<pre><?php echo mysqli_get_server_info($koneksidb); ?></pre>
	</div>
	
	<hr>
	<p><a href="index.php">← Back to Home</a></p>
</body>
</html>
