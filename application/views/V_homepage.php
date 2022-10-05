<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="description" content="">
    <meta name="author" content=""> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Beranda | Sistem Informasi Praktik Kerja Industri</title>
    
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />
	    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/default.css");?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/component.css");?>" />    
  </head>

<body class="index-page sidebar-collapse bg-dark">
   <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">-->   
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
				<li class="nav-item active">
					<a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
				</li>          
				<li class="nav-item">        
				<?php if($this->session->userdata("status_prakerin") == 2 || $this->session->userdata("status_prakerin") == 3){?>
						<a class="nav-link disabled" href="#">Tulis Kegiatanku</a>
						<?php }else{ ?>						
						<a class="nav-link" href="<?php echo base_url();?>index.php/Beranda/tulisKegiatan">Tulis Kegiatanku</a>
				<?php } ?>
				</li>            
				<li class="nav-item dropdown">
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
  <div class="container text-info">
  <br/>    
  <?php date_default_timezone_set('Asia/Jakarta');?>
  <?php echo $this->session->flashdata('msg'); ?>       
  <?php echo $this->session->flashdata('msg2'); ?>
    <input name="tanggal_akhir" id="tanggal_akhir" type="hidden" value="<?php echo $data_siswa->tanggal_selesai_praktek; ?>" />  
    <input name="tanggal_mulai" id="tanggal_mulai" type="hidden" value="<?php echo $data_siswa->tanggal_mulai_praktek; ?>" />
	<?php $today = date("Y-m-d H:i:s"); ?>
	<?php $timestamp2 = strtotime($today); ?>
            <?php
              $child1 = date('j/n/Y', $timestamp2);              
     ?>	 
	<input name="tanggal_sekarang" id="tanggal_sekarang" type="hidden" value="<?php echo $today; ?>" />
		<div class="row">	              
        <header class="clearfix">
		<span>Hari ini : <?php echo $child1;?></span>
        <span>&nbsp &nbsp &nbsp </span><span>Waktu Akhir : <?php echo $data_siswa->tanggal_selesai_praktek;?></span>
          <?php
				$today = date("Y-m-d H:i:s"); 
                $date = $data_siswa->tanggal_mulai_praktek;
                ?>	
          <?php // if ($date > $today) else ?>
            <h2>Sisa Waktu : <span id="demo"></span></h2>     
			<span id="st">Status : <span id="demo2"></span></span>        		
			<?php if($this->session->userdata("status_prakerin") == 2){?>
				<div class="alert alert-danger"> <div class="container"> <div class="alert-icon"> <i class="material-icons">info_outline</i> </div> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="material-icons">clear</i></span> </button> <b>Info alert:</b> Masa berlaku praktik kerja industri anda sudah diputus oleh admin. </div> </div>
			<?php }else if($this->session->userdata("status_prakerin") == 3){?>
				<div class="alert alert-info"> <div class="container"> <div class="alert-icon"> <i class="material-icons">info_outline</i> </div> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="material-icons">clear</i></span> </button> <b>Info alert:</b> Masa berlaku praktik kerja industri anda sudah berakhir atau diputus oleh admin...</div> </div>
			<?php }?>									
      </header>                         
		<br/>		
		</div>
	</div>
	</div>
	<br/>
	
<div class="main main-raised">
	<div class="container">
	<header class="clearfix">
	<h3>Daftar Catatan Kegiatan</h3>
	</header>		
	<div class="row">
	<div class="col-12">
	<?php if(!empty($kegiatanku)){?>
        <ul class="cbp_tmtimeline">
        <?php $i = 0?>        
          <?php foreach($kegiatanku->result() as $keg):?>		  
            <?php $i = $i+1?>
          <li>
            <?php $timestamp = strtotime($keg->tanggal_nulis); ?>
            <?php
              $child1 = date('n/j/Y', $timestamp);
              $child2 = date('H:i', $timestamp);
            ?>
            <time class="cbp_tmtime" datetime="<?php $keg->tanggal_nulis;?>"><span><?php echo $child1;?></span> <span><?php echo $child2;?></span></time>
            <div class="cbp_tmicon cbp_tmicon-phone"></div>
            <div class="cbp_tmlabel">			
              <h2><a href="<?php echo site_url('Beranda/editTulisan/'.$keg->id_kegiatan);?>"><?php echo $keg->judul_tulisan;?></a></h2>
              <p><?php echo $keg->isi_tulisan;?></p>			  
            </div>			
          </li>
        <?php endforeach?>
        </ul>
	<?php }else{?>
		<h2 class="text-center title">Tidak ada catatan kegiatan.</h2>
	<?php } ?>
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
		  <li>
		  <a href="<?php echo base_url();?>index.php/Help/index" target="_blank">Panduan</a>													
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
  <!-- Classic Modal -->
  <div class="modal fade d-print-none" id="myModal3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Kehadiran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">X</i>
          </button>
        </div>		
        <div class="modal-body">		
		<p> Apakah anda yakin akan mengonfirmasi kehadiran? <br/> Sekali mengonfirmasi <span class="text-danger"> TIDAK BISA DIUBAH </span>lagi.</p>
        </div>
        <div class="modal-footer">
		  <a class="btn btn-primary btn-link" href="<?php echo base_url(); ?>index.php/Beranda/klikAbsen">Absensi</a>           
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Batal</button>
        </div>
      </div>
	  <?php echo form_close();?>
    </div>
  </div>
  <!--  End Modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->    
        
    <script src="<?php echo base_url("assets/js/core/jquery.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/core/popper.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/core/jquery-slim.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/moment.min.js"); ?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"  type="text/javascript"></script>          
    <script src="<?php echo base_url("assets/js/core/bootstrap-material-design.min.js");?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/nouislider.min.js");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/material-kit.js?v=2.0.4");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/modernizr.custom.js");?>" type="text/javascript"></script>
	    	
    <script>
	$(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });
	
     // Set the date we're counting down to    
    var tes = document.getElementById("tanggal_akhir").value;
    var countDownDate = new Date(tes).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {
		// Get todays date and time
		var mulai = document.getElementById("tanggal_sekarang").value;
		var now = new Date(mulai).getTime();
        
		// Find the distance between now and the count down date
		var distance = countDownDate - now;    
    
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		
		// Output the result in an element with id="demo"
		document.getElementById("demo").innerHTML = days + " hari";    
		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = "SELESAI";		
			document.getElementById("st").innerHTML = "&nbsp";		
			document.getElementById("demo2").innerHTML = "&nbsp";		
		}		
	}, 1000);      
	  // Set the date we're counting down to    	 
	 var tes2 = document.getElementById("tanggal_mulai").value;
	var countDownDate2 = new Date(tes2).getTime();

	// Update the count down every 1 second
	var x2 = setInterval(function() {
		// Get todays date and time
		var mulai2 = document.getElementById("tanggal_sekarang").value;
		var now2 = new Date(mulai2).getTime();
   
		// Find the distance between now and the count down date
		var distance2 = countDownDate2 - now2;    
    
		// Time calculations for days, hours, minutes and seconds
		var days2 = Math.floor(distance2/ (1000 * 60 * 60 * 24));
		var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
		var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);        		   

		// Output the result in an element with id="demo"
		document.getElementById("demo2").innerHTML = days2 + " hari "+ hours2 + " jam  sebelum Praktek Kerja Industri.";    
	
		// If the count down is over, write some text 
		if (distance2 < 0) {
			clearInterval(x);
			document.getElementById("demo2").innerHTML = "SEDANG BERLANGSUNG";
		}	
	}, 1000);
		</script>
  </body>
</html>
