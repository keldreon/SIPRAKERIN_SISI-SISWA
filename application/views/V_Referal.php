<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Aktivasi Akun &nbsp| Sistem Informasi Praktik Kerja Industri</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/css/material-kit.css?v=2.0.4"); ?>" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets/css/signin.css");?>" rel="stylesheet">	
	<!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">	
	
  </head>

   <body class="bg login-page"> 
  <main class="container-fluid no-gutters" role="main">  
  <div class="row align-items-center h-100 justify-content-center no-gutters">	
		<div class="col-12 col-sm-4 col-lg-4 align-self-center order-first order-md-0 fillWidth bordah"> 			
			<?php $attributes = array("class"=>"form-signin no-gutters");
				echo form_open("Register/index", $attributes);?>
			<!--<img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
			<h1 class="h3 mb-3 font-weight-normal">Aktivasi Akun</h1>
			<?php print_r($this->session->flashdata('msg')); ?>    
			<br/>        
			<label for="inputEmail" class="sr-only">Masukkan Kode Referal.</label>
			<input name="kode_referal" id="inputEmail" class="form-control input-lg" placeholder="Kode Referal" value="<?php echo set_value('kode_referal'); ?>" required autofocus>    			
			<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button> 
			<p class="mt-4 mb-3 text-muted">Sudah melakukan aktivasi? <a href="<?php echo site_url('Siswa_Login/index/' );?>" >Login.</a></p>                      			
			<?php echo form_close();?>				
		</div>
		</div>				
		</main>		
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
