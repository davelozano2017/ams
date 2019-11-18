<?php

class Inventory extends Controller {

    public function __construct(){
        parent::__construct();
        $_SESSION['token'] = token;
        if(!isset($_SESSION['accounts_id'])) {
            redirect('login');
        } elseif($_SESSION['role'] == 1) {
            $this->load->view('errors');
        }
	}

    public function index() {
        $data['assets_type']    = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']     = $this->model->use('VendorsModel')->GetAllVendors();
        $data['brands_type']    = $this->model->use('BrandsModel')->GetAllBrands();
        $data['user']           = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['listOfAssets']   = $this->model->use('AssetsModel')->GetAllAsset();
        $data['token']          = $_SESSION['token'];
        $data['title']          = 'inventory';
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/inventory/inventory',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

    public function create() {
        $data['assets_type']    = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']     = $this->model->use('VendorsModel')->GetAllVendors();
        $data['user']           = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['query']          = $this->model->use('AccountsModel')->GetAllPersonnels();
        $data['title']          = 'project';
        $data['token']          = $_SESSION['token'];
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/project/create',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }
    
    public function view($id) {
        $project_id = decode($id);
        $data['assets_type']     = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['allVendors']      = $this->model->use('VendorsModel')->GetAllVendors();
        $data['user']            = $this->model->use('AccountsModel')->GetUserByAccountsId($_SESSION['accounts_id']);
        $data['projectTimeline'] = $this->model->use('ProjectModel')->GetProjectTimelineByProjectsId($project_id);
        $data['query']           = $this->model->use('ProjectModel')->GetAllProjectsByProjectsId($project_id);
        $data['personnels']      = $this->model->use('AccountsModel')->GetAllPersonnels();
        $data['title']           = 'project';
        $data['token']           = $_SESSION['token'];
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/project/view',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
