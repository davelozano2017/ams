<?php

class Vendors extends Controller {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['accounts_id'])) {
            redirect('login');
        }
    }
    
    public function index() {
        redirect('dashboard');
    }

    public function view($id) {
        $vendors_id                     = decode($id);
        $data['getVendorsByVendorsId']  = $this->model->use('VendorsModel')->GetAssetsTypeByAssetsId($vendors_id);
        $data['getAllVendors']          = $this->model->use('VendorsModel')->GetAllVendors();
        $data['assets_type']            = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['dropdown']               = 'vendors';
        $data['user']                   = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['title']                  = 'vendor-'.$data['getVendorsByVendorsId'][0]['vendors_id'];
        $data['allVendors']             = $this->model->use('VendorsModel')->GetAllVendors();
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/vendors',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
