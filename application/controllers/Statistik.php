<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller 

{

	public function __construct()
	{
		//Mengambil data dari CI_Controller ke Test
		parent::__construct();
		//Akan load terus ke W
		$this->load->library('datatables');
		$this->load->model('Model_project');
		$this->load->library('datatables');
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

	public function line_chart(){

	
		//get DATE
		$now = date("Y-m-d");

		$check ='';

		$startmonth =date("m",strtotime($now));
		$startyear = date("Y",strtotime($now));

		$lastmonth =(int) date("m", strtotime(" ".$now."  -4 months"));		
		$lastyear =(int) date("Y", strtotime(" ".$now."  -4 months"));		


		if($startyear==$lastyear){
			//echo "test1";
			$check=1;
			$data['text'][] ="periode ".$startyear." ";
		}
		else{
			$check=2;
			$data['text'][] ="periode ".$lastyear." - ".$startyear."  ";
		}

		// $newStart = date_parse_from_format('m',$startdate);
		// $neWLast = 	date_parse_from_format('m',$lastdate);

		// echo $newStart['month'];
		// echo "<br>";
		// echo $neWLast['month'];


		// echo $startmonth.$lastmonth.$year;			
		 // $startdate = date("2016-12-5");	
		 // $lastdate = date("2017-3-1");	

		// $date = date("m");		
		// $startdate = date('m', strtotime("-4 months")).'-01';		
		// $lastdate = $date;
		//

		// $query = "SELECT MONTH(tanggal_mulai_project) as bulan,
		// YEAR(tanggal_mulai_project) as tahun,
		// COUNT(id_project) as count
		// from project
		// WHERE month(tanggal_mulai_project) <= '".$startmonth."' and month(tanggal_mulai_project) >= '".$lastmonth."' and year(tanggal_mulai_project)= '".$year."' 
		// group by MONTH (tanggal_mulai_project),
		// YEAR(tanggal_mulai_project)"
		// ;

		//perulangan 
		$awal = (int)$lastmonth;
		$akhir = (int)$startmonth;		


		//logika jika bulan yang terambil bulan 
		//tujuan untuk membantu dalam perulangan
		if($akhir==1){
			$akhir = 13;
		}
		if($akhir==2){
			$akhir = 14;
		}
		if($akhir==3){
			$akhir = 15;
		}
		if($akhir==4){
			$akhir = 16;
		}




		//---------------------------------------

		$bulan='';

		for($i = $awal ; $i<=$akhir;$i++)
		{
			$bulan = $i;

			//tujuan untuk mendapatkan bulan yang sesuai
			if($i==13){
				$bulan = 1;
			}
			if($i==14){
				$bulan = 2;
			}
			if($i==15){
				$bulan = 3;
			}
			if($i==16){
				$bulan = 4;
			}

			//echo $bulan;

			//jika tahun sama
			if($check==1)
			{
				$query = "SELECT 
				MONTH(tanggal_mulai_project) as bulan,
				COUNT(IFNULL(id_project, 0)) as count
				from project
				where month(tanggal_mulai_project)= ".$bulan."
				AND
				year(tanggal_mulai_project)=".$startyear."
				AND
				id_sumber_project IN (SELECT id_sumber_project FROM sumber_project WHERE kondisi_enum = 'aktif')
				AND
				id_status_project IN (SELECT id_status_project FROM status_project WHERE kondisi_enum = 'aktif')
				AND
				id_client IN (SELECT id_klien FROM klien WHERE kondisi_enum = 'aktif')
				AND
				id_kategori_client IN (SELECT id_kategori_client FROM kategori_client WHERE kondisi_enum = 'aktif')

				"
				;
			}

			//jika tahun berbeda
			if($check==2){
				
				if($bulan>=1 && $bulan<=4)
				{
					$query = "SELECT 
					MONTH(tanggal_mulai_project) as bulan,
					COUNT(IFNULL(id_project, 0)) as count
					from project
					where month(tanggal_mulai_project)= ".$bulan."
					AND
					year(tanggal_mulai_project)=".$startyear."
					AND
					id_sumber_project IN (SELECT id_sumber_project FROM sumber_project WHERE kondisi_enum = 'aktif')
					AND
					id_status_project IN (SELECT id_status_project FROM status_project WHERE kondisi_enum = 'aktif')
					AND
					id_client IN (SELECT id_klien FROM klien WHERE kondisi_enum = 'aktif')
					AND
					id_kategori_client IN (SELECT id_kategori_client FROM kategori_client WHERE kondisi_enum = 'aktif')

					"
					;
				}


				else
				{
					$query = "SELECT 
					MONTH(tanggal_mulai_project) as bulan,
					COUNT(IFNULL(id_project, 0)) as count
					from project
					where month(tanggal_mulai_project)= ".$bulan."
					AND
					year(tanggal_mulai_project)=".$lastyear."
					AND
					id_sumber_project IN (SELECT id_sumber_project FROM sumber_project WHERE kondisi_enum = 'aktif')
					AND
					id_status_project IN (SELECT id_status_project FROM status_project WHERE kondisi_enum = 'aktif')
					AND
					id_client IN (SELECT id_klien FROM klien WHERE kondisi_enum = 'aktif')
					AND
					id_kategori_client IN (SELECT id_kategori_client FROM kategori_client WHERE kondisi_enum = 'aktif')

					"
					;
				}

			}

			$exeQuery = $this->Model_project->rawQuery($query);
			//jika data count yang dihasilkan '0'	
			if ( $exeQuery->row()->bulan==NULL){
				//karena data 0 maka bulan tidak ke get maka diakali dengan diisi sendiri
				$data['bulan'][] = $this->Model_project->month_converter($bulan);
				$data['count'][] = (int)$exeQuery->row()->count;
			}
			//jika data ada pada query
			else{
				$data['bulan'][] = $this->Model_project->month_converter($exeQuery->row()->bulan);
				$data['count'][] = (int)$exeQuery->row()->count;

			}

		}

		// $query = "SELECT MONTH(tanggal_mulai_project) as bulan,
		// YEAR(tanggal_mulai_project) as tahun,
		// COUNT(id_project) as count
		// from project		
		// WHERE month(tanggal_mulai_project) <= '".$startmonth."' and month(tanggal_mulai_project) >= '".$lastmonth."' and year(tanggal_mulai_project)= '".$year."'
		// AND
		// id_sumber_project IN (SELECT id_sumber_project FROM sumber_project WHERE kondisi_enum = 'aktif')
		// AND
		// id_status_project IN (SELECT id_status_project FROM status_project WHERE kondisi_enum = 'aktif')
		// AND
		// id_client IN (SELECT id_klien FROM klien WHERE kondisi_enum = 'aktif')
		// AND
		// id_kategori_client IN (SELECT id_kategori_client FROM kategori_client WHERE kondisi_enum = 'aktif')

		// group by MONTH (tanggal_mulai_project),
		// YEAR(tanggal_mulai_project)"
		// ;

		// $exeQuery = $this->Model_project->rawQuery($query)->result();

		$this->load->view('utama/header');
		$this->load->view('statistik/line_chart', $data);
		$this->load->view('utama/footer');

	}

	public function bar_chart(){

		$date = date("m");
		$year = date('Y');

		$data['bulan'][] = $this->Model_project->month_converter($date);

		// $query = "SELECT 
		// karyawan.nama_karyawan as nama_karyawan,
		// COUNT(id_transaksi_project) as jumlah_project
		// FROM transaksi_project

		// right JOIN karyawan ON transaksi_project.id_karyawan = karyawan.id_karyawan
		// AND (MONTH(tanggal_mulai) = '".$date."' OR MONTH(tanggal_selesai) = '".$date."')
		// GROUP BY (karyawan.id_karyawan)
		// ";

		$query = " SELECT 

		karyawan.nama_karyawan as nama_karyawan,
		(SELECT COUNT(id_project) 
			FROM transaksi_project	
			WHERE
			id_karyawan = karyawan.id_karyawan
			AND	
			id_job IN (SELECT id_job FROM job WHERE kondisi_enum = 'aktif')
			AND
			id_status_project IN (SELECT id_status_project FROM status_project WHERE kondisi_enum = 'aktif')
			AND
			MONTH(transaksi_project.tanggal_mulai) = '".$date."' AND YEAR (transaksi_project.tanggal_mulai) = '".$year."'
			AND
			MONTH(transaksi_project.tanggal_selesai) = '".$date."' AND YEAR (transaksi_project.tanggal_selesai) = '".$year."'
			) as jumlah_project

FROM karyawan
LEFT JOIN transaksi_project ON karyawan.id_karyawan = transaksi_project.id_karyawan

WHERE karyawan.kondisi_enum = 'aktif' 

GROUP BY karyawan.id_karyawan

";



$exeQuery = $this->Model_project->rawQuery($query)->result();

foreach ($exeQuery as $row)
{

	$data['karyawan'][] = $row->nama_karyawan;
	$data['count'][] = (int)$row->jumlah_project;
}
$this->load->view('utama/header');
$this->load->view('statistik/bar_chart',$data);
$this->load->view('utama/footer');

}	

public function bar_chart_laporan()
{

	$where_karyawan= array(
		'karyawan.kondisi_enum'=>'aktif');

	$month = date('m');

	$this->db->distinct();
	$this->datatables->select('
		karyawan.id_karyawan as id_karyawan, 
		karyawan.nama_karyawan as nama_karyawan,
		');

	$this->datatables->from('karyawan');

	$this->datatables->join('transaksi_project','JOIN karyawan on karyawan.id_karyawan = transaksi_project.id_karyawan');

	$this->datatables->add_column('view', ' <a type=button onclick=view_detail($1) class="btn btn-info">View</a> ','id_karyawan');

	$this->datatables->where($where_karyawan);

	$this->datatables->group_by("karyawan.id_karyawan");
	$this->db->order_by("karyawan.id_karyawan");



	echo $this->datatables->generate();


}

public function bar_chart_laporan_detail($id){

	$month = date("m");
	$year  = date("Y");

	$query = 
	" SELECT DISTINCT project.nama_project as nama_project
	from transaksi_project
	join project on project.id_project = transaksi_project.id_project
	and
	transaksi_project.id_karyawan = '".$id."'
	and month(transaksi_project.tanggal_mulai)= '".$month."' 
	and month(transaksi_project.tanggal_selesai)='".$month."'
	and year(transaksi_project.tanggal_mulai)= '".$year."'
	and year(transaksi_project.tanggal_selesai)='".$year."'
	";

	$data['output'] = $this->Model_project->rawQuery($query)->result_array();
	echo json_encode($data);

}

public function pie_chart(){

	$date = date("m");
	$year = date("Y");
		// '".$date."'		

	$data['bulan'][] = $this->Model_project->month_converter($date);

		// $query = "SELECT kategori_client.nama_kategori_client as nama_kategori_client,
		// COUNT(project.id_status_project) as count_status
		// from project
		// right JOIN kategori_client ON project.id_kategori_client = kategori_client.id_kategori_client
		// where MONTH(project.tanggal_mulai_project) = '".$date."'	
		// group by (project.id_kategori_client)";

	$query = "SELECT 
	kategori_client.nama_kategori_client as nama_kategori_client,
	COUNT(project.id_status_project) as count_status
	from project

	JOIN kategori_client ON project.id_kategori_client = kategori_client.id_kategori_client

	where 
	MONTH(project.tanggal_mulai_project) = '".$date."'	
	and 
	YEAR(project.tanggal_mulai_project) = '".$year."'
	and
	id_status_project IN (SELECT id_status_project FROM status_project WHERE kondisi_enum = 'aktif')
	and
	id_sumber_project IN (SELECT id_sumber_project FROM sumber_project WHERE kondisi_enum = 'aktif')
	AND
	id_client IN (SELECT id_klien FROM klien WHERE kondisi_enum = 'aktif')		
	and kategori_client.kondisi_enum ='aktif'

	group by (kategori_client.id_kategori_client)

	";

	$exeQuery = $this->Model_project->rawQuery($query)->result();

		//print_r($exeQuery);


	$total=0;

	foreach ($exeQuery as $row)
	{
		$total = $total + (float)$row->count_status;
	}




	foreach ($exeQuery as $row)
	{

		$test[] = array(
			'name' => $row->nama_kategori_client,
			'y' => (float) $row->count_status/$total*100,
			'count'=> (float) $row->count_status
			);
		$test1[] =array(

			);
	}


	$data['result'] = $test;
	$data['result1'] = $test1;

	$this->load->view('utama/header');
	$this->load->view('statistik/pie_chart',$data);
	$this->load->view('utama/footer');

}

public function get_month(){

	$date = date("Y-m-d");

	$startdate = date('Y-m', strtotime("-5 months")).'-01';		
	$lastdate = $date;

	ECHO $startdate;





}






} 






?>	