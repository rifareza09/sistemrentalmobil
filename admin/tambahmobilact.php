<?php
include('includes/config.php');
error_reporting(0);
$vehicletitle=mysqli_real_escape_string($koneksidb, $_POST['vehicletitle']);
$brand=mysqli_real_escape_string($koneksidb, $_POST['brandname']);
$nopol=mysqli_real_escape_string($koneksidb, $_POST['nopol']);
$vehicleoverview=mysqli_real_escape_string($koneksidb, $_POST['vehicalorcview']);
$priceperday=mysqli_real_escape_string($koneksidb, $_POST['priceperday']);
$fueltype=mysqli_real_escape_string($koneksidb, $_POST['fueltype']);
$modelyear=mysqli_real_escape_string($koneksidb, $_POST['modelyear']);
$seatingcapacity=mysqli_real_escape_string($koneksidb, $_POST['seatingcapacity']);
$airconditioner=isset($_POST['airconditioner']) ? mysqli_real_escape_string($koneksidb, $_POST['airconditioner']) : NULL;
$powerdoorlocks=isset($_POST['powerdoorlocks']) ? mysqli_real_escape_string($koneksidb, $_POST['powerdoorlocks']) : NULL;
$antilockbrakingsys=isset($_POST['antilockbrakingsys']) ? mysqli_real_escape_string($koneksidb, $_POST['antilockbrakingsys']) : NULL;
$brakeassist=isset($_POST['brakeassist']) ? mysqli_real_escape_string($koneksidb, $_POST['brakeassist']) : NULL;
$powersteering=isset($_POST['powersteering']) ? mysqli_real_escape_string($koneksidb, $_POST['powersteering']) : NULL;
$driverairbag=isset($_POST['driverairbag']) ? mysqli_real_escape_string($koneksidb, $_POST['driverairbag']) : NULL;
$passengerairbag=isset($_POST['passengerairbag']) ? mysqli_real_escape_string($koneksidb, $_POST['passengerairbag']) : NULL;
$powerwindow=isset($_POST['powerwindow']) ? mysqli_real_escape_string($koneksidb, $_POST['powerwindow']) : NULL;
$cdplayer=isset($_POST['cdplayer']) ? mysqli_real_escape_string($koneksidb, $_POST['cdplayer']) : NULL;
$centrallocking=isset($_POST['centrallocking']) ? mysqli_real_escape_string($koneksidb, $_POST['centrallocking']) : NULL;
$crashcensor=isset($_POST['crashcensor']) ? mysqli_real_escape_string($koneksidb, $_POST['crashcensor']) : NULL;
$leatherseats=isset($_POST['leatherseats']) ? mysqli_real_escape_string($koneksidb, $_POST['leatherseats']) : NULL;
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"img/vehicleimages/".$_FILES["img5"]["name"]);
$sql 	= "INSERT INTO mobil (nama_mobil,id_merek,nopol,deskripsi,harga,bb,tahun,seating,image1,image2,image3,image4,image5,
			AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,
			PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats)
			VALUES ('$vehicletitle','$brand','$nopol','$vehicleoverview','$priceperday','$fueltype','$modelyear','$seatingcapacity',
			'$vimage1','$vimage2','$vimage3','$vimage4','$vimage5','$airconditioner','$powerdoorlocks','$antilockbrakingsys',
			'$brakeassist','$powersteering','$driverairbag','$passengerairbag','$powerwindow','$cdplayer','$centrallocking',
			'$crashcensor','$leatherseats')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'mobil.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahmobil.php'; 
		</script>";
}

?>