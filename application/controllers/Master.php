<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller 

{



	public function __construct()
	{
			//Mengambil data dari CI_Controller ke Test
		parent::__construct();
			//Akan load terus ke W
		$this->load->library('datatables');
		$this->load->model('Model_project');
		//$this->load->model('Model_datatabel','datatabel');
//      $this->load->model('Model_viewproject');

		//Proteksi Bypass
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}

		$this->load->helper('form');
		$this->load->helper('url'); 
		$this->load->helper('cookie');

	}

	public function index() 
	{ 

		$this->load->view('utama/header');
		$this->load->view('utama/utama');
		$this->load->view('utama/footer');
		// $this->load->view('index2');
	}

	public function status_project_datatabel() {


		$this->datatables->select('id_status_project,nama_status_project,kondisi_enum');
		$this->datatables->from('status_project');
		$this->datatables->add_column('edit', ' <a type=button onclick=edit_status($1) class="btn btn-info">Edit</a> ','id_status_project');
		// $this->datatables->add_column('delete', ' <a type=button onclick=delete_status($1) class="btn btn-danger">Delete</a> ','id_status_project');

		echo $this->datatables->generate();
	}

	public function ajax_add_status_project(){

		$data=array(
			'nama_status_project' => $this->input->post('status'), 
			'kondisi_enum' => $this->input->post('kondisi'), 
			);

		$tabel = 'status_project';

		$insert = $this->Model_project->save($tabel,$data);
		echo json_encode(array("status" => 'TRUE'));
	}

	public function ajax_edit_status_project($id)
	{
		$where=array('
			id_status_project' => $id 
			);

		$tabel = 'status_project';

		$data = $this->Model_project->get_by_id($tabel,$where);
		echo json_encode($data);
	}

	public function ajax_update_status_project()
	{

		$data = array(
			'nama_status_project' => $this->input->post('status'),
			'kondisi_enum' => $this->input->post('kondisi'),
			);

		$where = array(
			'id_status_project'=> $this->input->post('id')
			);

		$table = 'status_project';

		$this->Model_project->update_ajax($table,$where, $data);
		echo json_encode(array("status" => 'TRUE'));


	}

	public function ajax_delete_status_project($id)
	{

		$where=array('
			id_status_project' => $id 
			);

		$tabel = 'status_project';
		$this->Model_project->delete_by_id($tabel,$where);
		echo json_encode(array("status" => 'TRUE'));

	}

	public function status_project()
	{
		$this->load->view('utama/header');
		$this->load->view('master/status_project');
		$this->load->view('utama/footer');
	}

	
	// public function input_status_project()
	// {
	// 	$status_project = $this->input->post('status_project');     
	// 	$tabel = 'status_project';

	// 	$data= array(
	// 		'nama_status_project'=>$status_project
	// 		);

	// 	$cek = $this->Model_project->insert($data,$tabel);

	// 	$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
	// 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// 		<h4><i class="icon fa fa-check"></i> Sukses </h4>
	// 		Data berhasil diinput
	// 	</div>');

	// 	redirect('master/status_project/');
	// }

	// public function delete_status_project($id){

	// 	$where=array('
	// 		id_status_project' => $id 
	// 		);

	// 	$tabel = 'status_project';


	// 	$this->Model_project->delete($where,$tabel);

	// 	$this->session->set_flashdata('hapus','<div class="alert alert-success alert-dismissible">
	// 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// 		<h4><i class="icon fa fa-close"></i> Sukses </h4>
	// 		Data berhasil dihapus
	// 	</div>');

	// 	redirect('master/status_project/');
	// }


	public function kategori_client()
	{

		$tabel = 'kategori_client';
		$data['kategori_client'] = $this->Model_project->get($tabel)->result();
		$this->load->view('utama/header');
		$this->load->view('master/kategori_client',$data);
		$this->load->view('utama/footer');

	}

	public function kategori_client_datatabel() {

		$this->datatables->select('id_kategori_client,nama_kategori_client,kondisi_enum');
		$this->datatables->from('kategori_client');
		$this->datatables->add_column('edit', ' <a type=button onclick=edit_kategori_client($1) class="btn btn-info">Edit</a> ','id_kategori_client');
		// $this->datatables->add_column('delete', ' <a type=button onclick=delete_kategori_client($1) class="btn btn-danger">Delete</a> ','id_kategori_client');
		echo $this->datatables->generate();
	}


	public function ajax_add_kategori_client(){

		$data=array('
			nama_kategori_client' => $this->input->post('status'), 
			'kondisi_enum' => $this->input->post('kondisi'), 
			);

		$tabel = 'kategori_client';

		$insert = $this->Model_project->save($tabel,$data);
		echo json_encode(array("status" => 'TRUE'));


	}


	public function ajax_edit_kategori_client($id){
		$where=array('
			id_kategori_client' => $id 
			);

		$tabel = 'kategori_client';

		$data = $this->Model_project->get_by_id($tabel,$where);
		echo json_encode($data);
	}

	public function ajax_update_kategori_client(){
		$data = array(
			'nama_kategori_client' => $this->input->post('status'),
			'kondisi_enum' => $this->input->post('kondisi'),
			);

		$where = array(
			'id_kategori_client'=> $this->input->post('id')
			);

		$table = 'kategori_client';

		$this->Model_project->update_ajax($table,$where, $data);
		echo json_encode(array("status" => 'TRUE'));
	}

	public function ajax_delete_kategori_client($id){
		$where=array('
			id_kategori_client' => $id 
			);

		$tabel = 'kategori_client';
		$this->Model_project->delete_by_id($tabel,$where);
		echo json_encode(array("status" => 'TRUE'));
	}


	// public function input_kategori_client()
	// {
	// 	$kategori_client = $this->input->post('kategori_client');       
	// 	$tabel = 'kategori_client';

	// 	$data= array(
	// 		'nama_kategori_client'=>$kategori_client
	// 		);

	// 	$cek = $this->Model_project->insert($data,$tabel);

	// 	$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
	// 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// 		<h4><i class="icon fa fa-check"></i> Sukses </h4>
	// 		Data berhasil diinput
	// 	</div>');

	// 	redirect('master/kategori_client/');

	// }

	// public function delete_kategori_client($id)
	// {

	// 	$where=array('
	// 		id_kategori_client' => $id 
	// 		);

	// 	$tabel = 'kategori_client';


	// 	$this->Model_project->delete($where,$tabel);

	// 	$this->session->set_flashdata('hapus','<div class="alert alert-success alert-dismissible">
	// 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// 		<h4><i class="icon fa fa-close"></i> Sukses </h4>
	// 		Data berhasil dihapus
	// 	</div>');

	// 	redirect('master/kategori_client/');


	// }

	public function karyawan_datatabel(){

		$this->datatables->select('id_karyawan,nama_karyawan,username_karyawan,password_karyawan,status_karyawan,kondisi_enum');
		$this->datatables->from('karyawan');
		$this->datatables->add_column('edit', ' <a type=button onclick=edit_karyawan($1) class="btn btn-info">Edit</a> ','id_karyawan');
		// $this->datatables->add_column('delete', ' <a type=button onclick=delete_karyawan($1) class="btn btn-danger">Delete</a> ','id_karyawan');
		echo $this->datatables->generate();


	}
	public function ajax_add_karyawan(){
		
		$data=array(
			'nama_karyawan' => $this->input->post('nama_karyawan'),
			'username_karyawan' => $this->input->post('username'), 
			'password_karyawan' => md5($this->input->post('passwordlama')),  
			'status_karyawan' => $this->input->post('status_karyawan'), 
			'kondisi_enum' => $this->input->post('kondisi'), 
			);

		$tabel = 'karyawan';

		$insert = $this->Model_project->save($tabel,$data);
		echo json_encode(array("status" => 'TRUE'));


	}
	public function ajax_edit_karyawan($id){
		$where=array('
			id_karyawan' => $id 
			);

		$tabel = 'karyawan';

		$data = $this->Model_project->get_by_id($tabel,$where);
		echo json_encode($data);

	}

	public function ajax_update_karyawan(){



		//jika password yang diisi kosong
		if($this->input->post('passwordlama')==null && $this->input->post('passwordbaru')==null)
		{
			$data = array(
				'nama_karyawan' => $this->input->post('nama_karyawan'),
				'username_karyawan' => $this->input->post('username'), 
				'status_karyawan' => $this->input->post('status_karyawan'), 
				'kondisi_enum' => $this->input->post('kondisi'),
				);

			$where = array(
				'id_karyawan'=> $this->input->post('id')
				);

			$table = 'karyawan';

			$this->Model_project->update_ajax($table,$where,$data);
			echo json_encode(array("status" => 'TRUE'));

		}

		//jika tidak
		else
		{

			$passwordlamareal =     $this->input->post('passwordlamareal');
			$passwordlama     =     md5($this->input->post('passwordlama'));


			//check password lama dan password lama database
			if($passwordlama==$passwordlamareal){

				$passwordbaru = md5($this->input->post('passwordbaru'));

				$data = array(
					'nama_karyawan' => $this->input->post('nama_karyawan'),
					'username_karyawan' => $this->input->post('username'), 
					'password_karyawan' => $passwordbaru,  
					'status_karyawan' => $this->input->post('status_karyawan'), 
					);

				$where = array(
					'id_karyawan'=> $this->input->post('id')
					);

				$table = 'karyawan';

				$this->Model_project->update_ajax($table,$where,$data);
				echo json_encode(array("status" => 'TRUE'));

			}

			else{
				echo json_encode(array("status" => 'SALAH'));
			}

		}


	}
	public function ajax_delete_karyawan($id){

		$where=array('
			id_karyawan' => $id 
			);

		$tabel = 'karyawan';
		$this->Model_project->delete_by_id($tabel,$where);
		echo json_encode(array("status" => 'TRUE'));

	}


	public function karyawan()
	{


		$tabel = 'karyawan';
		$data['karyawan'] = $this->Model_project->get($tabel)->result();

		$this->load->view('utama/header');
		$this->load->view('master/karyawan',$data);
		$this->load->view('utama/footer');
	}

	// public function input_karyawan(){

	// 	$nama = $this->input->post('nama_karyawan');
	// 	$username = $this->input->post('username_karyawan');
	// 	$password = $this->input->post('password_karyawan');        
	// 	$status = $this->input->post('status_karyawan');        
	// 	$tabel = 'karyawan';

	// 	$data= array(
	// 		'nama_karyawan'=>$nama,
	// 		'username_karyawan'=>$username,
	// 		'password_karyawan'=>$password,
	// 		'status_karyawan'=>$status,
	// 		);

	// 	$cek = $this->Model_project->insert($data,$tabel);

	// 	$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
	// 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// 		<h4><i class="icon fa fa-check"></i> Sukses </h4>
	// 		Data berhasil diinput
	// 	</div>');

	// 	redirect('master/karyawan/');

	// }

	// public function delete_karyawan($id){

	// 	$where=array('
	// 		id_karyawan' => $id 
	// 		);

	// 	$tabel = 'karyawan';


	// 	$this->Model_project->delete($where,$tabel);

	// 	$this->session->set_flashdata('hapus','<div class="alert alert-success alert-dismissible">
	// 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// 		<h4><i class="icon fa fa-close"></i> Sukses </h4>
	// 		Data berhasil dihapus
	// 	</div>');

	// 	redirect('master/karyawan/');

	// }

	////

	public function klien_datatabel()
	{

		$this->datatables->select('
			id_klien,
			nama_klien,
			kategori_client.nama_kategori_client as nama_kategori_client,
			kategori_client.id_kategori_client as id_kategori_client,
			email_klien,
			no_telp_klien,
			klien.kondisi_enum
			'
			);
		$this->datatables->from('klien');

		$this->datatables->join('kategori_client', 'klien.id_kategori_client = kategori_client.id_kategori_client');
		$this->datatables->add_column('edit', ' <a type=button onclick=edit_klien($1) class="btn btn-info">Edit</a> ','id_klien');
		// $this->datatables->add_column('delete', ' <a type=button onclick=delete_klien($1) class="btn btn-danger">Delete</a> ','id_klien');
		echo $this->datatables->generate();

	}


	public function ajax_add_klien()
	{


		$data=array('
			nama_klien' => $this->input->post('status'),    
			'id_kategori_client' => $this->input->post('status2'),
			'email_klien' => $this->input->post('email_client'),
			'no_telp_klien' => $this->input->post('no_telp'),
			'kondisi_enum' => $this->input->post('kondisi'),
			);

		$tabel = 'klien';

		$insert = $this->Model_project->save($tabel,$data);
		echo json_encode(array("status" => 'TRUE'));


	}
	public function ajax_edit_klien($id)
	{
		$where=array('
			id_klien' => $id 
			);

		$tabel = 'klien';

		$data = $this->Model_project->get_by_id($tabel,$where);
		echo json_encode($data);

	}
	public function ajax_update_klien()
	{
		$data = array(
			'nama_klien' => $this->input->post('status'),   
			'id_kategori_client' => $this->input->post('status2'),
			'email_klien' => $this->input->post('email_client'),
			'no_telp_klien' => $this->input->post('no_telp'),
			'kondisi_enum' => $this->input->post('kondisi'),

			);

		$where = array(
			'id_klien'=> $this->input->post('id')
			);

		$table = 'klien';

		$this->Model_project->update_ajax($table,$where, $data);
		echo json_encode(array("status" => 'TRUE'));

	}
	public function ajax_delete_klien($id)
	{
		$where=array('
			id_klien' => $id 
			);

		$tabel = 'klien';
		$this->Model_project->delete_by_id($tabel,$where);
		echo json_encode(array("status" => 'TRUE'));
	}

	public function klien()
	{
		
		$data['kategori_clientt']= $this->db->get('kategori_client')->result();

		$this->db->select('
			id_klien,
			nama_klien,
			kategori_client.nama_kategori_client as nama_kategori_client,
			');

		$this->db->from('klien');
		$this->db->join('kategori_client', 'klien.id_kategori_client = kategori_client.id_kategori_client');

		$data['klien'] = $this->db->get()->result();

		$this->load->view('utama/header');
		$this->load->view('master/klien',$data);
		$this->load->view('utama/footer');
	}

	public function input_klien()
	{
		$klien = $this->input->post('klien');       
		$id_kategori = $this->input->post('id_kategori');       
		$tabel = 'klien';

		$data= array(
			'nama_klien'=>$klien,
			'id_kategori_client'=>$id_kategori
			);

		$cek = $this->Model_project->insert($data,$tabel);

		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Sukses </h4>
			Data berhasil diinput
		</div>');
		
		redirect('master/klien/');

	}

	public function delete_klien($id)
	{

		$where=array('
			id_klien' => $id 
			);

		$tabel = 'klien';


		$this->Model_project->delete($where,$tabel);

		$this->session->set_flashdata('hapus','<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-close"></i> Sukses </h4>
			Data berhasil dihapus
		</div>');

		redirect('master/klien/');

	}

//////////................SUMBER PROJECT 


	public function sumber_project()
	{
		$this->load->view('utama/header');
		$this->load->view('master/sumber_project');
		$this->load->view('utama/footer');
	}

	public function sumber_project_datatabel() {


		$this->datatables->select('id_sumber_project,nama_sumber_project,kondisi_enum');
		$this->datatables->from('sumber_project');
		$this->datatables->add_column('edit', ' <a type=button onclick=edit_sumber($1) class="btn btn-info">Edit</a> ','id_sumber_project');
		// $this->datatables->add_column('delete', ' <a type=button onclick=delete_status($1) class="btn btn-danger">Delete</a> ','id_status_project');

		echo $this->datatables->generate();
	}

	public function ajax_add_sumber_project(){

		$data=array(
			'nama_sumber_project' => $this->input->post('status'), 
			'kondisi_enum' => $this->input->post('kondisi'), 
			);

		$tabel = 'sumber_project';

		$insert = $this->Model_project->save($tabel,$data);
		echo json_encode(array("status" => 'TRUE'));
	}

	public function ajax_edit_sumber_project($id)
	{
		$where=array('
			id_sumber_project' => $id 
			);

		$tabel = 'sumber_project';

		$data = $this->Model_project->get_by_id($tabel,$where);
		echo json_encode($data);
	}

	public function ajax_update_sumber_project()
	{

		$data = array(
			'nama_sumber_project' => $this->input->post('status'), 
			'kondisi_enum' => $this->input->post('kondisi'),
			);

		$where = array(
			'id_sumber_project'=> $this->input->post('id')
			);

		$table = 'sumber_project';

		$this->Model_project->update_ajax($table,$where, $data);
		echo json_encode(array("status" => 'TRUE'));

	}


//////////................JOB 


	public function job()
	{
		$this->load->view('utama/header');
		$this->load->view('master/job');
		$this->load->view('utama/footer');
	}

	public function job_datatabel() {


		$this->datatables->select('id_job,nama_job,kondisi_enum');
		$this->datatables->from('job');
		$this->datatables->add_column('edit', ' <a type=button onclick=edit_job($1) class="btn btn-info">Edit</a> ','id_job');
		// $this->datatables->add_column('delete', ' <a type=button onclick=delete_status($1) class="btn btn-danger">Delete</a> ','id_status_project');

		echo $this->datatables->generate();
	}

	public function ajax_add_job(){

		$data=array(
			'nama_job' => $this->input->post('status'), 
			'kondisi_enum' => $this->input->post('kondisi'), 
			);

		$tabel = 'job';

		$insert = $this->Model_project->save($tabel,$data);
		echo json_encode(array("status" => 'TRUE'));
	}

	public function ajax_edit_job($id)
	{
		$where=array('
			id_job' => $id 
			);

		$tabel = 'job';

		$data = $this->Model_project->get_by_id($tabel,$where);
		echo json_encode($data);
	}

	public function ajax_update_job()
	{

		$data = array(
			'nama_Job' => $this->input->post('status'), 
			'kondisi_enum' => $this->input->post('kondisi'),
			);

		$where = array(
			'id_job'=> $this->input->post('id')
			);

		$table = 'job';

		$this->Model_project->update_ajax($table,$where, $data);
		echo json_encode(array("status" => 'TRUE'));

	}


	
	




} 






?>  