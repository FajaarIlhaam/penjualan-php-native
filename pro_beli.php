<?php
include "koneksi.php";
if (isset($_POST['bayar'])) {

$namatransaksi = $_POST['nama_transaksi'];
$namabrg = $_POST['nama_barang'];
$qty = $_POST['qty'];
$hargasat = $_POST['harga_satuan'];

$insert ="INSERT INTO transaksi(nama_transaksi,nama_barang,qty,harga_satuan) VALUES ('$namatransaksi','$namabrg','$qty','$hargasat')";
$sql = mysqli_query($koneksi, $insert) or die(mysqli_error());{
?>
<script>
		alert("Transaksi Berhasil Dilakukan");
		window.location.href='laporan.php';

	</script>
<?php
}
}
?>


