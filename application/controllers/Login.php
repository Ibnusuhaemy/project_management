<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct()
	{
			//Mengambil data dari CI_Controller ke Test
		parent::__construct();
			//Akan load terus ke W
		$this->load->model('Model_project');
		$this->load->helper('form');
		$this->load->helper('url');	
		$this->load->helper('cookie');

	}

	public function index()
	{

		$this->load->view('login/login');

	}

	public function ceklogin()
	{

		$username = $this->input->post('username');		
		$password = md5($this->input->post('password'));
		$table= "karyawan";
		
		$where = array(
			'username_karyawan'=>$username,
			'password_karyawan'=>$password,
			);

		$cek = $this->Model_project->cek_login('karyawan',$where)->num_rows();


		//jika sukses
		if($cek > 0){
			//ambil semua data
			$cek1 = $this->Model_project->get_data_karyawan('karyawan',$where)->result();			

			foreach ($cek1 as $karyawan) {
				$id_karyawan_session = $karyawan->id_karyawan;
				$karyawan_nama = $karyawan->nama_karyawan;
				$status_karyawan = $karyawan->status_karyawan;
			}

			$data_session = array(		
				'status' => "login",
				'karyawan_nama'=> $karyawan_nama,
				'id_karyawan_session'=> $id_karyawan_session
				);

			//SESSION
			$this->session->set_userdata($data_session);
			redirect(base_url("project"));

		}else{
			$this->session->set_flashdata('error','username dan password salah');
			redirect('login');

		}
	}

	function logout(){
	//DESTROY SESSION

		$this->session->sess_destroy(); 
		redirect(base_url('login'));
	}


}






?>	