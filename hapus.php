<?php 
include 'koneksi.php';
 ?>
<?php 
$id =$_GET['id'];
$db=mysqli_query($koneksi,"DELETE FROM jual WHERE id='$id'") or die(mysqli_error());
{?> 
<script type="text/javascript">
	alert("Data Berhasil dihapus");
	window.location.href="index.php";
</script>

<?php } ?>
