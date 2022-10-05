<?php
class SiswaModel extends CI_Model{
	function __construct(){
		parent::__construct();
		//$this->load->database(); jangan di load, soalnya udah autoload dari autoload.php
	}
	
	//menambah data

	function selectByKodeReferal($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('akun_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		return $this->db->get();
	}

	function checkMatching($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('akun_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		$this->db->where('aktivasi_akun',0);
		$query = $this->db->get();		
		if($query->num_rows() > 0)
		{						
			return $query->num_rows();
		}else
		{
			return false;
		}
	}
	
	function cocokVerifikasi($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('akun_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		$this->db->where('aktivasi_akun',0);
		$query = $this->db->get();		
		if($query->num_rows() > 0)
		{						
			return $query->row_array();
		}else
		{
			return 0;
		}
	}

	function checkUsername($kdPetugas)
	{
		//cek agar tidak ada yang sama.
		$this->db->select('username_akun');
		$this->db->from('akun_siswa');
		$this->db->where('username_akun',$kdPetugas);
		$query = $this->db->get();		
		if($query->num_rows() > 0)
		{						
			return $query->num_rows();
		}else
		{
			return false;
		}
	}

	function getAkunSiswaByRef($idSiswa)
	{
		$this->db->select('*');		
		$this->db->where('kode_referal',$idSiswa);
		$query = $this->db->get('akun_siswa');		
		return $query->row();
	}

	
	function getSekolahByRef($idSiswa)
	{
		$this->db->select('*');		
		$this->db->where('kode_referal',$idSiswa);
		$query = $this->db->get('data_sekolah');		
		return $query->row();
	}

	function getAkunSiswaByRefArray($idSiswa)
	{
		$this->db->select('*');		
		$this->db->where('kode_referal',$idSiswa);
		$query = $this->db->get('akun_siswa');		
		return $query->row_array();
	}

	function updateWaktuLogin($id_jurnal1, $id_jurnal2,  $data)
	{
		$this->db->set('waktu_login', $data);
		$this->db->where('username_akun',$id_jurnal1);
		$this->db->where('password_akun',$id_jurnal2);
		$this->db->update('akun_siswa');
	}

	function registerAkun($id_jurnal, $data)
	{
		$this->db->where('kode_referal',$id_jurnal);
		$this->db->update('akun_siswa',$data);
		$qVal = $this->db->affected_rows();
		if($qVal > 0){
			return $qVal;
		}else{
			return 0;
		}
	}

	function aktivasiAkun($id_jurnal)
	{
		$val = 1;
		$this->db->set('aktivasi_akun',$val);
		$this->db->where('kode_referal',$id_jurnal);
		$this->db->update('akun_siswa');		
	}

	function selectKRByUsername($kdPetugas)
	{
		$this->db->select('kode_referal');
		$this->db->from('akun_siswa');
		$this->db->where('username_akun',$kdPetugas);
		$query = $this->db->get();
		$row = $query->row();
		return $row->kode_referal;
	}

	function selectPassByReferal($kdPetugas)
	{
		$this->db->select('password_akun');
		$this->db->from('akun_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		$query = $this->db->get();
		$row = $query->row();
		return $row->password_akun;
	}

	function selectSiswaByUsername($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('akun_siswa');
		$this->db->where('username_akun',$kdPetugas);
		return $this->db->get();
	}

	function getAkunSiswaByUnameArray($idSiswa)
	{
		$this->db->select('*');		
		$this->db->where('username_akun',$idSiswa);
		$query = $this->db->get('akun_siswa');		
		return $query->row_array();
	}
	
	function getDataSiswaByRefArray($idSiswa)
	{
		$this->db->select('*');		
		$this->db->where('kode_referal',$idSiswa);
		$query = $this->db->get('data_siswa');		
		return $query->row_array();
	}
	
	function getTglAbsenSiswaByKodeArray($idSiswa,$idpemb)
	{
		$this->db->select('*');		
		$this->db->where('kode_referal',$idSiswa);
		$this->db->where('kode_masuk',$idpemb);
		$this->db->order_by('waktu_kehadiran','DESC');
		$query = $this->db->get('absensi');
		return $query->row_array();
	}
	
	function getAbsenSiswaByKodeArray($kdRef)
	{
		$this->db->select('*');		
		$this->db->where('kode_referal',$kdRef);		
		$this->db->order_by('waktu_kehadiran','DESC');		
		return $this->db->get('absensi');
	}

	function selectKodeLabByKodeRef($kdPetugas)
	{
		$this->db->select('kode_lab');
		$this->db->from('data_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		$query = $this->db->get();
		$row = $query->row();
		return $row->kode_lab;
	}

	function selectNamaLabById($idk){
		$this->db->select('nama_lab');
		$this->db->from('laboratorium');	
		$this->db->where('id_lab',$idk);	
		$query = $this->db->get();
		$row = $query->row();
		return $row->nama_lab;
	}

	function selectLabByKode($id){
		$this->db->select('*');
		$this->db->from('laboratorium');
		$this->db->where('id_lab',$id);
		return $this->db->get();
	}

	function selectNPembLabByKode($idLab, $idpemb){
		$this->db->select('nama_pemb_lab');
		$this->db->from('pembimbing_lab');
		$this->db->where('id_lab',$idLab);
		$this->db->where('id_pemb_lab',$idpemb);
		return $this->db->get();
	}

	function selectIdPembLabByRef($idk){
		$this->db->select('id_pemb_lab');
		$this->db->from('data_siswa');	
		$this->db->where('kode_referal',$idk);	
		$query = $this->db->get();
		$row = $query->row();
		return $row->id_pemb_lab;
	}

	function getIdAkun($kdPetugas)
	{
		$this->db->select('id_akun');
		$this->db->from('akun_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		$query = $this->db->get();
		$row = $query->row();
		return $row->id_akun;
	}

	function getKdMasukByReferal($kdPetugas)
	{
		$this->db->select('kode_masuk');
		$this->db->from('data_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		$query = $this->db->get();
		$row = $query->row();
		return $row->kode_masuk;
	}

	function getPembimbing($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_pembimbing');
		$this->db->where('kode_masuk',$kdPetugas);
		return $this->db->get();
	}

	function getSekolah($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_sekolah');
		$this->db->where('kode_masuk',$kdPetugas);
		return $this->db->get();
	}

	function getAkun($kdPetugas)
	{
		$this->db->select('id_akun');
		$this->db->from('akun_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		return $this->db->get();
	}

	function updateIdAkunDSiswa($kode_ref, $data)
	{
		$this->db->set('id_akun',$data);
		$this->db->where('kode_referal',$kode_ref);
		$this->db->update('data_siswa');
	}	
	
	function selectDatSisByRef($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		$query = $this->db->get();
		return $query->row();
	}
	
	function selectDatSisByRefArray($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_siswa');
		$this->db->where('kode_referal',$kdPetugas);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function untukDatSisFormArray($kdPetugas,$kdRef)
	{
		$sql = "SELECT nama_siswa, NIS_siswa, jurusan_siswa, nama_sekolah, kode_referal FROM data_siswa, data_sekolah WHERE data_sekolah.kode_masuk = ? AND data_siswa.kode_masuk = ? AND data_siswa.kode_referal = ?";
		$query= $this->db->query($sql, array($kdPetugas, $kdPetugas, $kdRef));		
		return $query->row_array();
	}

	function insertKegiatan($data){
		$this->db->insert('kegiatan_siswa',$data);	
		$qVal = $this->db->affected_rows();
		if($qVal > 0){
			return $qVal;
		}else{
			return 0;
		}
	}
	
	function insertAbsen($data){
		$this->db->insert('absensi',$data);
		$qVal = $this->db->affected_rows();
		if($qVal > 0){
			return $qVal;
		}else{
			return 0;
		}
	}

	function getCountAllKegiatan($kdref){
		$this->db->select('*');	
		$this->db->from('kegiatan_siswa');
		$this->db->where('kode_referal',$kdref);
		$qVal = $this->db->count_all_results();
		if($qVal > 0){
			return $qVal;
		}else{
			return 0;
		}
	}

	function getAllKegiatan($kdref){
		$this->db->select('*');	
		$this->db->from('kegiatan_siswa');
		$this->db->where('kode_referal',$kdref);	
		$this->db->order_by('tanggal_nulis','DESC');

		return $this->db->get();
	}
	
	function getKegiatan($kdref){
		$this->db->select('*');	
		$this->db->from('kegiatan_siswa');
		$this->db->where('id_kegiatan',$kdref);			

		return $this->db->get();
	}

	function selectAll(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user');
		
		//dikembalikan pada get
		return $this->db->get();
	}	

	function selectAllJurnal(){
		$this->db->select('*');
		$this->db->from('jurnal');
		$this->db->order_by('id_jurnal');
		
		//dikembalikan pada get
		return $this->db->get();
	}	
	
	function get_akun($uname, $password)
	{
		$this->db->where('uname_admin', $uname);
		$this->db->where('pwd_admin', md5($password));
        $query = $this->db->get('admin');
		return $query->result();
	}
	
	function get_akunVer($uname)
	{
		$this->db->where('kode_referal', $uname);		
        $query = $this->db->get('akun_siswa');
		return $query->row_array();
	}

	function get_admin_by_id($id)
	{
		$this->db->where('id_admin', $id);
        $query = $this->db->get('admin');
		return $query->result();
	}

	function get_user_by_id($id)
	{
		$this->db->where('id_user', $id);
        $query = $this->db->get('user');
		return $query->result();
	}

	function j_selectAll(){
		$this->db->select('*');
		$this->db->from('jurnal');
		$this->db->order_by('id_jurnal');
		
		//dikembalikan pada get
		return $this->db->get();
	}

	function updateJurnal($id_jurnal, $data)
	{
		$this->db->where('id_jurnal',$id_jurnal);
		$this->db->update('jurnal',$data);
	}
	
	function updateTulisan($id_jurnal, $data)
	{
		$this->db->where('id_kegiatan',$id_jurnal);
		$this->db->update('kegiatan_siswa',$data);
		$qVal = $this->db->affected_rows();
		if($qVal > 0){
			return $qVal;
		}else{
			return 0;
		}
	}

	function deleteJurnal($id_jurnal)
	{
		$this->db->where('id_jurnal',$id_jurnal);
		$this->db->delete('jurnal');
	}

	function insertJurnal($data){
		$this->db->insert('jurnal',$data);	
	}

	function updateProfil($id_jurnal, $data)
	{
		$this->db->where('kode_referal',$id_jurnal);
		$this->db->update('data_siswa',$data);
	}
	
	function updateAkun($id_jurnal, $data)
	{
		$this->db->where('kode_referal',$id_jurnal);
		$this->db->update('akun_siswa',$data);
	}

	function updateAnggota($id_admin, $data)
	{
		$this->db->where('id_user',$id_admin);
		$this->db->update('user',$data);
	}

	function deleteAnggota($id_anggota)
	{
		$this->db->where('id_user',$id_anggota);
		$this->db->delete('user');
	}
}
?>