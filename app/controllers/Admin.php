<?php

class Admin extends Controller {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['accounts_id'])) {
            redirect('login');
        }
	}

    public function index() {
       return $this->profile;
    }
    public function profile() {
        $data['assets_type']    = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']     = $this->model->use('VendorsModel')->GetAllVendors();
        $data['user']           = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['title']          = 'profile';
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/profile',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

    public function logout() {
        session_destroy();
        redirect('login','You are logged out.');
    }

}
