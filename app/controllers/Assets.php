<?php

class Assets extends Controller {

    public function __construct(){
		parent::__construct();
	}

    public function view($id) {
        $assets_type_id              = decode($id);
        $data['getAssetsType']  = $this->model->use('AssetsModel')->GetAssetsTypeByAssetsId($assets_type_id);
        $data['assets_type']    = $this->model->use('AssetsModel')->GetAllAssetsType();
        $data['dropdown']       = 'assets';
        $data['title']          = $data['getAssetsType'][0]['assets_name'];
        $data['allVendors'] = $this->model->use('VendorsModel')->GetAllVendors();
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/top-navigation',$data);
        $this->load->view('layouts/side-navigation',$data);
        $this->load->view('pages/admin/assets',$data);
        $this->load->view('layouts/footer',$data);
        $this->load->view('layouts/scripts',$data);
    }

}
