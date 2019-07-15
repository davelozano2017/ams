<?php

class Brands extends Controller {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['accounts_id'])) {
            redirect('login');
        }
        $_SESSION['token'] = token;
    }
    
    public function index() {
        redirect('dashboard');
    }

    public function view($id) {
        $assets_type_id         = decode($id);
        $data['getAssetsType']  = $this->model->use('AssetsModel')->GetAssetsTypeByAssetsId($assets_type_id);
        empty($data['getAssetsType']) ? redirect('settings') : '';
        $data['assets_type']    = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']     = $this->model->use('VendorsModel')->GetAllVendors();
        $data['user']           = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['dropdown']       = 'assets';
        $data['title']          = $data['getAssetsType'][0]['assets_name'];
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/assets/assets',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

    public function edit($id) {
        $brands_id              = decode($id);
        $data['getBrands']  = $this->model->use('BrandsModel')->GetBrandsByBrandsId($brands_id);
        empty($data['getBrands']) ? redirect('settings') : '';
        $data['assets_type']    = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']     = $this->model->use('VendorsModel')->GetAllVendors();
        $data['user']           = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['token']          = $_SESSION['token'];
        $data['title']          = 'settings';
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/brands/edit',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

    public function create() {
        $data['user']        = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['title']       = 'settings';
        $data['assets_type'] = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']  = $this->model->use('VendorsModel')->GetAllVendors();
        $data['token']  = $_SESSION['token'];
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/brands/create',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
