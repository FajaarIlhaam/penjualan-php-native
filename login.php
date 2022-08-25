<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Penjualan CRUD</title>
  <link rel="stylesheet" href="logincss/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Penjualan CRUD</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="" method="post">
					<label for="chk" aria-hidden="true">Register</label>
					<input type="text" name="username" placeholder="New Email" required="">
					<input type="password" name="password" placeholder="New Password" required="">
					<button name="daftar">Daftar</button>
				</form>
			</div>

			<div class="login">
				<form action="" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="yusername" placeholder="Email" required="">
					<input type="password" name="ypassword" placeholder="Password" required="">
					<button name="ylogin">Masuk</button>
				</form>
			</div>
	</div>
	<!-- Proses Login-->
	<?php
	if (isset($_POST["ylogin"])) {
  $username = $_POST["yusername"];
  $password = $_POST["ypassword"]; 
  $query = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' AND password = md5('$password')");

  //mengecek apakah ada akun di database
$cek = mysqli_num_rows($query);
if($cek==1){

$_SESSION['login']= true;
echo '<script>alert("Login Berhasil");window.location="index.php"</script>';
exit;

}else{
  echo '<script>alert("Login Gagal");history.go(-1);</script>';

}  

}

?>
<!--Proses Registrasi-->
<?php 
//menyambungkan ketika clik tombol daftar
	if (isset($_POST["daftar"])){

$username = $_POST["username"];
$password = $_POST["password"];

//mengecek username di database untuk melihat apakah ada yang sama
    $cek_user=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'"));
    if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("Username Sudah Ada Yang Menggunakan");
              window.location="login.php";
              </script>';
              exit();
    }

	//menyimpan ke database akun user
    else {
        $password=md5("$password");
        mysqli_query($koneksi,"INSERT INTO user (username, password)
        VALUES ('$username','$password')");
        
        echo '<script language="javascript">
              alert ("Registrasi Berhasil Di Lakukan!");
              window.location="login.php";
              </script>';
              exit();
    }
}
?>

</body>
</html>
</body>
</html>
