<?php

class Settings extends Controller {

    public function __construct(){
        parent::__construct();
        $_SESSION['token'] = token;
        if(!isset($_SESSION['accounts_id'])) {
            redirect('login');
        }
        $this->settings = $this->model->use('SettingsModel')->GetAllSettings();
	}

    public function index() {
        $data['title']       = 'settings';
        $data['type']        = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['user']        = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['assets_type'] = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']  = $this->model->use('VendorsModel')->GetAllVendors();
        $data['settings']    = $this->settings;
        $data['token']       = $_SESSION['token'];
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/settings/settings',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
