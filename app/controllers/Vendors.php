<?php

class Vendors extends Controller {

    public function __construct(){
        parent:: __construct();
        if(!isset($_SESSION['accounts_id'])) {
            redirect('login');
        }
        $_SESSION['token'] = token;
    }
    
    public function index() {
        redirect('dashboard');
    }

    public function view($id) {
        $vendors_id                    = decode($id);
        $data['getVendorsByVendorsId'] = $this->model->use('VendorsModel')->GetVendorsByVendorsId($vendors_id);
        $data['getAllVendors']         = $this->model->use('VendorsModel')->GetAllVendors();
        $data['assets_type']           = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['dropdown']              = 'vendors';
        $data['user']                  = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['title']                 = 'vendor-'.$data['getVendorsByVendorsId'][0]['vendors_id'];
        $data['allVendors']            = $this->model->use('VendorsModel')->GetAllVendors();
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/vendors/vendors',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

    public function edit($id) {
        $vendors_id             = decode($id);
        $data['vendors']        = $this->model->use('VendorsModel')->GetVendorsByVendorsId($vendors_id);
        $data['assets_type']    = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']     = $this->model->use('VendorsModel')->GetAllVendors();
        $data['user']           = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['token']          = $_SESSION['token'];
        $data['countries']      = $this->model->use('CountryModel')->GetAllCountries();
        $data['title']          = 'settings';
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/vendors/edit',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

    public function create() {
        $data['user']        = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['title']       = 'settings';
        $data['assets_type'] = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']  = $this->model->use('VendorsModel')->GetAllVendors();
        $data['countries']   = $this->model->use('CountryModel')->GetAllCountries();
        $data['token']       = $_SESSION['token'];
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/vendors/create',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
