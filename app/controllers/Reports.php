<?php

class Reports extends Controller {

    public function __construct(){
		parent::__construct();
	}

    public function index() {
        $data['getAllVendors']  = $this->model->use('VendorsModel')->GetAllVendors();
        $data['allVendors']     = $this->model->use('VendorsModel')->GetAllVendors();
        $data['title']          = 'reports';
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/reports',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
