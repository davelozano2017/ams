<?php

class Reports extends Controller {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['accounts_id'])) {
            redirect('login');
        }
	}

    public function index() {
        $data['allVendors']     = $this->model->use('VendorsModel')->GetAllVendors();
        $data['assets_type']    = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['user']           =$this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['title']          = 'reports';
        $data['listOfAssets']   = [];
        if(isset($_POST['btnFilter'])) {
            $data = array(
                'from' => post('from'),
                'to' => post('to')
            );
            $data['listOfAssets']   = $this->model->use('AssetsModel')->GetFilteredAssets($data);
            $data['user']           = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
    }

        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/reports',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
