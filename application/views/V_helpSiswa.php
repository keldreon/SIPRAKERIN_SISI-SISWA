<!DOCTYPE html>
<html lang="en">
<!-- alamat gambar F:\uploads\picture\help -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">    

	<title>Panduan Penggunaan &nbsp|&nbsp SIPRAKERIN</title>

    <!-- Bootstrap core CSS -->	
    <link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet" type="text/css" />
    
  </head>
  
  <body class="profile-page sidebar-collapse bg-dark">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg d-print-none" color-on-scroll="100" id="sectionsNav">
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
			<?php if($this->session->userdata("uname")!=NULL){?>
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
				<li class="nav-item active">        
					<a class="nav-link" href="<?php echo base_url();?>index.php/Help/index" target="_blank">Panduan</a>													
				</li>            			
			</ul>
			<?php }else{?>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">        
						<a class="nav-link" href="<?php echo base_url();?>index.php/Help/index" target="_blank">Panduan</a>													
					</li>            
				</ul>
			<?php } ?>
		</div>
	</div>  
</nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg3.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">          
            <h1 class="title">Panduan Penggunaan</h1>
            <h4></h4>          
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
	<div class="section text-center">
        <h2 id="awal">Menu Panduan</h3>
      </div>
        <nav class="navbar navbar-expand-lg bg-primary">
              <div class="container">
                <div class="navbar-translate">
                  <a class="navbar-brand" href="#">Menu Panduan >></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="#Login" class="nav-link">Login dan Aktivasi</a>
                    </li>
                    <li class="nav-item">
                      <a href="#Beranda" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                      <a href="#Keg" class="nav-link">Catatan Kegiatan</a>
                    </li>					
					<li class="nav-item">
                      <a href="#absens" class="nav-link">Absensi</a>
                    </li>					
					<li class="nav-item">
                      <a href="#profil" class="nav-link">Profil</a>
                    </li>					
                  </ul>
                </div>
              </div>
            </nav>
			</div>
			<div class="container">
			<h3 id="Login">Login dan Aktivasi</h3>
			<p class="text-info text-justify">
			Untuk melakukan login cukup memasukkan username dan password lalu klik login. Jika belum diaktivasi, lakukan aktivasi dengan mengklik aktivasi dibawah tombol login.
			</p>
			<p class="text-justify">
			Aktivasi cukup memasukkan kode siswa yang sudah diterima dari guru pembimbing sekolah. Jika sudah benar, maka muncul sebuah form yang menampilkan data diri lalu form username dan password untuk diisi. Setelah diisi, maka akan dialihkan ke menu masukkan kode aktivasi sembari menampilkan pesan "Akun sudah teraktivasi.".
			</p>
			<p class="text-justify">
			Setelah itu kembali ke menu login dan masukkan data yang diperlukan.
			</p>			
			<a href="#awal" class="btn btn-info">Kembali ke atas</a>
		</div>
		<div class="container">
			<h3 id="Beranda">Beranda</h3>
			<p class="text-info text-justify">
			Beranda/homepage memiliki menu yang terdiri dari tulisan kegiatan, absensiku, dan username. Selain itu menampilkan daftar catatan kegiatan yang ditulis di tulis kegiatan.
			</p>
			<p class="text-justify">
			Menu absensiku terdiri dari absensi, dan daftar kehadiranku. 
			</p>
			<p class="text-justify">
			Menu username terdiri dari profil dan tombol logout. 
			</p>
			<p class="text-justify">
			Beranda menampilkan tanggal hari ini dan tanggal akhir prakerin. selain itu menampilkan jumlah hari yang tersisa baik sudah dimulai atau sebelum dimulai. jika sudah dimulai status akan menampilkan
			SEDANG BERLANGSUNG dan jika belum akan menampilkan jumlah hari sebelum hari H. 
			</p>
			<p class="text-justify">
			Catatan kegiatan menampilkan waktu dibuat tulisan dan status acc penulisan kegiatan oleh guru pembimbing sekolah. Untuk mengeditnya cukup klik judul tulisan kegiatan. 
			</p>
			<a href="#awal" class="btn btn-info">Kembali ke atas</a>
		</div>
		<div class="container">
			<h3 id="Keg">Tulis Kegiatanku</h3>
			<p class="text-info text-justify">
			Menampilkan nama pembimbing lab dan tanggal catatan ditulis. 
			</p>
			<p class="text-justify">
			Untuk menulisnya cukup tulis judul dan isi yang akurat agar bisa dipertanggung jawabkan oleh guru pembimbing sekolah. 
			</p>
			<p class="text-justify">
			Setelah selesai klik tulis. Jika mengedit maka akan kembali ke menu ini juga lalu klik simpan jika menyimpan perubahan.
			</p>			
			<a href="#awal" class="btn btn-info">Kembali ke atas</a>
		</div>
		<div class="container">
			<h3 id="absens">Absensi dan Daftar Kehadiranku.</h3>
			<p class="text-info text-justify">
			Absensi adalah tombol cepat untuk menyatakan hadir dan untuk menyatakan tidak hadir diisi di menu daftar kehadiranku lalu ubah kehadiran menjadi tidak hadir lalu klik konfirmasi.
			</p>
			<p class="text-justify text-danger">
			Hanya bisa dilakukan sekali sehari dan jika sudah dilakukan tidak bisa diubah lagi!!
			</p>			
			<a href="#awal" class="btn btn-info">Kembali ke atas</a>
		</div>
		
		<div class="container">
			<h3 id="profil">Profil</h3>
			<p class="text-info text-justify">
			Profil bisa diakses dari username lalu klik profil.
			</p>
			<p class="text-justify">
			Di menu profil menampilkan data diri dan data sekolah termasuk data pembimbing serta kode aktivasi. Selain itu bisa mengubah data diri lewat edit profil jika ada kesalahan dan mengubah password.
			Menu profil juga bisa dipakai untuk mencetak lampiran kegiatan selama prakerin dengan menekan ctrl + p seperti layaknya melakukan print seperti biasanya.
			</p>			
			<p class="text-justify">
			Untuk edit profil hanya bisa mengubah nama, nis, dan jurusan. sedangkan ubah password cukup memasukkan password baru. jadi berhati-hatilah dalam menggunakannya ya :) .
			</p>			
			<a href="#awal" class="btn btn-info">Kembali ke atas</a>
		</div>
	<br/>
  </div>
  <footer class="footer footer-default text-info">
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
        </script>        
      </div>
    </div>
  </footer>
  
	<script src="<?php echo base_url("assets/js/core/jquery.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/core/popper.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/core/jquery-slim.min.js");?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/moment.min.js"); ?>"  type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"  type="text/javascript"></script>          
    <script src="<?php echo base_url("assets/js/core/bootstrap-material-design.min.js");?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/plugins/nouislider.min.js");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/material-kit.js?v=2.0.4");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/modernizr.custom.js");?>" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/plugins/holder.min.js");?>" type="text/javascript"></script>	
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
