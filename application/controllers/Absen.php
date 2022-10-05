 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {
  public function __construct()
  {

        parent::__construct();
        $this->load->helper(array('form','url','html','security','date', 'string'));        
        $this->load->model('SiswaModel');  
        $this->load->library(array('form_validation'));              
		if(empty($this->session->userdata("Siswalogin")))
        {
		 	$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Session Habis, silakan login lagi.</div>');
        	redirect('Siswa_Login/index','refresh');
        }
  }

  public function index()
  {

		//need data diri. ala register
		$kdRef = $this->session->userdata('kode_referal');
		$tes = $this->SiswaModel->selectKodeLabByKodeRef($kdRef);
		$data['lab'] = $this->SiswaModel->selectLabByKode($tes)->row();
		$data['data_siswa'] = $this->SiswaModel->selectDatSisByRef($kdRef);//load 			
		$data['Absensi'] = $this->SiswaModel->getAbsenSiswaByKodeArray($kdRef);
        $this->load->view('V_Absen',$data); 
  }

  public function klikAbsen()
  {
				
		$no_rep = $this->session->userdata("kode_referal");
		$kd_pemb = $this->session->userdata("kode_masuk");
		$datSis = $this->SiswaModel->getDataSiswaByRefArray($no_rep);
		$ktrs = $this->input->post("keterangan");		
		
		//get tanggal absen teratas...	
		date_default_timezone_set('Asia/Jakarta');
		$tanggalIni = new DateTime();
		$hasilTgl = $this->SiswaModel->getTglAbsenSiswaByKodeArray($no_rep,$kd_pemb);
		$tanggal = date('Y-m-d H:i:s');		
		$fixhadir = $this->input->post('hadir');
		$tes = $hasilTgl['waktu_kehadiran'];
		
		if($tes == NULL){
			$data = array(
					"kode_masuk" => $kd_pemb,
					"kode_referal" => $no_rep,
					"nama_siswa" => $datSis['nama_siswa'],
					"hadir" => $fixhadir,
					"keterangan" => $ktrs,
					"waktu_kehadiran" => $tanggal
				);
				$cek = $this->SiswaModel->insertAbsen($data);			
				if($cek >0){
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Absen Berhasil. </div>');							
					redirect('Absen/index/','refresh');
				}else{
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Terjadi Galat, Silakan Coba Lagi. </div>');                                				
					redirect('Absen/index/','refresh');	
				}
		}else{
			$absen = new DateTime($hasilTgl['waktu_kehadiran']);			
		
			//$timestamp1 = strtotime($absen['waktu_kehadiran']); 
			//$timestamp2 = strtotime($tanggalIni); 
		
			$interval = $tanggalIni->diff($absen);		
			$angka = $interval->days;		
			$this->session->set_flashdata('hariini',$angka);		
				
			if($interval->days == 0)
			{
				// fails			
				$this->session->set_flashdata('msg','<div class="alert alert-info text-center">Anda Sudah Mengecek kehadiran, silakan cek di status acc di menu Daftar Kehadiranku. </div>'); 			
				redirect('Absen/index','refresh');
			}
			else
			{						
				$data = array(
					"kode_masuk" => $kd_pemb,
					"kode_referal" => $no_rep,
					"nama_siswa" => $datSis['nama_siswa'],
					"hadir" => $fixhadir,
					"keterangan" => $ktrs,
					"waktu_kehadiran" => $tanggal
				);
				$cek = $this->SiswaModel->insertAbsen($data);			
				if($cek >0){
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Absen Berhasil. </div>');							
					redirect('Absen/index/','refresh');
				}else{
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Terjadi Galat, Silakan Coba Lagi. </div>');                                				
					redirect('Absen/index/','refresh');	
				}												
			}
		}
  }

}




?>