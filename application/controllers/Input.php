<?php 
class Input extends CI_Controller {

	public function __construct()
	{
			//Mengambil data dari CI_Controller ke Test
		parent::__construct();
			//Akan load terus ke W
		//$this->load->model('Model_login');
		$this->load->helper('form');
		$this->load->helper('url');	
		$this->load->helper('cookie');
				
	}


	public function index() { 

		$this->load->view('input');

	}



} 

?>	