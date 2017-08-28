<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 

{

	public function __construct()
	{
			//Mengambil data dari CI_Controller ke Test
		parent::__construct();
			//Akan load terus ke W
		$this->load->library('datatables');
		$this->load->model('Model_project');
		//$this->load->model('Model_datatabel','datatabel');
//		$this->load->model('Model_viewproject');

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

	public function laporanBulan()
	{

		$this->load->view('utama/header');
		$this->load->view('laporan/laporan_perbulan');
		$this->load->view('utama/footer');

	}


	// public function laporanBulann(){

	// 	$this->db->select('
	// 		project.id_project as id_project,	 
	// 		project.no_project as no_project,
	// 		project.nama_project as nama_project,    
	// 		status_project.nama_status_project as nama_status,
	// 		project.tanggal_mulai_project as tanggal_mulai, 
	// 		project.tanggal_selesai_selesai as tanggal_selesai 

	// 		');

	// 	$this->db->from('project');
	// 	$this->db->join('status_project', 'project.id_status_project = status_project.id_status_project');

	// //	$this->db->where($where);

	// 	$data['transaksi_project'] = $this->db->get()->result();

	// 	$this->load->view('utama/header');
	// 	$this->load->view('laporan/laporan',$data);
	// 	$this->load->view('utama/footer');

	// }

	public function laporanBulanJson()
	{

		

		$whereSumber = array(
			'sumber_project.kondisi_enum'=>'aktif',
			);
		$whereStatus = array(
			'status_project.kondisi_enum'=>'aktif',
			);
		$whereKlien = array(
			'klien.kondisi_enum'=>'aktif',
			);
		$whereKategoriClient = array(
			'kategori_client.kondisi_enum'=>'aktif',
			);


		$bulan=$this->input->post('vbulan');
		$tahun=$this->input->post('vtahun');

		$this->datatables->select('
			project.id_project as id_project,	 
			project.no_project as no_project,
			project.nama_project as nama_project,    
			status_project.nama_status_project as nama_status,
			kategori_client.nama_kategori_client as nama_kategori_client,
			project.tanggal_mulai_project as tanggal_mulai,
			project.tanggal_selesai_project as tanggal_selesai

			');

		$this->datatables->from('project');


		$this->datatables->join('sumber_project', 'project.id_sumber_project = sumber_project.id_sumber_project');
		$this->datatables->join('status_project', 'project.id_status_project = status_project.id_status_project');
		$this->datatables->join('klien', 'project.id_client = klien.id_klien');
		$this->datatables->join('kategori_client', 'project.id_kategori_client = kategori_client.id_kategori_client');


		if($bulan==00&&$tahun==00){

		}

		else if($bulan==00){
			$this->datatables->where('YEAR(project.tanggal_mulai_project)',$tahun);
		}
		else if($tahun==00){
			$this->datatables->where('MONTH(project.tanggal_mulai_project)',$bulan);
		}
		else{
			$this->datatables->where('MONTH(project.tanggal_mulai_project)',$bulan);
			$this->datatables->where('YEAR(project.tanggal_mulai_project)',$tahun);
		}

		//WHERE
		$this->datatables->where($whereSumber);		
		$this->datatables->where($whereStatus);
		$this->datatables->where($whereKlien);
		$this->datatables->where($whereKategoriClient);


		echo $this->datatables->generate();


	}

	// public function laporanSummaryJson(){
	// 	$bulan=$this->input->post('vbulan');
	// 	$tahun=$this->input->post('vtahun');

	// 	$whereStatus = array(
	// 		'status_project.kondisi_enum'=>'aktif',
	// 		);



	// 	$this->datatables->select('	
	// 		status_project.id_status_project as id, 	
	// 		nama_status_project as nama,
	// 		COUNT( project.id_status_project ) as jumlah
	// 		');

	// 	$this->datatables->from('project');

	// 	if($bulan==00&&$tahun==00){
	// 		$this->datatables->join("status_project", "status_project on project.id_status_project = status_project.id_status_project","right");
	// 	}

	// 	else if($tahun==00){
	// 		$this->datatables->join("status_project", "status_project on project.id_status_project = status_project.id_status_project and MONTH(project.tanggal_mulai_project)= '".$bulan."' ","right");
	// 	}

	// 	else if($bulan==00){
	// 		$this->datatables->join("status_project", "status_project on project.id_status_project = status_project.id_status_project and YEAR(project.tanggal_mulai_project)= '".$tahun."' ","right");
	// 	}

	// 	else{
	// 		$this->datatables->join("status_project", "status_project on project.id_status_project = status_project.id_status_project and (MONTH(project.tanggal_mulai_project)='".$bulan."' and year(project.tanggal_mulai_project)='".$tahun."' )  ","right");
	// 	}

	// 	$this->datatables->where($whereStatus);


	// 	$this->datatables->group_by('status_project.id_status_project');
	// 	// $this->datatables->unset_column("COUNT(project.id_status_project)");
	// 	echo $this->datatables->generate();
	// }

	public function laporanSummaryJson2(){

		$bulan=$this->input->post('vbulan');
		$tahun=$this->input->post('vtahun');

		$whereStatus = array(
			'status_project.kondisi_enum'=>'aktif',
			);

		if($bulan==00&&$tahun==00){
			$subquery = " ";
		}

		else if($tahun==00){
			$subquery = "AND MONTH(project.tanggal_mulai_project)= '".$bulan."'  ";
		}

		else if($bulan==00){
			$subquery = "AND YEAR (project.tanggal_mulai_project)= '".$tahun."'  ";
		}

		else{
			$subquery = "AND MONTH(project.tanggal_mulai_project)= '".$bulan."' AND YEAR (project.tanggal_mulai_project)= '".$tahun."'  ";
		}


		$query = "SELECT 
		nama_status_project as nama,
		(SELECT COUNT(id_status_project) 
			FROM project
			WHERE
			id_status_project = status_project.id_status_project
			AND
			id_sumber_project IN (SELECT id_sumber_project FROM sumber_project WHERE kondisi_enum = 'aktif')
			AND
			id_kategori_client IN (SELECT id_kategori_client FROM kategori_client WHERE kondisi_enum = 'aktif')
			AND
			id_client IN (SELECT id_klien FROM klien WHERE kondisi_enum = 'aktif')
			".$subquery."

			) as jumlah 
FROM project
RIGHT JOIN status_project ON status_project.id_status_project = project.id_status_project

WHERE status_project.kondisi_enum = 'aktif' 

GROUP BY status_project.id_status_project
";
$data['output'] = $this->Model_project->rawQuery($query)->result();
//batas --------
//GET TOTAL
$query1 = "SELECT COUNT(id_status_project) as jumlah
from project 
where 
id_sumber_project IN (SELECT id_sumber_project FROM sumber_project WHERE kondisi_enum = 'aktif')
AND
id_kategori_client IN (SELECT id_kategori_client FROM kategori_client WHERE kondisi_enum = 'aktif')
AND
id_client IN (SELECT id_klien FROM klien WHERE kondisi_enum = 'aktif')
AND
id_status_project IN (SELECT id_status_project FROM status_project WHERE kondisi_enum = 'aktif')
".$subquery."
";

$data['total'] = $this->Model_project->rawQuery($query1)->result();

echo json_encode($data);

}

	// public function laporanSummaryJson3(){

	// 	$bulan=$this->input->post('vbulan');
	// 	$tahun=$this->input->post('vtahun');

	// 	$whereStatus = array(
	// 		'status_project.kondisi_enum'=>'aktif',
	// 		);


	// 	$this->db->select('	
	// 		nama_status_project as nama,
	// 		COUNT( project.id_status_project ) as jumlah
	// 		');

	// 	$this->db->from('project');

	// 	if($bulan==00&&$tahun==00){
	// 		$this->db->join("status_project", "status_project on project.id_status_project = status_project.id_status_project","right");
	// 	}

	// 	else if($tahun==00){
	// 		$this->db->join("status_project", "status_project on project.id_status_project = status_project.id_status_project and MONTH(project.tanggal_mulai_project)= '".$bulan."' ","right");
	// 	}

	// 	else if($bulan==00){
	// 		$this->db->join("status_project", "status_project on project.id_status_project = status_project.id_status_project and YEAR(project.tanggal_mulai_project)= '".$tahun."' ","right");
	// 	}

	// 	else{
	// 		$this->db->join("status_project", "status_project on project.id_status_project = status_project.id_status_project and (MONTH(project.tanggal_mulai_project)='".$bulan."' and year(project.tanggal_mulai_project)='".$tahun."' )  ","right");
	// 	}
	// 	$this->db->where($whereStatus);
	// 	$this->db->group_by('status_project.id_status_project');
	// 	// $this->datatables->unset_column("COUNT(project.id_status_project)");
	// 	$data['output'] = $this->db->get()->result_array();

	// 	/////////////////////////////////////////////////////-------------------------------------------------------------------

	// 	//get all
	// 	$this->db->select('COUNT( project.id_status_project ) as jumlah');
	// 	$this->db->from('project');

	// 	if($bulan==00&&$tahun==00){
	// 		$this->db->join("status_project", "status_project on project.id_status_project = status_project.id_status_project","right");
	// 	}

	// 	else if($tahun==00){
	// 		$this->db->join("status_project", "status_project on project.id_status_project = status_project.id_status_project and MONTH(project.tanggal_mulai_project)= '".$bulan."' ","right");
	// 	}

	// 	else if($bulan==00){
	// 		$this->db->join("status_project", "status_project on project.id_status_project = status_project.id_status_project and YEAR(project.tanggal_mulai_project)= '".$tahun."' ","right");
	// 	}

	// 	else{
	// 		$this->db->join("status_project", "status_project on project.id_status_project = status_project.id_status_project and (MONTH(project.tanggal_mulai_project)='".$bulan."' and year(project.tanggal_mulai_project)='".$tahun."' )  ","right");
	// 	}
	// 	$this->db->where($whereStatus);
	// 	$data['total'] = $this->db->get()->result_array();

	// 	echo json_encode($data);
	// }



public function laporanBebanProjectJson(){
	$bulan=$this->input->post('vbulan');
	$tahun=$this->input->post('vtahun');

	$whereKaryawan = array(
		'karyawan.kondisi_enum'=>'aktif',
		);
	$whereKategori = array(
		'kategori_client.kondisi_enum'=>'aktif',
		);
	$whereStatus = array(
		'status_project.kondisi_enum'=>'aktif',
		);
	$whereJob= array(
		'job.kondisi_enum'=>'aktif',
		);


	$this->db->distinct();
	$this->datatables->select('
		transaksi_project.id_transaksi_project as id_transaksi,
		karyawan.nama_karyawan as nama_karyawan,
		project.nama_project as nama_project,
		kategori_client.nama_kategori_client as nama_kategori_client,
		status_project.nama_status_project as nama_status_project

		');

	$this->datatables->from('transaksi_project');

	$this->datatables->join('karyawan', 'transaksi_project.id_karyawan = karyawan.id_karyawan');
	$this->datatables->join('project', 'transaksi_project.id_project = project.id_project');
	$this->datatables->join('kategori_client', 'project.id_kategori_client = kategori_client.id_kategori_client');
	$this->datatables->join('status_project', 'transaksi_project.id_status_project = status_project.id_status_project');
	$this->datatables->join('job', 'transaksi_project.id_job = job.id_job');


	if($bulan==00&&$tahun==00){

	}

	else if($bulan==00){
		$this->datatables->where('YEAR(transaksi_project.tanggal_mulai)',$tahun);
	}
	else if($tahun==00){
		$this->datatables->where('MONTH(transaksi_project.tanggal_mulai)',$bulan);
	}
	else{
		$this->datatables->where('MONTH(transaksi_project.tanggal_mulai)',$bulan);
		$this->datatables->where('YEAR(transaksi_project.tanggal_mulai)',$tahun);

	}

		//untuk tidak menampilkan SELESAI DAN BATAL
	$this->datatables->where('transaksi_project.id_status_project >=2 and transaksi_project.id_status_project <=4');
	$this->datatables->where($whereKaryawan);
	$this->datatables->where($whereKategori);
	$this->datatables->where($whereStatus);
	$this->datatables->where($whereJob);

	$this->db->order_by('transaksi_project.id_karyawan'); 



	echo $this->datatables->generate();





}



} 






?>	