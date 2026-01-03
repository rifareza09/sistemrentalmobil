<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

// Cek koneksi database
if (!$koneksidb) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Validasi data POST
if(!isset($_POST['fullname']) || !isset($_POST['emailid']) || !isset($_POST['mobileno']) || 
   !isset($_POST['alamat']) || !isset($_POST['pass']) || !isset($_POST['conf'])){
    echo "<script>alert('Data tidak lengkap!');</script>";
    echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
    exit;
}

$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$alamat=$_POST['alamat']; 
$pass = $_POST['pass'];
$conf = $_POST['conf'];

// Validasi file upload
if(!isset($_FILES["img1"]) || !isset($_FILES["img2"])){
    echo "<script>alert('File KTP dan KK harus diupload!');</script>";
    echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
    exit;
}

$image1=$_FILES["img1"]["name"];
$image2=$_FILES["img2"]["name"];
$newimg1 = date('dmYHis').$image1;
$newimg2 = date('dmYHis').$image2;

// Upload file
$upload1 = move_uploaded_file($_FILES["img1"]["tmp_name"],"image/id/".$newimg1);
$upload2 = move_uploaded_file($_FILES["img2"]["tmp_name"],"image/id/".$newimg2);

if(!$upload1 || !$upload2){
    echo "<script>alert('Gagal upload file. Pastikan folder image/id/ ada dan dapat ditulis!');</script>";
    echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
    exit;
}

// Cek password
if($conf!=$pass){
	echo "<script>alert('Password tidak sama!');</script>";
	echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";			
}else{
	// Cek email sudah terdaftar atau belum
	$email_esc = mysqli_real_escape_string($koneksidb, $email);
	$sqlcek = "SELECT email FROM users WHERE email='$email_esc'";
	$querycek = mysqli_query($koneksidb,$sqlcek);
	
	if(!$querycek){
	    echo "<script>alert('Error query: " . mysqli_error($koneksidb) . "');</script>";
	    echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
	    exit;
	}
	
	if(mysqli_num_rows($querycek)>0){
		echo "<script>alert('Email sudah terdaftar, silahkan gunakan email lain!');</script>";
		echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";			
	}else{
		$password=md5($pass);
		$fname_esc = mysqli_real_escape_string($koneksidb, $fname);
		$mobile_esc = mysqli_real_escape_string($koneksidb, $mobile);
		$alamat_esc = mysqli_real_escape_string($koneksidb, $alamat);
		
		$sql1="INSERT INTO users(nama_user,email,telp,password,alamat,ktp,kk) VALUES('$fname_esc','$email_esc','$mobile_esc','$password','$alamat_esc','$newimg1','$newimg2')";
		$lastInsertId = mysqli_query($koneksidb, $sql1);
		
		if($lastInsertId){
			echo "<script>alert('Registrasi berhasil. Sekarang anda bisa login.');</script>";
			echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		}else {
			echo "<script>alert('Ops, terjadi kesalahan: " . mysqli_error($koneksidb) . "');</script>";
			echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
		}
	}	
}
?>