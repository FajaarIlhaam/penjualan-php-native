<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Dhiya Reksa Kusumojati B">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penjualan CRUD</title>
 
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
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Cari Barang </label>
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
                      <h1 class="animated fadeInLeft"></h1>
                      <p class="animated fadeInRight"></p>
                    </li>
                    <li class="ripple"><a href="index.php"><span class="fa fa-table"></span> tables  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                    </li>
                    <li class="ripple"><a href="transaksi.php"><span class="fa fa-shopping-cart"></span> Transaksi  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                    </li>
                    <li class="ripple"><a href="laporan.php"><span class="fa fa-line-chart"></span> Laporan  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                    </li>
                    <li class="ripple"><a href="logoutt.php" onclick="javascript:return confirm('Yakin Ingin Logout ?');"><span class="fa fa-sign-out"></span> Logout  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                    </li>
                  </ul>
                </div>
            </div>

            <!-- start: Content -->
            <div id="content">
                
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Edit </h3>
                        <!-- <p class="animated fadeInDown">
                          Form <span class="fa-angle-right fa"></span> Form Element
                        </p> -->
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-10">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Edit barang</h4>
                        </div>

                        <?php 
				$id=$_GET['id'];
				$sql="SELECT * from jual WHERE id='$id'";
				$data=mysqli_query($koneksi,$sql);
				while ($r=mysqli_fetch_array($data)) {
					$t=$r['stok'];
					$y=$r['harga'];
					?>
                        <form method="POST" action="pro_edit.php">
                         <div class="panel-body" style="padding-bottom:30px;">
                         <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                          <div class="col-md-12">
                            <div class="form-group"><label class="col-sm-2 control-label text-right">ID Barang</label>
                              <div class="col-sm-10">
                                <input name="id_barang" type="text" class="form-control" value="<?php echo $r['id_barang'];?>" require=""></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label text-right">Nama Barang</label>
                              <div class="col-sm-10">
                                <input name="nama_barang" type="text" class="form-control" value="<?php echo $r['nama_barang'];?>" require=""></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label text-right">Kategori</label>
                              <div class="col-sm-10">
                                <input name="kategori" type="text" class="form-control" value="<?php echo $r['kategori'];?>" require=""></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label text-right">satuan</label>
                              <div class="col-sm-10">
                                <input name="satuan" type="text" class="form-control" value="<?php echo $r['satuan'];?>" require=""></div>
                            </div> 
                            <div class="form-group"><label class="col-sm-2 control-label text-right">Stock</label>
                              <div class="col-sm-10">
                                <input name="stok" type="text" class="form-control" value="<?php echo $r['stok'];?>" require=""></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label text-right">Harga</label>
                              <div class="col-sm-10">
                                <input name="harga" type="text" class="form-control" value="<?php echo $r['harga'];?>" require=""></div>
                            </div> <br><br>
                            <div class="col-md-8">        
                                <input  type="submit" class="btn btn-gradient btn-primary align-center" 
                                value="Simpan" name="tambah"/>
                            </div>
                            <br><br>
                        </div>
                    </div>
                    </form>
                    <?php  } ?>
                 </div>
                 <footer>
  <p><b><center>© Copyright 2022 By Muhammad Fajar Ilham</center></b></p>
</footer>
              </div>
          </div>
