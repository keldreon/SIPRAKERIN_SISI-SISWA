<?php
class Beranda extends CI_Controller {
  public function __construct()
  {

		parent::__construct();
		$this->load->helper(array('form','url','html','security','date', 'string'));
        $this->load->library(array('session', 'form_validation'));        
		$this->load->model('SiswaModel');
		if(empty($this->session->userdata("Siswalogin")))
        {
		 	$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Session Habis, silakan login lagi.</div>');
        	redirect('Siswa_Login/index','refresh');
        }
		/*else{
			$abs = $this->verAbsen();		
			$this->session->set_flashdata('absBtn',$abs);		
		}*/
  }

  function editTulisan($id)
  {

		$this->session->set_userdata('referred_from', current_url());
		$referal = $this->session->userdata("kode_referal");
		$data['data_siswa'] = $this->SiswaModel->selectDatSisByRef($referal);//load 			
		//$this->load->view('V_homepage',$data);		
		$tes = $this->SiswaModel->selectKodeLabByKodeRef($referal);
		$data['lab'] = $this->SiswaModel->selectLabByKode($tes)->row();
		$data['kegiatanku'] = $this->SiswaModel->getKegiatan($id)->row();
		$this->load->view('V_edittulisan',$data);
  }

  function index()
  {

		$this->session->set_userdata('referred_from', current_url());
		//$data['data_pengajuan'] = $this->adminModel->selectAllPengajuan();//load 				
		$referal = $this->session->userdata("kode_referal");
		$data['data_siswa'] = $this->SiswaModel->selectDatSisByRef($referal);//load 			
		//$this->load->view('V_homepage',$data);		
		$tes = $this->SiswaModel->selectKodeLabByKodeRef($referal);
		$data['lab'] = $this->SiswaModel->selectLabByKode($tes)->row();
		$data['kegiatanku'] = $this->SiswaModel->getAllKegiatan($referal);
		$this->load->view('V_homepage',$data);
  }

