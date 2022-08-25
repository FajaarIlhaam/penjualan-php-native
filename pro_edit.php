<!--Untuk edit data barang-->
<?php 
include 'koneksi.php';
$id=$_POST['id'];
$a=$_POST['id_barang'];
$b=$_POST['nama_barang'];
$d=$_POST['kategori'];
$e=$_POST['satuan'];
$f=$_POST['stok'];
$g=$_POST['harga'];

$oke="UPDATE jual SET id_barang='$a',nama_barang='$b',kategori='$d',satuan='$e',stok='$f',harga='$g' where id='$id'";
$s=mysqli_query($koneksi,$oke) or die(mysqli_error());{
	?>
	 <script type="text/javascript">
 	alert("Data Berhasil Diedit");
 	window.location.href='index.php';
 </script>
 <?php
}


 ?>