<?php

$host="localhost";
$user="root";
$password="";
$db="wisata";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}

//register
if (isset($_POST['register'])) {
	//jiki register di klik
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	//enkripsi password
	$epass = password_hash($pass, PASSWORD_DEFAULT);
	$ecpass = password_hash($cpass, PASSWORD_DEFAULT);

	//insert ke database
	$insert = mysqli_query($kon,"INSERT INTO author (username,email,password,confirm) values('$username','$email','$epass','$ecpass')");

	if ($insert) {
		//jika berhasil
		header('location:index.php');
	}else{
		//jika gagal
		echo '<script>
			    alert("Registrasi Gagal");
				window.location.href="login.php";
			  </script>';
	}
}
//login
if (isset($_POST['login'])) {
	//jiki register di klik
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	//insert ke database
	$cekdb = mysqli_query($kon,"SELECT * FROM author where username='$username'");
	$hitung = mysqli_num_rows($cekdb);
	$pw = mysqli_fetch_array($cekdb);
	$passSekarang = $pw['password'];

	if ($hitung>0) {
		//jika ada maka verifikasi password
		if(password_verify($pass,$passSekarang)){
			//jika pass benar
			header('location:index.php');
		}else{
			echo '<script>
			    alert("Password Salah");
				window.location.href="login.php";
			  </script>';
		}
	}else{
		//jika gagal
		echo '<script>
			    alert("Login Gagal");
				window.location.href="login.php";
			  </script>';
	}
}
?>