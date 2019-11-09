<?php

class Dashboard extends Controller {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['accounts_id'])) {
            redirect('login');
        }
	}

    public function index() {
        $data['title']       = 'dashboard';
        $data['type']        = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['user']        = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $show = array();
        $data['assets_type'] = $this->model->use('AssetsModel')->GetAllAssetsType();
        foreach ($data['type'] as $rows) {
            $count = $this->model->use('AssetsModel')->CountAssetsTypeByAssetsId($rows['assets_type_id']);
            array_push($show, array('count' => $count,'assets_id' =>$rows['assets_type_id'] ));
        }
        $data['countAllUsers'] = $this->model->use('AccountsModel')->countAllUsers();
        $data['query'] = $show;
        $data['allVendors'] = $this->model->use('VendorsModel')->GetAllVendors();
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/dashboard',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
