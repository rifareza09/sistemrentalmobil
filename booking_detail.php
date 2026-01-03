<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
}else{
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Rental Mobill</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
.success-animation {
	margin: 20px auto;
	text-align: center;
}
.checkmark {
	width: 80px;
	height: 80px;
	border-radius: 50%;
	display: block;
	stroke-width: 3;
	stroke: #4CAF50;
	stroke-miterlimit: 10;
	box-shadow: inset 0px 0px 0px #4CAF50;
	animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
	margin: 0 auto;
}
.checkmark__circle {
	stroke-dasharray: 166;
	stroke-dashoffset: 166;
	stroke-width: 3;
	stroke-miterlimit: 10;
	stroke: #4CAF50;
	fill: none;
	animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}
.checkmark__check {
	transform-origin: 50% 50%;
	stroke-dasharray: 48;
	stroke-dashoffset: 48;
	animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}
@keyframes stroke {
	100% {
		stroke-dashoffset: 0;
	}
}
@keyframes scale {
	0%, 100% {
		transform: none;
	}
	50% {
		transform: scale3d(1.1, 1.1, 1);
	}
}
@keyframes fill {
	100% {
		box-shadow: inset 0px 0px 0px 30px #4CAF50;
	}
}
.success-message {
	color: #4CAF50;
	font-size: 24px;
	font-weight: bold;
	margin: 20px 0;
	animation: fadeIn 1s;
}
.booking-info {
	background: #f8f9fa;
	padding: 20px;
	border-radius: 10px;
	margin: 20px 0;
	box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
@keyframes fadeIn {
	from { opacity: 0; transform: translateY(20px); }
	to { opacity: 1; transform: translateY(0); }
}
.alert-success-custom {
	background-color: #d4edda;
	border-color: #c3e6cb;
	color: #155724;
	padding: 15px;
	border-radius: 5px;
	margin: 20px 0;
}
</style>  
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>

<?php 
$kode=mysqli_real_escape_string($koneksidb, $_GET['kode']);
$sql1 	= "SELECT booking.*,mobil.*, merek.* FROM booking,mobil,merek WHERE booking.id_mobil=mobil.id_mobil AND merek.id_merek=mobil.id_merek and booking.kode_booking='$kode'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
if(!$result) {
	echo "<script>alert('Booking tidak ditemukan!');</script>";
	echo "<script>window.location.href='index.php';</script>";
	exit;
}
$harga	= $result['harga'];
$durasi = $result['durasi'];
$totalmobil = $durasi*$harga;
$drivercharges = $result['driver'];
$totalsewa = $totalmobil+$drivercharges;
$tglmulai = strtotime($result['tgl_mulai']);
$jmlhari  = 86400*1;
$tgl	  = $tglmulai-$jmlhari;
$tglhasil = date("Y-m-d",$tgl);
?>
<section class="user_profile inner_pages">
	<div class="container">
		<!-- Success Animation -->
		<?php if(isset($_GET['success']) && $_GET['success'] == '1'): ?>
		<div class="success-animation">
			<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
				<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
				<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
			</svg>
			<h2 class="success-message">Booking Berhasil!</h2>
			<p style="font-size: 16px; color: #666;">
				Terima kasih telah melakukan booking. Silakan lakukan pembayaran sesuai instruksi di bawah.
			</p>
		</div>
		<?php endif; ?>
		
		<center><h3>Detail Booking Sewa Mobil</h3></center>
		<hr/>
	<div class="user_profile_info">	
		<div class="col-md-12 col-sm-10">
        <form method="post" name="sewa" onSubmit="return valid();"> 
			<input type="hidden" class="form-control" name="vid"  value="<?php echo $vid;?>"required>
            <div class="form-group">
			<label>Kode Sewa</label>
				<input type="text" class="form-control" name="mobil" value="<?php echo $result['kode_booking'];?>"readonly>
            </div>
			<input type="hidden" class="form-control" name="vid"  value="<?php echo $vid;?>"required>
            <div class="form-group">
			<label>Mobil</label>
				<input type="text" class="form-control" name="mobil" value="<?php echo $result['nama_merek']; echo ", "; echo $result['nama_mobil'];?>"readonly>
            </div>
            <div class="form-group">
			<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?php echo $result['tgl_mulai'];?>"readonly>
            </div>
            <div class="form-group">
			<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?php echo $result['tgl_selesai'];?>"readonly>
            </div>
            <div class="form-group">
			<label>Durasi</label>
				<input type="text" class="form-control" name="durasi" value="<?php echo $durasi;?> Hari"readonly>
            </div>
            <div class="form-group">
			<label>Biaya Mobil (<?php echo $durasi;?> Hari)</label><br/>
				<input type="text" class="form-control" name="biayamobil" value="<?php echo format_rupiah($totalmobil);?>"readonly>
            </div>
            <div class="form-group">
			<label>Biaya Driver (<?php echo $durasi;?> Hari)</label><br/>
				<input type="hidden" class="form-control" name="biayadriver" value="<?php echo $drivercharges;?>"readonly>
				<input type="text" class="form-control" name="driver" value="<?php echo format_rupiah($drivercharges);?>"readonly>
            </div>
            <div class="form-group">
			<label>Total Biaya Sewa (<?php echo $durasi;?> Hari)</label><br/>
				<input type="text" class="form-control" name="total" value="<?php echo format_rupiah($totalsewa);?>"readonly>
            </div>
			<?php if($result['status']=="Menunggu Pembayaran"){
				$sqlrek 	= "SELECT * FROM tblpages WHERE id='5'";
				$queryrek = mysqli_query($koneksidb,$sqlrek);
				$resultrek = mysqli_fetch_array($queryrek);
				?>
			<div class="alert-success-custom">
				<h4 style="margin-top: 0;"><i class="fa fa-info-circle"></i> Instruksi Pembayaran</h4>
				<p><strong>Silahkan transfer total biaya sewa ke:</strong></p>
				<p style="font-size: 18px; font-weight: bold; color: #155724;"><?php echo $resultrek['detail'];?></p>
				<p><strong>Batas Waktu Pembayaran:</strong> <?php echo IndonesiaTgl($tglhasil);?></p>
				<hr>
				<p><i class="fa fa-warning"></i> Setelah transfer, silahkan upload bukti pembayaran di menu <strong>Riwayat Sewa</strong></p>
			</div>
			<?php
			}else{
				echo '<div class="alert alert-info"><i class="fa fa-check-circle"></i> Status: <strong>'.$result['status'].'</strong></div>';
			}?>
			<br/>			
			<div class="form-group">
				<a href="detail_cetak.php?kode=<?php echo $kode;?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Detail Booking</a>
				<a href="riwayatsewa.php" class="btn btn-success"><i class="fa fa-history"></i> Lihat Riwayat Sewa</a>
				<a href="car-listing.php" class="btn btn-default"><i class="fa fa-car"></i> Lihat Mobil Lain</a>
			</div>
        </form>
		</div>
		</div>
      </div>
</section>
<!--/my-vehicles--> 
<?php include('includes/footer.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>