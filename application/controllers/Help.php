<?php
class Help extends CI_Controller {
  public function __construct()
  {

		parent::__construct();
		$this->load->helper(array('form','url','html','security','date', 'string'));
        $this->load->library(array('session', 'form_validation'));        
		$this->load->model('SiswaModel');				
  }

  public function index()
  {

		$this->load->view('V_helpSiswa');
  }

}

