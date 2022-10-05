<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Data Absensiku | Sistem Informasi Praktik Kerja Industri</title>

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
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>index.php/Beranda/index">Beranda <span class="sr-only">(current)</span></a>
				</li>          
				<li class="nav-item">        
					<?php if($this->session->userdata("status_prakerin") == 2 || $this->session->userdata("status_prakerin") == 3){?>
						<a class="nav-link disabled" href="#">Tulis Kegiatanku</a>
						<?php }else{ ?>						
						<a class="nav-link" href="<?php echo base_url();?>index.php/Beranda/tulisKegiatan">Tulis Kegiatanku</a>
						<?php } ?>					
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
  <?php date_default_timezone_set('Asia/Jakarta');?>
  <?php echo $this->session->flashdata('msg'); ?>       
    <input name="tanggal_akhir" id="tanggal_akhir" type="hidden" value="<?php echo $data_siswa->tanggal_selesai_praktek; ?>" />      
	<?php $today = date("Y-m-d H:i:s"); ?>
	<?php $timestamp2 = strtotime($today); ?>
            <?php
              $child1 = date('n/j/Y', $timestamp2);              
            ?>	
		<div class="row">	              
        <header class="clearfix">
		<span>Hari ini : <?php echo $child1;?></span>
        <span>&nbsp &nbsp &nbsp </span><span>Waktu Akhir : <?php echo $data_siswa->tanggal_selesai_praktek;?></span>
          <?php
				$today = date("Y-m-d H:i:s"); 
                $date = $data_siswa->tanggal_mulai_praktek;
                ?>	
          <?php // if ($date > $today) else ?>         
      </header>                         		
	</div>
	</div>
	<br/>		
			
	<div class="container">   
		<h2 class="title text-center">Daftar Hadirku</h2>
		<div class="table-responsive">		
		<table class="table">
		<?php $i = 0?>
			<thead>
				<td>No</td>
				<td>Tanggal Absensi</td>
				<td>Kehadiran</td>				
				<td>Status Acc</td>
				<td>&nbsp </td>				
			</thead>
			<?php $hariIni = $this->session->flashdata('hariini');?>						
			<tr>
			<?php foreach($Absensi->result() as $keg):?>		  
            <?php $i = $i+1?>          
            <?php $timestamp = strtotime($keg->waktu_kehadiran); ?>
            <?php
              $child1 = date('n/j/Y', $timestamp);
              $child2 = date('H:i', $timestamp);
            ?>            
				<td> <?php echo $i;?> </td>
				<td> <?php echo $keg->waktu_kehadiran;?></td>
				<td> <?php if($keg->hadir==0) {?>
							 <p> Tidak Hadir </p>
					<?php }else if($keg->hadir==1){?>
							<p> Hadir </p>
						<?php }?></td>				
				<td> <?php if($keg->acc_pembimbing==0) {?>
							 <p> Belum Acc </p>
					<?php }else if($keg->acc_pembimbing==1){?>
							<p> Sudah Acc </p>
						<?php }?></td>
				<td>  &nbsp </td>
			</tr>                         
        <?php endforeach?>   
			</table>
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
		  <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/Beranda/klikAbsen">Absensi</a> 
          <a href="#" name="Submit" id="submit3" class="btn btn-primary">Ubah</a>
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
  </body>
</html>