  function logout()
  {

		// destroy session		
        $data = array('Siswalogin' => '', 'uname' => '', 'kode_referal' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('Siswa_Login/index');
  }

  function tulisKegiatan()
  {
	
		$this->session->set_userdata('referred_from', current_url());
		$referal = $this->session->userdata("kode_referal");
		$dataAll['data_siswa'] = $this->SiswaModel->selectDatSisByRef($referal);
		$tes = $this->SiswaModel->selectKodeLabByKodeRef($referal);
		$id_asis = $this->SiswaModel->selectIdPembLabByRef($referal);
		$kdmasuk = $this->SiswaModel->getKdMasukByReferal($referal);

		$dataAll['lab'] = $this->SiswaModel->selectLabByKode($tes)->row();
		$dataAll['lab2'] = $this->SiswaModel->selectNPembLabByKode($tes, $id_asis)->row();
		$dataAll['pemb'] = $this->SiswaModel->getPembimbing($kdmasuk)->row();	
		$dataAll['sekolah'] = $this->SiswaModel->getSekolah($kdmasuk)->row();
		$dataAll['akun'] = $this->SiswaModel->getAkun($referal)->row();

		$this->load->view('V_tulisKegiatan', $dataAll);
  }

  public function prosestulisKegiatan()
  {
		
		$this->form_validation->set_rules('judul_kegiatan', 'judul_kegiatan', 'trim|required|min_length[1]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('kegiatanku', 'kegiatanku', 'trim|required|min_length[1]|xss_clean');
		$kLab = $this->input->post("kode_lab");
		$idSis = $this->input->post("sisw");
		$pembLab = $this->input->post("kode_pemb_lab");		
		$idSekolah = $this->input->post("id_sekolah");
		$idAkun = $this->input->post("id_aku");
		$idpemb = $this->input->post("id_pembimbing");
		$kdm = $this->input->post("kode_masuk");
		$referal = $this->session->userdata("kode_referal");
		$judul = $this->input->post("judul_kegiatan");
		$isi = $this->input->post("kegiatanku");
		$tes = $this->SiswaModel->selectKodeLabByKodeRef($referal);
		$data['lab'] = $this->SiswaModel->selectLabByKode($tes)->row();

		$tanggal = date('Y-m-d H:i:s');
		if ($this->form_validation->run() == FALSE)
        {
			// fails			
			redirect('Beranda/tulisKegiatan','refresh');
        }
		else
		{			
			$data = array(
				"id_sekolah" => $idSekolah,
				"id_pembimbing" => $idpemb,
				"id_siswa" => $idSis,
				"id_akun" => $idAkun,
				"kode_masuk" => $kdm,
				"kode_referal" => $referal,
				"judul_tulisan" => $judul,
				"isi_tulisan" => $isi,
				"id_pemb_lab" => $pembLab,
				"id_lab" => $kLab,
				"tanggal_nulis" => $tanggal
			);
			$cek = $this->SiswaModel->insertKegiatan($data);
			if($cek >0){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Penulisan Kegiatan Berhasil. </div>');
				redirect('Beranda/index/','refresh');	
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Terjadi Galat, Silakan Coba Lagi. </div>');                                
				redirect('Beranda/tulisKegiatan/','refresh');	
			}										
		}
  }

  function prosesEdit()
  {

			$this->form_validation->set_rules('userfile', '', 'callback_file_check');			
			//$this->form_validation->set_rules('status_pengajuan_lab', 'Status Pengajuan', 'required');
			
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 15000;
			$this->load->library('upload', $config);
						
			$tanggal = date('Y-m-d H:i:s');						
			$kode_masuk = $this->input->post('kode_masuk');
			$datVal = $this->input->post('dataVal');			
			$stVal= $this->input->post('status_pengajuan_lab');
			$id_siswa = $this->input->post('NIS');			
			$t_awal = $this->input->post('date_start');
			$t_akhir = $this->input->post('date_end');			
			$dataPembLab = $this->input->post('pembimbing_lab');
			
			$this->adminModel->updateStatusLabSiswa($stVal,$id_siswa);//status dan id_siswa							
									
			$kode2 = random_string('numeric', 10);//referal buat siswa 1.
			$kode3 = random_string('numeric', 10);//referal buat siswa 1.
			$kode4 = random_string('numeric', 10);//referal buat siswa 1.
			
			$datakodeRef = array();			
			array_push($datakodeRef,$kode2);
			array_push($datakodeRef,$kode3);
			array_push($datakodeRef,$kode4);
			
			//simpan status_pengajuan_lab pada siswa
			//jangan lupa cek akun_siswa jangan sampai ada kesamaan.
			//pakai ini cek nya $this->adminModel->cekAkunSiswa($idSiswa);			
			$dataAkun = array();
			$dataSiswa = array();
			for($x=0;$x<sizeof($stVal);$x++){
				if($stVal[$x]==1){
						$dataAkun['id_siswa'] = $id_siswa[$x];
						$dataAkun['kode_masuk'] = $kode_masuk;
						$dataAkun['kode_referal']= $datakodeRef[$x];
						$d_tAwal = $t_awal;
						$d_tAkhir = $t_akhir;
						$this->adminModel->insertAkunSiswa($dataAkun);
						$this->adminModel->updateKodePembLabSiswa($dataPembLab[$x], $dataAkun['id_siswa']);//status dan id_siswa	
						$this->adminModel->updateTglMagangSiswa($d_tAwal[$x], $d_tAkhir[$x], $dataAkun['id_siswa']);
				}
			}												
						
			//upload sections
			if(!$this->upload->do_upload('userfile')){
					//$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');				
					redirect('Home/klikPengajuan/' .$kode_masuk);								
			}else{
					$file_data = $this->upload->data();
                    $fname = $file_data['file_name'];//simpan ke data_sekolah + data_pengajuan
					//upload file + nama file rujukan...																			
					
					//update  status_pengajuan_lab & kode_referalnya.ke data_siswa +akun_siswa.
					$this->adminModel->updateFileBalasan($kode_masuk, $fname);				
			}			
			//$this->adminModel->updateStausLabSiswaByNIS($stVal,$id_siswa);
			redirect(site_url('Home'));
  }

  public function klikAbsen()
  {

		$no_rep = $this->session->userdata("kode_referal");
		$kd_pemb = $this->session->userdata("kode_masuk");
		$datSis = $this->SiswaModel->getDataSiswaByRefArray($no_rep);
		
		//get tanggal absen teratas...	
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d H:i:s');		
		$tanggalIni = new DateTime();
		$hasilTgl = $this->SiswaModel->getTglAbsenSiswaByKodeArray($no_rep,$kd_pemb);
		$absen = new DateTime($hasilTgl['waktu_kehadiran']);		
		$fixhadir = 1 ;
		$tes = $hasilTgl['waktu_kehadiran'];
		
		//$timestamp1 = strtotime($absen['waktu_kehadiran']); 
		//$timestamp2 = strtotime($tanggalIni); 
							
		if($tes == NULL){
			$data = array(
					"kode_masuk" => $kd_pemb,
					"kode_referal" => $no_rep,
					"nama_siswa" => $datSis['nama_siswa'],
					"hadir" => $fixhadir,					
					"waktu_kehadiran" => $tanggal
				);
				$cek = $this->SiswaModel->insertAbsen($data);
				if($cek >0){
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Absen Berhasil. </div>');												
					$referred_from = $this->session->userdata('referred_from');
					redirect($referred_from, 'refresh');
					//redirect('Absen/index/','refresh');
				}else{
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Terjadi Galat, Silakan Coba Lagi. </div>');                                									
					$referred_from = $this->session->userdata('referred_from');
					redirect($referred_from, 'refresh');
					//redirect('Absen/index/','refresh');	
				}
		}else{								
			$interval = $tanggalIni->diff($absen); //tanggal hari ini dibandingkan dengan tanggal absen
			$angka = $interval->days;		
			//$this->session->set_flashdata('msg2',$angka);
				
			if($angka == 0)
			{
				// fails											
				$this->session->set_flashdata('msg','<div class="alert alert-info"> <div class="container"> <div class="alert-icon"> <i class="material-icons">info_outline</i> </div> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="material-icons">clear</i></span> </button> <b>Info :</b> Anda Sudah Mengecek kehadiran atau Jarak waktu belum mencapai 24 jam dari absen sebelumnya, silakan cek di status acc di menu Daftar Kehadiranku.</div> </div>');
				$referred_from = $this->session->userdata('referred_from');
				redirect($referred_from, 'refresh');
			}
			else
			{						
				$data = array(
					"kode_masuk" => $kd_pemb,
					"kode_referal" => $no_rep,
					"nama_siswa" => $datSis['nama_siswa'],
					"hadir" => $fixhadir,					
					"waktu_kehadiran" => $tanggal
				);
				$cek = $this->SiswaModel->insertAbsen($data);			
				if($cek >0){
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Absen Berhasil. </div>');												
					$referred_from = $this->session->userdata('referred_from');
					redirect($referred_from, 'refresh');
				}else{
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Terjadi Galat, Silakan Coba Lagi. </div>');                                									
					$referred_from = $this->session->userdata('referred_from');
					redirect($referred_from, 'refresh');
				}												
			}
		}
  }

  function Profil()
  {

		$this->session->set_userdata('referred_from', current_url());
		$referal = $this->session->userdata("kode_referal");
		$dataAll['data_siswa'] = $this->SiswaModel->selectDatSisByRef($referal);
		$tes = $this->SiswaModel->selectKodeLabByKodeRef($referal);
		$id_asis = $this->SiswaModel->selectIdPembLabByRef($referal);
		$kdmasuk = $this->SiswaModel->getKdMasukByReferal($referal);

		$dataAll['lab'] = $this->SiswaModel->selectLabByKode($tes)->row();
		$dataAll['lab2'] = $this->SiswaModel->selectNPembLabByKode($tes, $id_asis)->row();
		$dataAll['pemb'] = $this->SiswaModel->getPembimbing($kdmasuk)->row();	
		$dataAll['sekolah'] = $this->SiswaModel->getSekolah($kdmasuk)->row();
		$dataAll['akun'] = $this->SiswaModel->getAkunSiswaByRef($referal);
		$dataAll['kegiatanku'] = $this->SiswaModel->getAllKegiatan($referal);
		
		$this->load->view('V_profil', $dataAll);
  }

  function editDataProfil()
  {

	
		$referal = $this->session->userdata("kode_referal");		
		$data['NIS_siswa'] = $this->input->post('nis');
		$data['nama_siswa'] = $this->input->post('nama');			
		$data['jurusan_siswa'] = $this->input->post('jurusan');

		$this->SiswaModel->updateProfil($referal, $data);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Perubahan Berhasil. </div>');							
		redirect(site_url('Beranda/Profil'));
		
  }

  function editGantiPass()
  {

	
		$referal = $this->session->userdata("kode_referal");
		$pass = $this->input->post('passBaru');
		$hash = password_hash($pass, PASSWORD_DEFAULT); 
		$data['password_akun'] = $hash;	

		$this->SiswaModel->updateAkun($referal, $data);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Perubahan Berhasil. </div>');							
		redirect(site_url('Beranda/Profil'));
		
  }

  public function prosesedittulisKegiatan()
  {
						
		$id = $this->input->post('kode_teks');
		$referal = $this->session->userdata("kode_referal");
		$judul = $this->input->post("judul_kegiatan");
		$isi = $this->input->post("kegiatanku");
		
		$tanggal = date('Y-m-d H:i:s');							
        		
		$data = array(				
				"judul_tulisan" => $judul,
				"isi_tulisan" => $isi,
				"tanggal_edit"=>$tanggal
		);
		$cek = $this->SiswaModel->updateTulisan($id,$data);			
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Pengubahan Berhasil</div>');                                
		redirect('Beranda/index/','refresh');						
  }

}

