<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');

if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
	exit;
}else{

if(isset($_POST['submit'])){
$fromdate=mysqli_real_escape_string($koneksidb, $_POST['fromdate']);
$todate=mysqli_real_escape_string($koneksidb, $_POST['todate']);
$durasi=mysqli_real_escape_string($koneksidb, $_POST['durasi']);
$pickup=mysqli_real_escape_string($koneksidb, $_POST['pickup']);
$vid=mysqli_real_escape_string($koneksidb, $_POST['vid']);
$email=mysqli_real_escape_string($koneksidb, $_POST['email']);
$biayadriver=mysqli_real_escape_string($koneksidb, $_POST['biayadriver']);

// Generate kode booking
$kode = buatKode("booking", "TRX");

// Debug: tampilkan panjang kode
// echo "Generated code: $kode (length: " . strlen($kode) . ")";

$status = "Menunggu Pembayaran";
$bukti = ""; // Set empty string untuk bukti bayar
$cek=0;
$tgl=date('Y-m-d');

//insert - TAMBAHKAN bukti_bayar ke query!
$sql 	= "INSERT INTO booking (kode_booking,id_mobil,tgl_mulai,tgl_selesai,durasi,driver,status,email,pickup,tgl_booking,bukti_bayar)
			VALUES('$kode','$vid','$fromdate','$todate','$durasi','$biayadriver','$status','$email','$pickup','$tgl','$bukti')";
$query 	= mysqli_query($koneksidb,$sql);

if($query){
	for($cek;$cek<$durasi;$cek++){
		$tglmulai = strtotime($fromdate);
		$jmlhari  = 86400*$cek;
		$tgl	  = $tglmulai+$jmlhari;
		$tglhasil = date("Y-m-d",$tgl);
		$sql1	="INSERT INTO cek_booking (kode_booking,id_mobil,tgl_booking,status)VALUES('$kode','$vid','$tglhasil','$status')";
		$query1 = mysqli_query($koneksidb,$sql1);
	}
	// Redirect dengan header
	header("Location: booking_detail.php?kode=$kode&success=1");
	exit;
}else{
	$error_msg = mysqli_error($koneksidb);
	echo "<script>alert('Error Database: $error_msg');</script>";
	echo "<script>console.log('SQL Error: $error_msg');</script>";
}
}
?>

  <!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Mutiara Motor Car Rental Portal</title>
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
<style>
/* Loading Overlay */
.loading-overlay {
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.8);
	z-index: 9999;
	justify-content: center;
	align-items: center;
}
.loading-overlay.active {
	display: flex;
}
.loading-content {
	text-align: center;
	color: white;
}
.spinner {
	border: 5px solid #f3f3f3;
	border-top: 5px solid #3498db;
	border-radius: 50%;
	width: 60px;
	height: 60px;
	animation: spin 1s linear infinite;
	margin: 0 auto 20px;
}
@keyframes spin {
	0% { transform: rotate(0deg); }
	100% { transform: rotate(360deg); }
}
.price-highlight {
	background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
	color: white;
	padding: 20px;
	border-radius: 10px;
	margin: 20px 0;
	box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}
.booking-summary {
	background: #f8f9fa;
	padding: 20px;
	border-radius: 10px;
	margin: 20px 0;
}
</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Booking</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Booking</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 
<div>
	<br/>
	<center><h3>Mobil Tersedia untuk disewa.</h3></center>
	<hr>
</div>
<?php
$email=$_SESSION['ulogin']; 
$vid=mysqli_real_escape_string($koneksidb, $_GET['vid']);
$mulai=mysqli_real_escape_string($koneksidb, $_GET['mulai']);
$selesai=mysqli_real_escape_string($koneksidb, $_GET['selesai']);
$driver=mysqli_real_escape_string($koneksidb, $_GET['driver']);
$pickup=mysqli_real_escape_string($koneksidb, $_GET['pickup']);
$start = new DateTime($mulai);
$finish = new DateTime($selesai);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur+1;
//menarik biaya driver dari database
$sqldriver = "SELECT * FROM tblpages WHERE id='0'";
$querydriver = mysqli_query($koneksidb,$sqldriver);
$resultdriver = mysqli_fetch_array($querydriver);
$drive=$resultdriver['detail'];
if($driver=="1"){
	$drivercharges = $drive*$durasi;
}else{
	$drivercharges = 0;
}
$sql1 	= "SELECT mobil.*,merek.* FROM mobil,merek WHERE merek.id_merek=mobil.id_merek and mobil.id_mobil='$vid'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];
$totalmobil = $durasi*$harga;
$totalsewa = $totalmobil+$drivercharges;
?>
	<section class="user_profile inner_pages">
	<div class="container">
	<div class="col-md-6 col-sm-8">
	      <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="Image" /> </a> </div>
          <div class="product-listing-content">
            <h5><?php echo htmlentities($result['nama_merek']);?> , <?php echo htmlentities($result['nama_mobil']);?></a></h5>
            <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?> / Hari</p>
            <ul>
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result['seating']);?> Seats</li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result['tahun']);?> </li>
              <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result['bb']);?></li>
            </ul>
          </div>	
	</div>
	
	<div class="user_profile_info">	
		<div class="col-md-12 col-sm-10">
        <form method="post" name="sewa" onSubmit="return valid();"> 
			<input type="hidden" class="form-control" name="vid"  value="<?php echo $vid;?>"required>
 			<input type="hidden" class="form-control" name="email"  value="<?php echo $email;?>"required>
            <div class="form-group">
			<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?php echo $mulai;?>"readonly>
            </div>
            <div class="form-group">
			<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?php echo $selesai;?>"readonly>
            </div>
            <div class="form-group">
			<label>Durasi</label>
				<input type="text" class="form-control" value="<?php echo $durasi;?> Hari" readonly>
				<input type="hidden" name="durasi" value="<?php echo $durasi;?>">
            </div>
            <div class="form-group">
			<label>Metode Pickup</label>
				<input type="text" class="form-control" name="pickup" value="<?php echo $pickup;?>" readonly>
            </div>
            <div class="booking-summary">
				<h4><i class="fa fa-file-text"></i> Rincian Biaya</h4>
				<table class="table">
					<tr>
						<td>Biaya Mobil (<?php echo $durasi;?> Hari)</td>
						<td class="text-right"><strong><?php echo format_rupiah($totalmobil);?></strong></td>
					</tr>
					<tr>
						<td>Biaya Driver</td>
						<td class="text-right"><strong><?php echo format_rupiah($drivercharges);?></strong></td>
					</tr>
				</table>
			</div>
            <input type="hidden" name="biayadriver" value="<?php echo $drivercharges;?>">
            <div class="price-highlight">
			<h4 style="margin: 0 0 10px 0;"><i class="fa fa-money"></i> Total Biaya Sewa</h4>
			<h2 style="margin: 0; font-size: 32px;"><?php echo format_rupiah($totalsewa);?></h2>
			<p style="margin: 10px 0 0 0; opacity: 0.9;">Untuk <?php echo $durasi;?> Hari</p>
            </div>
			<br/>			
			<div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-block btn-lg" style="font-size: 18px; padding: 15px;">
					<i class="fa fa-check-circle"></i> Konfirmasi & Sewa Sekarang
				</button>
				<a href="car-listing.php" class="btn btn-default btn-block" style="margin-top: 10px;">
					<i class="fa fa-arrow-left"></i> Kembali Pilih Mobil Lain
				</a>
            </div>
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