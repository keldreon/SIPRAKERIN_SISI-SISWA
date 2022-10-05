<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Profil | Sistem Informasi Praktik Kerja Industri</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />  
  <!-- CSS Files -->
  <link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />    
  <link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css" />    
  <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet" type="text/css" />    
  <style>
	.borderless tr td, .borderless tr th {border: none;}	
  </style>
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
				<li class="nav-item dropdown active">
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

 <div class="page-header header-filter d-print-none" data-parallax="true" ></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container d-print-none">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">             
              <div class="name">
                <h3 class="title text-success"><?php echo $data_siswa->nama_siswa;?></h3>
                <h6><?php echo $akun->username_akun;?>
					<?php if($akun->aktivasi_akun == 1){?>
						<i class="fa fa-check-circle"></i>
					<?php }else if($akun->aktivasi_akun == 0){?>
						<i class="fa fa-times-circle"></i>
					<?php } ?>
				</h6>      					
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center d-print-none">
          <p>Pembimbing, <?php echo $pemb->nama_pembimbing;?> dan Asal Sekolah, <?php echo $sekolah->nama_sekolah;?></p>
		  <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Profil</button>
		  <button class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Ubah Password</button>
        </div>
        <div class="row d-print-none">
          <div class="col-md-12 col-md-offset-2 well">
			<div class="form-group">				
			<?php echo $this->session->flashdata('msg'); ?>       
				<h5 class="title">Biodata</h5>
				<div class="table-responsive">
            		<table class="table table-striped">			
					<tbody>
                		<tr>				
                  		<th>Kode Siswa </th> 
                  		<td><?php echo $data_siswa->kode_referal;?></td>				  						  				  						
                		</tr>
              		</tbody>			  
					<tbody>
                		<tr>				
                  		<th>Nama </th> 
                  		<td><?php echo $data_siswa->nama_siswa;?></td>				  						  				  						
                		</tr>
              		</tbody>			  
					<tbody>
                		<tr>				
                  		<th>Jurusan </th> 
                  		<td><?php echo $data_siswa->jurusan_siswa;?></td>  						  				  						
                		</tr>
              		</tbody>		
					<tbody>
                		<tr>				
                  		<th>NIS </th> 
                  		<td><?php echo $data_siswa->NIS_siswa;?></td>				  						  				  						
                		</tr>
              		</tbody>			  
              		<tbody>
                		<tr>				
                  		<th>Asal Sekolah </th> 
                  		<td><?php echo $sekolah->nama_sekolah;?></td>				  						  				  						
                		</tr>
              		</tbody>			  
              		<tbody>			  
                		<tr>
                  		<th>Alamat Sekolah</th>				  
				  		<td><?php echo $sekolah->alamat_sekolah;?></td>                  				
				  		</tr>				  								
              		</tbody> 
					<tbody>			  
                		<tr>
                  		<th>Pembimbing Lab</th>				  
				  		<td><?php echo $lab2->nama_pemb_lab;?></td>                  				
				  		</tr>				  								
              		</tbody>                     				
            	</table>							
