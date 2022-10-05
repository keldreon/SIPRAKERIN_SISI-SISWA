<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Edit Tulisanku | Sistem Informasi Praktik Kerja Industri</title>
    
    <link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/default.css");?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/component.css");?>" />    
  </head>

  <body class="index-page sidebar-collapse bg-dark">
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
				<li class="nav-item active">        
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
    </header>                     
    
		<br/>		
		<div class="main container">
      <div class="row">
        <div class="col-md-12 well">
		<?php if($this->session->userdata("status_prakerin") == 2){?>
				<div class="alert alert-danger"> <div class="container"> <div class="alert-icon"> <i class="material-icons">info_outline</i> </div> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="material-icons">clear</i></span> </button> <b>Info alert:</b> Masa berlaku praktik kerja industri anda sudah diputus oleh admin. </div> </div>
			<?php }else if($this->session->userdata("status_prakerin") == 3){?>
				<div class="alert alert-info"> <div class="container"> <div class="alert-icon"> <i class="material-icons">info_outline</i> </div> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="material-icons">clear</i></span> </button> <b>Info alert:</b> Masa berlaku praktik kerja industri anda sudah berakhir atau diputus oleh admin...</div> </div>
			<?php }?>							
          <!-- col-md-offset-2 well -->
          <?php $attributes = array("class"=>"form-signin");
      echo form_open("Beranda/prosesedittulisKegiatan", $attributes);?>            
            <input name="kode_teks" id="kode_teks" type="hidden" value="<?php echo $kegiatanku->id_kegiatan; ?>" />            
            <br/>      
            <div class="form-group">              
              <label for="name">Judul Kegiatan</label>
              <input class="form-control" name="judul_kegiatan"  type="text" value="<?php echo $kegiatanku->judul_tulisan;?>"/>
            </div>

            <div class="form-group">              
              <textarea class="form-control" name="kegiatanku" id="kegiatanku" placeholder="Kegiatanku Hari ini..." rows="6" cols="60" value="<?php form_textarea(array('kegiatanku'=>'kegiatanku'),set_value('kegiatanku'));?>"><?php echo $kegiatanku->isi_tulisan;?></textarea>
            </div>    

            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Simpan</button>
            </div>
            <?php echo form_close();?>
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
