<?php

class Dashboard extends Controller {

    public function __construct(){
		parent::__construct();
	}

    public function index() {
        $data['title'] = 'dashboard';
        $data['assets_type'] = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors'] = $this->model->use('VendorsModel')->GetAllVendors();
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/dashboard',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
