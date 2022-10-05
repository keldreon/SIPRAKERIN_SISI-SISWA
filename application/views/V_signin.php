<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Sign In Siswa &nbsp |&nbsp Sistem Informasi Praktik Kerja Industri</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />	
	

    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">	
	
  </head>

 <body class="bg login-page"> 
  <div class="page-header header-filter" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(20).jpg'); background-size: cover; background-position: top center;">
	<div class="container">  
		<div class="row">	
			<div class="col-lg-5 col-md-7 align-self-center ml-auto mr-auto">			
			<?php echo $this->session->flashdata('msg'); ?><br/>
					<?php print_r($this->session->flashdata('msg2')); ?>
					<?php print_r($this->session->flashdata('msg3')); ?>
				<div class="card card-login">
					<?php $attributes = array("class"=>"form align-items-center");
					echo form_open("Siswa_Login/index", $attributes);?>    
					<!--<img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->					
					<div class="card-header card-header-primary text-center">
						<h4 class="card-title">Sign In Siswa</h4>
						<div class="social-line">		
							&nbsp
						</div>
					</div>
				<div class="card-body">									
					<div class="form-group bmd-form-group">
						<label for="inputEmail" class="bmd-label-floating">Username</label>
						<?php //harusnya pake kode_referal pas udah di acc euy. ?>
						<input type="username" name="username" id="inputEmail" class="form-control"  value="<?php echo set_value('username'); ?>" required autofocus>
					</div>					
					<div class="form-group bmd-form-group">										
						<label for="inputPassword" class="bmd-label-floating">Password</label>
						<input type="password" name="password" id="inputPassword" class="form-control" value="<?php echo set_value('password'); ?>" required>      						
					</div>													
					<p class="text-right mt-1 mb-1 text-muted">Lupa Password ? Klik <a href="<?php echo site_url('Siswa_Login/LupaPassword/' );?>" >disini.</a></p>
					<div class="form-group bmd-form-group">																
						<button class="btn btn-primary btn-block text-center" type="submit">Sign in</button>					
					</div>																	
				</div>
				<div class="card-footer">										
						<p class="text-center mt-2 mb-2 text-muted">Untuk Aktivasi Akun, klik <a href="<?php echo site_url('Register/index/' );?>" >disini.</a></p>									
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
