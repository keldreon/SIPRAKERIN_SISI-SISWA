<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Daftar Hadirku | Sistem Informasi Praktik Kerja Industri</title>
    
    <link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/default.css");?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/component.css");?>" />    
  </head>

  <body class="index-page sidebar-collapse">
<nav class="navbar navbar-inverse navbar-expand-lg bg-dark" color-on-scroll="100" id="sectionsNav">
	<div class="container">
		<div class="navbar-translate">
			<a class="navbar-brand" href="#">SIPRAKERIN</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>index.php/Beranda/index">Beranda <span class="sr-only">(current)</span></a>
				</li>          
				<li class="nav-item">        
					<a class="nav-link" href="<?php echo base_url();?>index.php/Beranda/tulisKegiatan">Tulis Kegiatanku</a>
					<?php //tapi dibatas satu hari sekali..ceknya gimana ya? ?>
				</li>            
				<li class="nav-item dropdown active">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Absensiku</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/Absen/index">Daftar Kehadiranku</a>		  
						<?php if($this->session->userdata("status_prakerin") == 2 || $this->session->userdata("status_prakerin") == 3){?>
						<a class="dropdown-item disabled" href="#">Absensi</a>
						<?php }else{ ?>						
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal3">Absensi</a>
						<?php } ?>
					</div>
				</li> 	
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata("uname");?></a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="<?php echo site_url('Beranda/Profil/');?>">Profil</a>
						<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/Beranda/logout">Logout</a>         
					</div>
				</li> 
				<li class="nav-item ">        
					<a class="nav-link" href="<?php echo base_url();?>index.php/Help/index" target="_blank">Panduan</a>													
				</li>            
			</ul>
			<span class="navbar-text">
				<?php echo $lab->nama_lab; ?>
			</span>
		</div>
	</div>  
</nav>

  <div class="main main-raised">
  <div class="container">
  <br/>    
  <?php $today = date("Y-m-d H:i:s");?>
    <input name="tanggal_akhir" id="tanggal_akhir" type="hidden" value="<?php echo $data_siswa->tanggal_selesai_praktek; ?>" />      
    <input name="today" id="today" type="hidden" value="<?php echo $today; ?>" />
		<div class="row">	              
        <header class="clearfix">          
          <?php $todayUI = date("Y-m-d");?>
        <span>Waktu : <?php echo $todayUI; ?></span>
          <?php // if ($date > $today) else ?>                        
        <h2>Pembimbing Lab : <?php echo $lab2->nama_pemb_lab;?></h2>        
    </header>                     
    
		<br/>		
		<div class="main container">
      <div class="row">
        <div class="col-md-12 well">
          <div class="table-responsive">
		  
		  </div>
            
        </div>
      </div>
    </div>	
  </div>  
  </div>  
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com/">
              Template by Creative Tim
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script> - -       
      </div>
    </div>
  </footer>
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo base_url("assets/js/core/jquery.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/core/popper.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/core/jquery-slim.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/moment.min.js"); ?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"  type="text/javascript"></script>          
    <script src="<?php echo base_url("assets/js/core/bootstrap-material-design.min.js");?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/nouislider.min.js");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/material-kit.js?v=2.0.4");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/modernizr.custom.js");?>" type="text/javascript"></script>
  </body>
</html>
