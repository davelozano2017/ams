<?php

class Personnel extends Controller {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['accounts_id'])) {
            redirect('login');
        }
	}

    public function index() {
        $data['assets_type']    = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']     = $this->model->use('VendorsModel')->GetAllVendors();
        $data['user']           = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['query']          = $this->model->use('AccountsModel')->GetAllPersonnels();
        $data['title']          = 'personnel';
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/personnel',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
