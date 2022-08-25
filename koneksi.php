<?php
//koneksi
$server="localhost";
$user="root";
$password="";
$database="penjualan2";
$koneksi=mysqli_connect($server, $user, $password,$database);
if(!$koneksi){
    die("Gagal terhubung dengan database:" .mysqli_connect_error());
}
 ?>