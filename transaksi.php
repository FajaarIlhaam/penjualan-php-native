<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION["login"])){
header("Location: login.php");
exit();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="oke">
	<meta name="author" content="Zard">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penjualan Crud</title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css"/>
	<link href="asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->

	<link rel="shortcut icon" href="asset/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index.html" class="navbar-brand"> 
                 <b>Zard E-casier</b>
                </a>

              <ul class="nav navbar-nav search-nav">
                <li>
                   <div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" name="search" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Pencarian</label>
                    </div>
                  </div>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>Fajar Ilham</span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/admin.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="ripple"><a href="index.php"><span class="fa fa-table"></span> Tables  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                    </li>
                    <li class="ripple"><a href="transaksi.php" ><span class="fa fa-shopping-cart"></span> Transaksi  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                    </li>
                    <li class="ripple"><a href="Laporan.php" ><span class="fa fa-line-chart"></span> Laporan  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                    </li>
                    <li class="ripple"><a href="logoutt.php" onclick="javascript:return confirm('Yakin Ingin Logout ?');"><span class="fa fa-sign-out"></span> Logout  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                    </li>
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->

  		
          <!-- start: content -->
            <div id="content">
                <div class="panel">
                <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Transaksi</h3>
                   
                </div>
              </div>
          </div>
          <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading"><h3>List Barang</h3></div><br>
                <div class="col-md-8">  
                </div><br><br>
                <div class="panel-body">
                  <div class="responsive-table">
                  <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Barang</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th colspan=2>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
	#Menampilkan barang ketika tombol search digunakan
	    if(isset($_GET['search'])){
		$cari = $_GET['search'];
		$query = "SELECT * FROM jual WHERE id_barang like '%".$cari."%' OR nama_barang like '%".$cari."%' OR harga like '%".$cari."%' ORDER BY id_barang ASC";
	    }else{
	    	$query = "SELECT * From jual ORDER BY id_barang ASC";
	    }
	
	    $result = mysqli_query($koneksi, $query);
	    if(!$result){
	    die("Query Error:".mysqli_error($koneksi)."-".mysqli_error($koneksi));
        }
        while($row = mysqli_fetch_array($result)){

	    ?>
						 <tr>
			 	<td><?php echo $row['id_barang']; ?></td>
			 	<td><?php echo $row['nama_barang']; ?></td>
			 	<td><?php echo $row['kategori']; ?></td>
			 	<td><?php echo $row['harga']; ?></td>
			 	<td><a href='beli.php?id=<?php echo $row['id'];?>'>Beli</a></td>
                    </tr>
            <?php
                    }
                ?>      
                  </tbody>
                    </table>
                  </div>
              </div>
            </div>
                    </div>
                    <footer>
  <p><b><center>© Copyright 2022 By Muhammad Fajar Ilham</center></b></p>
</footer>
                </div>
      		  </div>
          <!-- end: content -->

    
         
          
      </div>

      <!-- start: Mobile -->
     
       <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/jquery.ui.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
   
    
    <!-- plugins -->
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="asset/js/plugins/jquery.datatables.min.js"></script>
    <script src="asset/js/plugins/datatables.bootstrap.min.js"></script>


    <!-- custom -->
     <script src="asset/js/main.js"></script>
     <script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
     
  <!-- end: Javascript -->
  </body>
</html>