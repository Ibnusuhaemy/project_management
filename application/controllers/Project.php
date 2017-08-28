
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
			//Mengambil data dari CI_Controller ke Test
		parent::__construct();
			//Akan load terus ke W
		$this->load->library('datatables');
		$this->load->model('Model_project');
		//$this->load->model('Model_datatabel','datatabel');
		$this->load->model('Model_viewproject');

		//Proteksi Bypass
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}

		$this->load->helper('form');
		$this->load->helper('url');	
		$this->load->helper('cookie');

	}

	public function index() { 

		$this->load->view('utama/header');
		$this->load->view('utama/utama');
		$this->load->view('utama/footer');
		// $this->load->view('index2');
	}

	public function viewInputProject(){

		$where_enum = array(
			'kondisi_enum'=>'aktif'
			);

		$data['sumber_project'] =  $this->Model_project->get_where('sumber_project',$where_enum)->result();	

		$data['status_project'] =  $this->Model_project->get_where('status_project',$where_enum)->result();	


		$data['klien'] =  $this->Model_project->get_where('klien',$where_enum)->result();	

		$data['kategori_client'] = $this->Model_project->get_where('kategori_client',$where_enum)->result();	


		//get data NO_PROJECT dari project
		$query ="select * from project order by no_project DESC limit 1";
		//cek data dari project ada atau tidak
		$cek = $this->db->query($query)->num_rows();

		if($cek>0){
		//jik ada
			$data['status'] = 1;
			$data['project'] = $this->db->query($query)->result();

		}
		else{
			//jika tidak
			$data['status'] = 0 ;
		}



		$this->load->view('utama/header');
		$this->load->view('input_project/inputProject', $data);
		$this->load->view('utama/footer');
	}

	public function inputProject()
	{
		$no_project = $this->input->post('no_project');		
		$nama_project = $this->input->post('nama_project');
		$sumber_project = $this->input->post('sumber_project');
		$status_project = $this->input->post('status_project');		
		$client = $this->input->post('client');
		$kategori_client = $this->input->post('kategori_client');		
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');	

		$tanggal_mulai = date("Y-m-d",strtotime($tanggal_mulai)) ;
		$tanggal_selesai = date("Y-m-d",strtotime($tanggal_selesai));

		$table= "project";

		$data = array(
			'no_project'=>$no_project,
			'nama_project'=>$nama_project,
			'id_sumber_project'=>$sumber_project,
			'id_status_project'=>$status_project,
			'id_client'=>$client,
			'id_kategori_client'=>$kategori_client,
			'tanggal_mulai_project'=>$tanggal_mulai,
			'tanggal_selesai_project'=>$tanggal_selesai
			);

		$this->db->insert($table,$data);
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Sukses </h4>
			Data berhasil diinput
		</div>');
		redirect('project/viewInputProject');


	}

	public function ajax_list()
	{
		$list = $this->datatabel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datatabel) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $datatabel->no_project;
			$row[] = $datatabel->nama_project;
			$row[] = $datatabel->id_sumber_project;
			$row[] = $datatabel->id_status_project;
			$row[] = $datatabel->id_client;
			$row[] = $datatabel->id_kategori_client;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->datatabel->count_all(),
			"recordsFiltered" => $this->datatabel->count_filtered(),
			"data" => $data,
			);

        //output to json format
		echo json_encode($output);
	}

	public function seeProject(){

		// $data['sumber_project'] = $this->db->get('sumber_project')->result();
		// $data['status_project'] = $this->db->get('status_project')->result();
		// $data['klien'] = $this->db->get('klien')->result();
		// $data['job'] = $this->db->get('job')->result();
		// $data['kategori_client'] = $this->db->get('kategori_client')->result();	
		// $data['karyawan'] = $this->db->get('karyawan')->result();	

		// //get data dari project
		// $query ="select * from project order by no_project DESC limit 1";
		// $data['project'] = $this->db->query($query)->result();

		$where_enum = array(
			'kondisi_enum'=>'aktif'
			);

		$data['sumber_project'] =  $this->Model_project->get_where('sumber_project',$where_enum)->result();	

		$data['status_project'] =  $this->Model_project->get_where('status_project',$where_enum)->result();	

		$data['klien'] = $this->Model_project->get_where('klien',$where_enum)->result();	

		$data['kategori_client'] =  $this->Model_project->get_where('kategori_client',$where_enum)->result();	


		$this->load->view('utama/header');
		$this->load->view('see_project/seeProject',$data);
		$this->load->view('utama/footer');
	}

	public function json() {

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


		$this->datatables->select(' 
			id_project,
			project.no_project as no_project,
			project.nama_project as nama_project,    
			sumber_project.nama_sumber_project as namasumber, 
			status_project.nama_status_project as namastatus, 
			klien.nama_klien as namaklien, 
			kategori_client.nama_kategori_client as namakategori,
			tanggal_mulai_project,
			tanggal_selesai_project
			'
			);

		$this->datatables->from('project');
		$this->datatables->join('sumber_project', 'project.id_sumber_project = sumber_project.id_sumber_project');
		$this->datatables->join('status_project', 'project.id_status_project = status_project.id_status_project');
		$this->datatables->join('klien', 'project.id_client = klien.id_klien');
		$this->datatables->join('kategori_client', 'project.id_kategori_client = kategori_client.id_kategori_client');

		//WHERE
		$this->datatables->where($whereSumber);		
		$this->datatables->where($whereStatus);
		$this->datatables->where($whereKlien);
		$this->datatables->where($whereKategoriClient);

		$this->datatables->add_column('edit', ' <a type=button onclick=edit_project($1) class="btn btn-warning">Edit</a> ','id_project');

		$this->datatables->add_column('view', " <a type='button' href='".base_url()."project/detail_ajax/".'$1'."' class='btn btn-info'>View</a>",'id_project');

		echo $this->datatables->generate();


	}

