<?php
include "koneksi.php";
?>
<?php
$r = $_GET['id_transaksi'];
$db=mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_transaksi='$r'") or die(mysqli_error());
{?> 
<script type="text/javascript">
	alert("Transaksi Berhasil Dibatalkan!");
	window.location.href="laporan.php";
</script>

<?php } ?>