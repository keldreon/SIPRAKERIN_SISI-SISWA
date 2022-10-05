<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Formulir Aktivasi | Sistem Praktek Kerja Industri</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />
    
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">	
  </head>

  <body class="bg login-page">  
  <div class="page-header header-filter" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(20).jpg'); background-size: cover; background-position: top center;">
	<div class="container">		
		<div class="row justify-content-center">			
		<div class="col-lg-6 col-md-6 col-sm-4 col-md-offset-2 align-self-center mr-auto ml-auto">								
			<?php echo $this->session->flashdata('msg'); ?>       			
				<div class="card card-login">				
				<?php $attributes = array("class"=>"form-signin needs-validation");
				echo form_open("Register/saveData", $attributes);?>    
				<div class="card-header card-header-primary text-center">
						<h4 class="card-title">Formulir Data Akun</h4>
						<div class="social-line">		
							&nbsp
						</div>
				</div>
				<div class="card-body">	
				<?php $data_akun = $this->session->flashdata('data_akun'); ?> 
				<p> Data Diri</p>
				<div class="row"> 				
				<input type="hidden" class="form-control" id="kode_referal" name="kode_referal" placeholder="" value="<?php echo $data_akun['kode_referal']; ?>" readonly/>    
					<div class="col-md-6 mb-2">
						<label for="lastName">NIS</label>
						<input type="text" class="form-control" id="nis" placeholder="" value="<?php echo $data_akun['NIS_siswa']; ?>" readonly/>  
					</div>
					<div class="col-md-6 mb-2">
						<label for="firstName">Nama</label>
						<input type="text" class="form-control" id="nama" placeholder="" value="<?php echo $data_akun['nama_siswa']; ?>" readonly/>    
					</div>
				</div>								
				<div class="row">           				
					<div class="col-md-6 mb-2">
						<label for="jurusan">Pembimbing</label>
						<input type="text" class="form-control" id="jurusan" placeholder="" value="<?php echo $data_akun['jurusan_siswa']; ?>" readonly/>    
					</div>
					<div class="col-md-6 mb-2">
						<label for="sekolah">Sekolah</label>
						<input type="text" class="form-control" id="sekolah" placeholder="" value="<?php echo $data_akun['nama_sekolah']; ?>" readonly/>    
					</div>
				</div><br/>
            <div class="mb-2">    				
              <div class="input-group">                
                <input name="username" type="text" class="form-control" id="username" placeholder="Username"  value="<?php set_value('username');?>" required>				
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>                        
            <div class="mb-2">              
              <input name="password" type="password" class="form-control" id="password" placeholder="Password" value="<?php set_value('password');?>" required>
            </div>                                                            
			<br/>
			<div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>            
				<div class="card-footer">	
				<button class="btn btn-primary btn-lg btn-block" type="submit">Aktifkan</button>							
				<a class="btn btn-lg btn-block" href="<?php echo site_url('Register/index/' );?>" >Batalkan</a>			
				</div>
			<?php echo form_close(); ?>    
		</div>
        </div>		
	</div>
	</div>
	</div>
	
	</div>
		<footer class="footer">
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
	
  </body>
</html>
