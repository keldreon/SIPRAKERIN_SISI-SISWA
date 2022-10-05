 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
  public function __construct()
  {

        parent::__construct();
        $this->load->helper(array('form','url','html','security','date', 'string'));        
        $this->load->model('SiswaModel');  
        $this->load->library(array('form_validation'));              
  }

  public function index()
  {

        // get form input        
        //$no_rek = $this->input->post("no_rek");//no_rekening?        
        //$nominal_koin = $this->input->post("nominal_koin");//nominal_koin
        //insert harga koin

        // form validation
        $username = $this->input->post("kode_referal");//kode_referal pas di acc.
        $this->form_validation->set_rules("kode_referal", "Kode Referal", "trim|required");                 		
        
        if ($this->form_validation->run() == FALSE)
        {
            // validation fail                     
            $this->load->view('V_Referal');
        }
        else
        {
            // check for user credentials
            $uresult = $this->SiswaModel->checkMatching($username);
			$tes = $this->SiswaModel->cocokVerifikasi($username);
            if ($uresult > 0 && $tes['username_akun'] == NULL)
            {					
				// untukDatSisForm($kmasuk,$username)
				$kmasuk = $this->SiswaModel->getKdMasukByReferal($username);
                $data = $this->SiswaModel->untukDatSisFormArray($kmasuk,$username);
                $this->session->set_flashdata('data_akun',$data);
                redirect('Register/registration');      
                //$data['data_akun'] = 				
					//
                //$this->load->view('V_Register', $data);                               
                //redirect('Register/index/'.$data);
            }
            else 
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-info text-center">Kode Salah atau Akun Sudah Diaktivasi.</div>');
                redirect('Register/index');
            }
        }
  }

  public function registration()
  {
    
        //$this->session->keep_flashdata('data_akun');            
		$this->session->keep_flashdata('data_akun');
        $this->load->view('V_Register');
        
		if($this->session->flashdata('data_akun')==NULL){
            $this->session->flashdata('msg');
            redirect('Register/index');
        }
  }

  public function saveData()
  {
        
        $this->form_validation->set_rules("username", "username", "trim|required|min_length[5]|max_length[30]");//mungkin bakal diganti sama kode_referal
        $this->form_validation->set_rules("password", "password", "trim|required|min_length[5]|max_length[30]");        
        /*<!--<label for="inputPassword" class="sr-only">Konfirmasi Password</label>
      <input type="password" name="passwordVer" class="form-control" placeholder="Konfirmasi Password" value="<?php echo set_value('passwordVer'); ?>" required autofocus>-->*/
        /*$this->form_validation->set_rules('passwordVer', 'Password Verification', 'required|matches[password]|min_length[3]|max_length[30]');*/

        //try with salt password checker php.
        $tanggal = date('Y-m-d H:i:s');        
        $pass = $this->input->post("password");                    
        $ref = $this->input->post("kode_referal");                
        $hash = password_hash($pass, PASSWORD_DEFAULT); 

        if ($this->form_validation->run() == FALSE)
        {
            // validation fail                                                
            redirect('Register/registration');
        }
        else
        {
            // check for user credentials
            //$res = password_verify($pass, $hash); if($res==TRUE)            
            $data = array(
                'username_akun'=> $this->input->post("username"),
                'password_akun' => $hash,
                'tanggal_daftar' => $tanggal                
            );
            /*$data1 = $this->input->post("username");
            $data2 = $hash;
            $data3 = $tanggal;*/
            //$this->load->view('V_Register', $data);
            $logi = $this->SiswaModel->registerAkun($ref, $data);            
            $this->SiswaModel->aktivasiAkun($ref);
            $iAkun = $this->SiswaModel->getIdAkun($ref);
            $this->SiswaModel->aktivasiAkun($ref);
            $this->SiswaModel->updateIdAkunDSiswa($ref, $iAkun);
            if($logi > 0){
            /*if($this->SiswaModel->registerAkun($ref, $data1, $data2, $data3)){*/
                //$this->load->view('V_statusDaftar', $data2);
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Register Berhasil. </div>');                
                redirect('Register/index');    
            }else{
                //$error = $this->db->error();
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Terjadi Galat, Silakan Coba Lagi. </div>');                                
                redirect('Register/index');    
            }            
        }
  }

}




?>