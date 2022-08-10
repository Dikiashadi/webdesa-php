<?php
if(!@($_SESSION)){
session_start();
}
require_once('koneksi.php');

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>SIPA</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    
    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <style type="text/css">
      .kotak{
        width:400px;
        height:400px;
        background-color: black;
      }
    </style>
  </head>

  <body>
<?php
        if($_SESSION['level']=="admin"){
      ?>
    <div id="wrapper">
      
      <!-- Sidebar -->
      <nav class="navbar  navbar-fixed-top" style="background-color:#B0C4DE;" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="kotak"></span>
         <img src="assets/logo/sipacoba2.png"style="float:left; width:40px; height: 40px; margin: 4px 5px 4px 20px;">
          <a class="navbar-brand" href="">WEB Desa Bumigora</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav" style="background-color:#DCDCDC">
            
           
            
            <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-large"></span> MasterData <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="penduduk.php">Penduduk</a></li>
                <li><a href="staff.php">Staff</a></li>
                
              </ul>          
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks"></span> Pelayanan Administrasi<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="tampil_ektp.php">Permohonan KTP</a></li>
                <li><a href="tampil_kk.php">Permohonan KK</a></li>
                <li><a href="tampil_sktmKesehatan.php">SKTM Kesehatan</a></li>
                <li><a href="tampil_sktmPendidikan.php">SKTM Pendidikan</a></li>
              </ul>          
            </li>
              
                    
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span> Laporan<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="formlaporan_penduduk.php"> Laporan Penduduk</a></li>
                <li><a href="formlaporan_ktp.php"> Laporan Permohonan KTP</a></li>
                <li><a href="formlaporan_kk.php"> Laporan Permohonan KK</a></li>
                <li><a href="formlaporan_SktmPend.php"> Laporan SKTM Pendidkan</a></li>
                <li><a href="formlaporan_SktmKes.php"> Laporan SKTM Kesehatan</a></li>
                
              </ul>          
            </li>
          </ul>
           </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
        
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['userid'];?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a onclick="return confirm('Anda Yakin akan keluar?')" href="logout.php" type="button" class="btn btn-danger btn-xs"><i class="fa fa-power-off"></i> Log Out</a></li
                
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <?php
    }else if($_SESSION['level']=="Bagian Pelayanan"){
      ?>
      <div id="wrapper">
        <!-- Sidebar -->
      <nav class="navbar  navbar-fixed-top" style="background-color:#B0C4DE;" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="kotak"></span>
         <img src="assets/logo/logo.png"style="float:left; width:40px; height: 40px; margin: 4px 5px 4px 20px;">
          <a class="navbar-brand" href="">SIPA Kecamatan Lengkong Kota Bandung</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav" style="background-color:#DCDCDC">
            
           
            
            <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-large"></span> MasterData <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="penduduk.php">Penduduk</a></li>
                
                
              </ul>          
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks"></span> Pelayanan Administrasi<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="tampil_ektp.php">Permohonan KTP</a></li>
                <li><a href="tampil_kk.php">Permohonan KK</a></li>
                <li><a href="tampil_sktmKesehatan.php">SKTM Kesehatan</a></li>
                <li><a href="tampil_sktmPendidikan.php">SKTM Pendidikan</a></li>
              </ul>          
            </li>
              
                    
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span> Laporan<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="formlaporan_penduduk.php"> Laporan Penduduk</a></li>
                <li><a href="formlaporan_ktp.php"> Laporan Permohonan KTP</a></li>
                <li><a href="formlaporan_kk.php"> Laporan Permohonan KK</a></li>
                <li><a href="formlaporan_SktmPend.php"> Laporan SKTM Pendidkan</a></li>
                <li><a href="formlaporan_SktmKes.php"> Laporan SKTM Kesehatan</a></li>
                
              </ul>          
            </li>
          </ul>
           </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
        
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['userid'];?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a onclick="return confirm('Anda Yakin akan keluar?')" href="logout.php" type="button" class="btn btn-danger btn-xs"><i class="fa fa-power-off"></i> Log Out</a></li
                
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
     <?php
    }else if($_SESSION['level']=="Kasi Pelayanan"){
      ?>
      <div id="wrapper">
        <!-- Sidebar -->
      <nav class="navbar  navbar-fixed-top" style="background-color:#B0C4DE;" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="kotak"></span>
         <img src="assets/logo/logo.png"style="float:left; width:40px; height: 40px; margin: 4px 5px 4px 20px;">
          <a class="navbar-brand" href="">SIPA Kecamatan Lengkong Kota Bandung</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav" style="background-color:#DCDCDC">
            
           
            
            <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
             
              
                    
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span> Laporan<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="formlaporan_penduduk.php"> Laporan Penduduk</a></li>
                <li><a href="formlaporan_ktp.php"> Laporan Permohonan KTP</a></li>
                <li><a href="formlaporan_kk.php"> Laporan Permohonan KK</a></li>
                <li><a href="formlaporan_SktmPend.php"> Laporan SKTM Pendidkan</a></li>
                <li><a href="formlaporan_SktmKes.php"> Laporan SKTM Kesehatan</a></li>
                
              </ul>          
            </li>
          </ul>
           </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
        
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['userid'];?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a onclick="return confirm('Anda Yakin akan keluar?')" href="logout.php" type="button" class="btn btn-danger btn-xs"><i class="fa fa-power-off"></i> Log Out</a></li
                
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
    
  

  



    <?php
  }

 
    ?>
