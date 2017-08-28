<?php
 
class Model_viewproject extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    function json() {
        
        $this->datatables->select(' id_project,
                                    project.no_project as no_project,
                                    project.nama_project as nama_project,    
                                    sumber_project.nama_sumber_project as namasumber, 
                                    status_project.nama_status_project as namastatus, 
                                    klien.nama_klien as namaklien, 
                                    kategori_client.nama_kategori_client as namakategori');
        
        $this->datatables->from('project');
        $this->datatables->join('sumber_project', 'project.id_sumber_project = sumber_project.id_sumber_project');
        $this->datatables->join('status_project', 'project.id_status_project = status_project.id_status_project');
        $this->datatables->join('klien', 'project.id_client = klien.id_klien');
        $this->datatables->join('kategori_client', 'project.id_kategori_client = kategori_client.id_kategori_client');


        $this->datatables->add_column('view', " <a type='button' href='".base_url()."project/detail_transaksi_project/".'$1'."' class='btn btn-info'>View</a>",'id_project');

        return $this->datatables->generate();
    }
}
 
?>