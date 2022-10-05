<?php
class Siswa_Login extends CI_Controller {
  public function __construct()
  {

		parent::__construct();
		$this->load->helper(array('form','html','security'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->model('SiswaModel');
		if(!empty($this->session->userdata("Siswalogin")))
        {
			redirect('Beranda/index');
        }        
  }

  public function index()
  {

		// get form input
		$username = $this->input->post("username");
        $pass = $this->input->post("password");

		// form validation
		
		//how to db-ing?
		$this->form_validation->set_rules("username", "username", "trim|required|xss_clean");
		$this->form_validation->set_rules("password", "password", "trim|required|xss_clean");				
		
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$this->load->view('V_signin');
		}
		else
		{			
			// check for user credentials			
			$data_sis = $this->SiswaModel->getAkunSiswaByUnameArray($username);
			$kodRef = $this->SiswaModel->selectKRByUsername($data_sis['username_akun']);
			$persona = $this->SiswaModel->selectDatSisByRefArray($kodRef);
			$hash = $this->SiswaModel->selectPassByReferal($kodRef);
			$res = password_verify($pass, $hash); 			
			$act = $data_sis['aktivasi_akun'];
			//$uresult = $this->adminModel->get_akun($username, $password);
			//if ($uresult > 0)
			if($act==1){
				if($res==TRUE)			
				{
					// set session				
					$sess_data = array('Siswalogin' => TRUE, 'uname' => $data_sis['username_akun'], 'kode_referal' => $data_sis['kode_referal'], 'kode_masuk' => $data_sis['kode_masuk'], 'status_prakerin' => $persona['status_penerimaan_lab']);
					$this->session->set_userdata($sess_data);
					redirect("Beranda/index");
				}
				else
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Username atau 
					Password Salah!</div>');
					//$this->session->set_flashdata('msg2', $hash);
					//$this->session->set_flashdata('msg3', $res);
					redirect('Siswa_Login/index');
				}
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Akun Tidak Terdaftar!</div>');					
					redirect('Siswa_Login/index');
			}
		}
  }

  public function LupaPassword()
  {

		$this->load->view("V_lupa");
  }

  public function Step1()
  {


		$this->form_validation->set_rules("kode_referal", "kode_referal", "trim|required|min_length[5]|max_length[30]");        
		$uname = $this->input->post("kode_referal");//kode_referal pas di acc.
		//$hash = password_hash($password, PASSWORD_DEFAULT); 
		
		$tes = $this->SiswaModel->get_akunVer($uname);
		$uname = $tes['username_akun'];		
		$id = $tes['kode_referal'];				
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$this->load->view('V_lupaPass');
		}
		else
		{											
			if($uname == NULL){
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');				
				redirect('Siswa_Login/LupaPassword');
			}else{
				$this->session->set_flashdata('no_akun',$id);				
				redirect('Siswa_Login/Step2');
			}			
		}			
  }

  public function Step2()
  {


		$this->form_validation->set_rules("passBaru", "passBaru", "trim|required|min_length[5]|max_length[30]");        
		$pass = $this->input->post("passBaru");//kode_referal pas di acc.		
		$id = $this->session->flashdata('no_akun');
		$this->session->keep_flashdata('no_akun');
				
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$this->load->view('V_lupa2');
		}
		else
		{																		
			$hash = password_hash($pass, PASSWORD_DEFAULT); 
			$data['password_akun'] = $hash;	
			$this->SiswaModel->updateAkun($id, $data);
			redirect('Siswa_Login/index');			
		}			
  }

}

