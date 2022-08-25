<!--untuk menambah data/update-->
<?php 
	include 'koneksi.php';
 ?>
<?php 
$id_barang=$_POST['id_barang'];
$nama_barang=$_POST['nama_barang'];
$kategori=$_POST['kategori'];
$satuan=$_POST['satuan'];
$stok=$_POST['stok'];
$harga=$_POST['harga'];

$sql="INSERT INTO jual (id_barang,nama_barang,kategori,satuan,stok,harga) VALUES ('$id_barang','$nama_barang','$kategori','$satuan','$stok','$harga')";
$s=mysqli_query($koneksi,$sql) or die(mysqli_error());{
	?>
	<script>
		alert("Data Barang Berhasil Ditambahkan");
		window.location.href='index.php';

	</script>
	<?php 
}

 ?>