////////PROJECT CORE///////////////////


	public function edit_project_ajax($id){

		$where = array(
			'id_project'=>$id,
			);

		$tabel = 'project';

		$data = $this->Model_project->get_by_project($tabel,$where);
		
		$data->tanggal_mulai_project = date("m/d/Y",strtotime($data->tanggal_mulai_project)) ;
		$data->tanggal_selesai_project = date("m/d/Y",strtotime($data->tanggal_selesai_project)) ;


		echo json_encode($data);
		
	}

	public function update_project_ajax(){
		
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');

		$tanggal_mulai = date("Y-m-d",strtotime($tanggal_mulai)) ;
		$tanggal_selesai = date("Y-m-d",strtotime($tanggal_selesai));

		$data = array(
			'nama_project' =>  $this->input->post('nama_project'),
			'id_sumber_project' => $this->input->post('sumber_project') ,
			'id_status_project' => $this->input->post('status_project'),
			'id_client' =>  $this->input->post('klien') ,
			'id_kategori_client' =>  $this->input->post('kategori_client') ,
			'tanggal_mulai_project' => $tanggal_mulai,
			'tanggal_selesai_project' => $tanggal_selesai,

			);

		$where = array(
			'id_project'=> $this->input->post('id_projectt')
			);

		$table = 'project';

		$this->Model_project->update_ajax($table,$where, $data);
		echo json_encode(array("status" => 'TRUE'));

	}

	public function dss($id){
				//DSS/////////////////////////////
		//get semua status
		$queryTransaksiProject1 = "SELECT id_status_project FROM transaksi_project where id_project='".$id."'
		AND
		id_karyawan IN (SELECT id_karyawan FROM karyawan WHERE kondisi_enum = 'aktif')
		AND
		id_job IN (SELECT id_job FROM job WHERE kondisi_enum = 'aktif')
		AND
		id_status_project IN (SELECT id_status_project FROM status_project WHERE kondisi_enum = 'aktif')	

		 ";
		$exeQuery1 = $this->Model_project->rawQuery($queryTransaksiProject1);
		$data1 = (int) $exeQuery1->num_rows();

		//get status selesai
		$queryTransaksiProject2 = "SELECT id_status_project FROM transaksi_project where id_project= '".$id."' and id_status_project = 1 AND
		id_karyawan IN (SELECT id_karyawan FROM karyawan WHERE kondisi_enum = 'aktif')
		AND
		id_job IN (SELECT id_job FROM job WHERE kondisi_enum = 'aktif')
		AND
		id_status_project IN (SELECT id_status_project FROM status_project WHERE kondisi_enum = 'aktif')";
		$exeQuery2 = $this->Model_project->rawQuery($queryTransaksiProject2);
		$data2 = (int)$exeQuery2->num_rows();

		//echo $data1."<br>".$data2;

		if($data1==$data2){
			$data3 = array(
				'id_status_project' => 1
				);
		}
		else{
			$data3 = array(
				'id_status_project' => 2
				);

		}

		$where = array(
			'id_project'=> $id
			);

		$table = 'project';
		$this->Model_project->update($where, $data3,$table);

		///////////////////////////////
	}

	public function detail_ajax($id){

		$this->dss($id);


		$data['id'] = $id;

		$where_enum = array(
			'kondisi_enum'=>'aktif'
			);


		$where = array(
			'id_project'=>$id,
			);

		$queryProject = "SELECT * FRoM project WHERE id_project=".$id;
		$exeQuery = $this->Model_project->rawQuery($queryProject);



		//keperluan tampilan
		$data['id_project'] = $exeQuery->row()->id_project;
		$data['nomor_project'] = $exeQuery->row()->no_project;
		$data['nama_project'] = $exeQuery->row()->nama_project;		

		//convert date
		$tanggal_mulai_project = $exeQuery->row()->tanggal_mulai_project ;
		$tanggal_selesai_project = $exeQuery->row()->tanggal_selesai_project ;
		$tanggal_mulai_project = date("m/d/Y",strtotime($tanggal_mulai_project)) ;
		$tanggal_selesai_project = date("m/d/Y",strtotime($tanggal_selesai_project)) ;

		$data['tanggal_mulai'] = $tanggal_mulai_project ;
		$data['tanggal_selesai'] = $tanggal_selesai_project ;

		$queryJob = "SELECT * FRoM job WHERE kondisi_enum='aktif' ";
		$data['job'] = $this->Model_project->rawQuery($queryJob)->result_array();

		$queryKaryawan = "SELECT * FRoM karyawan WHERE kondisi_enum='aktif' ";
		$data['karyawan'] = $this->Model_project->rawQuery($queryKaryawan)->result_array();

		$queryStatus = "SELECT * FRoM status_project WHERE kondisi_enum='aktif' ";
		$data['status_project'] = $this->Model_project->rawQuery($queryStatus)->result_array();


		$this->load->view('utama/header');
		$this->load->view('see_detailkaryawan/detail_karyawan_ajax',$data);
		$this->load->view('utama/footer');

	}


	public function detail_transaksi_project_ajax($id){

		$where = array(
			'transaksi_project.id_project'=>$id,
			);

		$whereKaryawan = array(
			'karyawan.kondisi_enum'=>'aktif'
			);

		$whereJob = array(
			'job.kondisi_enum'=>'aktif'
			);

		$whereStatus = array(
			'status_project.kondisi_enum'=>'aktif'
			);


		$this->datatables->select(' 
			id_transaksi_project,
			project.no_project as no_project,
			karyawan.nama_karyawan as nama_karyawan,    
			job.nama_job as nama_job, 
			detail_jenis_project,
			status_project.nama_status_project as nama_status_project,
			tanggal_mulai, 
			tanggal_selesai');

		$this->datatables->from('transaksi_project');
		$this->datatables->join('project', 'transaksi_project.id_project = project.id_project');
		$this->datatables->join('karyawan', 'transaksi_project.id_karyawan = karyawan.id_karyawan');
		$this->datatables->join('job', ' transaksi_project.id_job = job.id_job');
		$this->datatables->join('status_project', ' transaksi_project.id_status_project = status_project.id_status_project');
		
		$this->datatables->add_column('edit', ' <a type=button onclick=edit_status($1) class="btn btn-info">Edit</a> ','id_transaksi_project');

		$this->datatables->add_column('delete', ' <a type=button onclick=delete_status($1) class="btn btn-danger">Delete</a> ','id_transaksi_project');

		$this->datatables->where($where);
		$this->datatables->where($whereKaryawan);
		$this->datatables->where($whereJob);
		$this->datatables->where($whereStatus);
		
		echo $this->datatables->generate();


	}

	public function detail_transaksi_project_ajax_non($id){

		

		$status = 'nonaktif';


		$this->datatables->select(' 
			id_transaksi_project,
			project.no_project as no_project,
			karyawan.nama_karyawan as nama_karyawan,    
			job.nama_job as nama_job, 
			detail_jenis_project,
			status_project.nama_status_project as nama_status_project,
			tanggal_mulai, 
			tanggal_selesai');

		$this->datatables->from('transaksi_project');
		$this->datatables->join('project', 'transaksi_project.id_project = project.id_project');
		$this->datatables->join('karyawan', 'transaksi_project.id_karyawan = karyawan.id_karyawan');
		$this->datatables->join('job', ' transaksi_project.id_job = job.id_job');
		$this->datatables->join('status_project', ' transaksi_project.id_status_project = status_project.id_status_project');
		
	

		$this->datatables->where("transaksi_project.id_project ='".$id."' and 
			(karyawan.kondisi_enum ='".$status."' 
				or job.kondisi_enum ='".$status."' 
				or status_project.kondisi_enum='".$id."') " );
		// $this->datatables->where($whereKaryawan);
		// $this->datatables->where($whereStatus);
		// $this->datatables->where($whereJob);
		
		echo $this->datatables->generate();


	}


	public function ajax_add_transaksi_project(){



		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');

		$tanggal_mulai = date("Y-m-d",strtotime($tanggal_mulai)) ;
		$tanggal_selesai = date("Y-m-d",strtotime($tanggal_selesai));

		$data = array(
			'id_project' => $this->input->post('id_projectt'),
			'id_karyawan' => $this->input->post('id_karyawan'),
			'id_job' => $this->input->post('id_job'),
			'detail_jenis_project' => $this->input->post('detail_jenis_project'),
			'id_status_project' => $this->input->post('status_project'),
			'tanggal_mulai' => $tanggal_mulai,
			'tanggal_selesai' => $tanggal_selesai ,

			);

		$where = array(
			'id_transaksi_project'=> $this->input->post('id_projectt')
			);

		$tabel = 'transaksi_project';

		$insert = $this->Model_project->save($tabel,$data);
		echo json_encode(array("status" => 'TRUE'));

		$id = $this->input->post('id_projectt');
		$this->dss($id);
	}

	public function ajax_edit_transaksi_project($id)
	{
		$where = array(
			'transaksi_project.id_transaksi_project'=>$id,
			);

		$tabel = 'transaksi_project';

		$data = $this->Model_project->get_by_transaksi_project($tabel,$where);

		$data->tanggal_mulai = date("m/d/Y",strtotime($data->tanggal_mulai)) ;
		$data->tanggal_selesai = date("m/d/Y",strtotime($data->tanggal_selesai)) ;

		
		echo json_encode($data);

	}

	public function ajax_update_transaksi_project()
	{

		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');

		$tanggal_mulai = date("Y-m-d",strtotime($tanggal_mulai)) ;
		$tanggal_selesai = date("Y-m-d",strtotime($tanggal_selesai));

		$data = array(
			'id_karyawan' => $this->input->post('id_karyawan'),
			'id_job' => $this->input->post('id_job'),
			'detail_jenis_project' => $this->input->post('detail_jenis_project'),
			'id_status_project' => $this->input->post('status_project'),
			'tanggal_mulai' => $tanggal_mulai,
			'tanggal_selesai' => $tanggal_selesai,

			);

		$where = array(
			'id_transaksi_project'=> $this->input->post('id_transaksi_projectt')
			);

		$table = 'transaksi_project';

		$this->Model_project->update_ajax($table,$where, $data);
		echo json_encode(array("status" => 'TRUE'));

		$id = $this->input->post('id_projectt');
		$this->dss($id);


	}



	public function ajax_delete_transaksi_project($id)
	{


		$idd='';

		$where = array(
			'transaksi_project.id_transaksi_project'=>$id,
			);

		$tabel = 'transaksi_project';

		$test = $this->Model_project->get_where($tabel,$where)->result();
		foreach ($test as $key => $value) {
			$idd = $value->id_project;
		}	


		$this->Model_project->delete_by_id($tabel,$where);
		

		echo json_encode(array("status" => 'TRUE'));

		$this->dss($idd);





	}


/////

	public function detail_transaksi_project($id){


		$where = array(
			'transaksi_project.id_project'=>$id,
			);

		$queryProject = "SELECT * FRoM project WHERE id_project=".$id;
		$exeQuery = $this->Model_project->rawQuery($queryProject);

		// print_r($exeQuery);
		if ($exeQuery->num_rows() > 0) {
			$data['nomor_project'] = $exeQuery->row()->no_project;
		//apakah ada karyawan yang sudah join pada project apa belum
			$cek = $this->Model_project->getData('transaksi_project',$where)->num_rows();

			if($cek>0){
				//jika sudah

				//fixkan harus diiner join
				$this->db->select(' 
					id_transaksi_project,
					project.no_project as no_project,
					karyawan.nama_karyawan as nama_karyawan,    
					job.nama_job as nama_job, 
					detail_jenis_project,
					status_project.nama_status_project as nama_status_project, 
					tanggal_mulai, 
					tanggal_selesai');

				$this->db->from('transaksi_project');
				$this->db->join('project', 'transaksi_project.id_project = project.id_project');
				$this->db->join('karyawan', 'transaksi_project.id_karyawan = karyawan.id_karyawan');
				$this->db->join('job', ' transaksi_project.id_job = job.id_job');
				$this->db->join('status_project', 'transaksi_project.id_status_project = status_project.id_status_project');
				$this->db->where($where);

				$data['transaksi_project'] = $this->db->get()->result();
				$data['status'] = 1;

				//$data['transaksi_project'] = $this->Model_project->getData('transaksi_project',$where)->result();


				$data['job'] = $this->db->get('job')->result();
				$data['karyawan'] = $this->db->get('karyawan')->result();
				$data['status_project'] = $this->db->get('status_project')->result();
				$data['id_project'] = $id;

				//ambil tanggal aja
				$tanggal_mulai_project = $exeQuery->row()->tanggal_mulai_project;
				$tanggal_mulai_project = date("m/d/Y",strtotime($tanggal_mulai_project)) ;
				$data['tanggal_mulai_project'] = $tanggal_mulai_project;
				//ambil tanggal aja
				$tanggal_selesai_project = $exeQuery->row()->tanggal_selesai_project;
				$tanggal_selesai_project = date("m/d/Y",strtotime($tanggal_selesai_project)) ;
				$data['tanggal_selesai_project'] = $tanggal_selesai_project;



				$this->load->view('utama/header');
				$this->load->view('see_detailkaryawan/detail_karyawan',$data);
				$this->load->view('utama/footer');

			}
			else{
				//jika belum
				$data['status'] = 0;
				
				$data['id_project'] = $id;


				// $whereProject = array("id_project", $id);
				// $dataProject = $this->Model_project->getData('project', $whereProject);
				// print_r($dataProject);

				$data['karyawan'] = $this->db->get('karyawan')->result();
				$data['job'] = $this->db->get('job')->result();
				
				//ambil tanggal aja
				$tanggal_mulai_project = $exeQuery->row()->tanggal_mulai_project;
				$tanggal_mulai_project = date("m/d/Y",strtotime($tanggal_mulai_project)) ;
				$data['tanggal_mulai_project'] = $tanggal_mulai_project;
				//ambil tanggal aja
				$tanggal_selesai_project = $exeQuery->row()->tanggal_selesai_project;
				$tanggal_selesai_project = date("m/d/Y",strtotime($tanggal_selesai_project)) ;
				$data['tanggal_selesai_project'] = $tanggal_selesai_project;

				$this->load->view('utama/header');
				$this->load->view('see_detailkaryawan/detail_karyawan',$data);
				$this->load->view('utama/footer');

			}
			# code...
		}else{
			/*tidak ditemukan id project*/
			//FIXKAN//

		}


	}

	public function inputTransaksiProject()
	{
		$id_project = $this->input->post('id_project');		
		$id_karyawan = $this->input->post('id_karyawan');
		$id_job = $this->input->post('id_job');
		$detail_jenis_project = $this->input->post('detail_jenis_project');	
		$id_status_project = $this->input->post('id_status_project');	
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');		

		$tanggal_mulai = date("Y-m-d",strtotime($tanggal_mulai)) ;
		$tanggal_selesai = date("Y-m-d",strtotime($tanggal_selesai));

		echo $tanggal_mulai;
		echo $tanggal_selesai;	
		$table= "transaksi_project";

		$data = array(
			'id_project'=>$id_project,
			'id_karyawan'=>$id_karyawan,
			'id_job'=>$id_job,
			'detail_jenis_project'=>$detail_jenis_project,
			'id_status_project'=>$id_status_project,
			'tanggal_mulai'=>$tanggal_mulai,
			'tanggal_selesai'=>$tanggal_selesai,
			);

		$this->db->insert($table,$data);
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Sukses </h4>
			Data berhasil diinput
		</div>');
		redirect('project/detail_transaksi_project/'.$id_project);


	}


	public function delete_transaksi_project($id, $no_project){

		echo $id;
		echo $no_project;

		$where = array(
			'id_transaksi_project'=>$id,
			);

		$table = "transaksi_project";



		$this->Model_project->hapus_data($where,$table);

		$this->session->set_flashdata('hapus','<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-close"></i> Sukses </h4>
			Data berhasil dihapus
		</div>');

		redirect('project/detail_transaksi_project/'.$no_project);


	}





} 

?>	