<br/>				
          	</div> 
		</div> 		
        </div>        
      </div>	  
      </div>	  	  
	  <!-- Printable zone -->	  
	  <div class="container d-print-block">
	  <div class="row">
          <div class="col-md-12 col-md-offset-2 well">							
		  <p class="text-info d-print-none">		  
		*Untuk mencetak lampiran kegiatan cukup cetak pada laman ini lewat browser.
		</p>
		  <div class="description text-center d-print-block">
		  <br/>
		  <br/>
		  <h4>Lampiran Kegiatan</h4>			
		  <br/>
		  </div>
		  <div class="table-responsive d-print-table">
		  <p class="text-right d-print-none">Pembimbing : <?php echo $pemb->nama_pembimbing;?></p>		  
		  <?php $i =0?>
		  <?php if(!empty($kegiatanku)){?>
            		<table class="table table-bordered">				
						<tr>
							<td>No</td>
							<td>Tanggal</td>							
							<td>Kegiatan</td>
						</tr>
						<?php foreach($kegiatanku->result() as $keg):?>		  
						<?php $timestamp = strtotime($keg->tanggal_nulis); ?>
						<?php
							$child1 = date('j-n-Y', $timestamp);							
						?>
						<tr>
						<td>  <?php $i = $i+1;?><?php echo $i;?> </td>
						<td> <?php echo $child1;?> 
						</td>
						<td> <?php echo $keg->isi_tulisan;?> </td>						
						</tr>
						<?php endforeach?>
					</table>
				</div>
				<br class="d-none d-print-block"/>
				<div class="table-responsive d-none d-print-block">
					<table class="table borderless">
					<tr>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th> <p class="text-center">Mengetahui</p></td>
					</tr>
					<tr>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>					
					<th>  &nbsp </td>
					</tr>
					<tr>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>
					<th colspan="2"></th>									
					<td> <p class="text-center"><?php echo $lab2->nama_pemb_lab;?></p></td>
					</tr>
					</table>					
				</div>
				</div>
				<?php }else{?>
				<h2 class="text-center title">Tidak ada catatan kegiatan.</h2>
				<?php } ?>
		  </div>
		  </div>
	<!-- End of Printable zone -->  
    </div>	  
  </div>
  </div>  
  <footer class="footer footer-default d-print-none">
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
  <div class="modal fade d-print-none" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
        <?php $attributes = array("class"=>"form-signin", "id"=>"profilform");
      echo form_open("Beranda/editDataProfil", $attributes);?>            
		<div class="form-group bmd-form-group">
        <label for="inputEmail" class="bmd-label-floating">Nama</label>
			<?php //harusnya pake kode_referal pas udah di acc euy. ?>
		<input type="text" name="nama" id="inputNama" class="form-control"  value="<?php echo $data_siswa->nama_siswa;?>" required autofocus>		
		</div>
		<div class="form-group bmd-form-group">
        <label for="inputEmail" class="bmd-label-floating">NIS</label>
			<?php //harusnya pake kode_referal pas udah di acc euy. ?>
		<input type="text" name="nis" id="inputNIS" class="form-control"  value="<?php echo $data_siswa->NIS_siswa;?>" required autofocus/>
		</div>
		<div class="form-group bmd-form-group">
        <label for="inputEmail" class="bmd-label-floating">Jurusan</label>
			<?php //harusnya pake kode_referal pas udah di acc euy. ?>
		<input type="text" name="jurusan" id="inputNIS" class="form-control"  value="<?php echo $data_siswa->jurusan_siswa;?>" required autofocus>
		</div>
        </div>
        <div class="modal-footer">
          <a href="#" name="Submit" id="submit2" class="btn btn-primary">Ubah</a>
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Batal</button>
        </div>
		<?php echo form_close();?>
      </div>
    </div>
  </div>
  <!--  End Modal -->
  <!-- Classic Modal -->
  <div class="modal fade d-print-none" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
		<?php $attributes = array("class"=>"form-signin", "id"=>"passBaruform");
      echo form_open("Beranda/editGantiPass", $attributes);?>            
        <div class="modal-body">		
		<div class="form-group bmd-form-group">
        <label for="inputEmail" class="bmd-label-floating">Password Baru</label>
			<?php //harusnya pake kode_referal pas udah di acc euy. ?>
		<input type="password" name="passBaru" id="inputPassword2" class="form-control"  value="<?php echo set_value('passBaru'); ?>" required autofocus>
		</div>
        </div>
        <div class="modal-footer">
          <a href="#" name="Submit" id="submit3" class="btn btn-primary">Ubah</a>
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Batal</button>
        </div>
      </div>	  
    </div>
  </div>
  <!--  End Modal -->
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
	$('#submit2').click(function(){
			//when the submit button in the modal is clicked, submit the form 			
			$('#profilform').submit();
	});
	
	$('#submit3').click(function(){
			//when the submit button in the modal is clicked, submit the form 			
			$('#passBaruform').submit();
	});
	
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
	</script>
  
</body>
</html>