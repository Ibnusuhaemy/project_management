<?php 


class Model_project extends CI_Model 

{


	public function cek_login($table,$where) { 

		return $this->db->get_where($table,$where);

	}

	public function get_data_karyawan($table,$where) { 

		return $this->db->get_where($table,$where);

	}


	public function get_where($table,$where) { 

		return $this->db->get_where($table,$where);

	}


	public function get($table){
		$this->load->database();
		$result = $this->db->get($table);
		$this->db->close();
		return $result;
	}

	public function insert($data, $table){
		$this->load->database();
		$result = $this->db->insert($table,$data);
		$this->db->close();
		return $result;
	}

	public function update($condition, $data, $table){
		$this->load->database();
		$this->db->where($condition);
		$result = $this->db->update($table, $data);
		$this->db->close();
		return $result;
	}

	public function delete($condition, $table){
		$this->load->database();
		$this->db->where($condition);
		$result = $this->db->delete($table);
		$this->db->close();
		return $result;
	}



	public function rawQuery($query){

		$this->load->database();
		$result = $this->db->query($query);
		$this->db->close();
		return $result;
	}



	public function getData($table,$where) { 
		
		$this->load->database();
		$this->db->where($where);
		$this->db->close();
		return $this->db->get($table);

	}




	public function get_all($table) { 

		$this->load->database();
		return $this->db->get($table);
		$this->db->close();

	}

	public function hapus_data($where,$table){

		$this->load->database();
		$this->db->where($where);
		$this->db->delete($table);
		$this->db->close();

	}

//////////

	public function save($tabel,$data)
	{
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	public function get_by_id($table,$where)
	{
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();

		return $query->row();
	}

	public function delete_by_id($table,$where)

	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function update_ajax($table, $where, $data)
	{

		$this->db->where($where);
		$this->db->update($table,$data);

	}

	public function month_converter($date){
		$data='';
		if($date==1){$data='Januari';}
		if($date==2){$data='Febuari';}
		if($date==3){$data='Maret';}
		if($date==4){$data='April';}
		if($date==5){$data='Mei';}
		if($date==6){$data='Juni';}
		if($date==7){$data='Juli';}
		if($date==8){$data='Agustus';}
		if($date==9){$data='September';}
		if($date==10){$data='Oktober';}
		if($date==11){$data='November';}
		if($date==12){$data='Desember';}
		return $data;

	}

	public function get_by_project($table,$where)
	{
		$this->db->select('
			id_project, 
			nama_project,

			sumber_project.id_sumber_project as id_sumber_project,
			status_project.id_status_project as id_status_project,
			klien.id_klien as id_klien,
			kategori_client.id_kategori_client as id_kategori_client,
			
			tanggal_mulai_project,
			tanggal_selesai_project,
			');

		$this->db->from($table);
		$this->db->join('sumber_project', 'project.id_sumber_project = sumber_project.id_sumber_project');
		$this->db->join('status_project', 'project.id_status_project = status_project.id_status_project');
		$this->db->join('klien', 'project.id_client = klien.id_klien');
		$this->db->join('kategori_client', 'project.id_kategori_client = kategori_client.id_kategori_client');

		$this->db->where($where);
		$query = $this->db->get();

		return $query->row();
	}

// 	id_projectt
// nama_project
// sumber_project
// status_project
// klien
// kategori_client
// tanggal_mulai
// tanggal_selesai

	public function get_by_transaksi_project($table,$where)
	{
		$this->db->select(' 
			transaksi_project.id_transaksi_project as id_transaksi_project,
			project.no_project as no_project,

			karyawan.id_karyawan as id_karyawan,    
			job.id_job as id_job,
			transaksi_project.id_status_project as id_status_project, 

			transaksi_project.detail_jenis_project as detail_jenis_project, 
			transaksi_project.tanggal_mulai as tanggal_mulai, 
			transaksi_project.tanggal_selesai as tanggal_selesai');

		$this->db->from($table);
		$this->db->join('project', 'transaksi_project.id_project = project.id_project');
		$this->db->join('karyawan', 'transaksi_project.id_karyawan = karyawan.id_karyawan');
		$this->db->join('job', ' transaksi_project.id_job = job.id_job');
		$this->db->where($where);
		$query = $this->db->get();

		return $query->row();
	}	




}




?>	