<?php

class Maintenance extends Controller { 

	public function __construct(){
        parent:: __construct();
        $this->token = $_SESSION['token'];
	}

    public function updateSettings() {
        if($this->token == post('token')) {
            $data = array(
                'settings_id'  => decode(post('settings_id')),
                'website_name' => post('website_name'),
                'date_format'  => post('date_format'),
                'timezone'     => post('timezone')
            );
            $this->model->use('SettingsModel')->updateSettings($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function updateAssetType() {
        if($this->token == post('token')) {
            $data = array(
                'assets_type_id' => decode(post('assets_type_id')),
                'assets_name'    => post('assets_name'),
            );
            $this->model->use('MaintenanceModel')->updateAssetType($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function createAssetType() {
        if($this->token == post('token')) {
            $data = array(
                'assets_name' => post('assets_name'),
            );
            $this->model->use('MaintenanceModel')->createAssetType($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function updateVendors() {
        if($this->token == post('token')) {
            $data = array(
                'vendors_id' => decode(post('vendors_id')),
                'name'       => post('name'),
                'contact'    => post('contact'),
                'website'    => post('website'),
                'email'      => post('email'),
                'address'    => post('address'),
                'country'    => post('country'),
            );
            $this->model->use('MaintenanceModel')->updateVendors($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function createVendors() {
        if($this->token == post('token')) {
            $data = array(
                'name'    => post('name'),
                'contact' => post('contact'),
                'website' => post('website'),
                'email'   => post('email'),
                'address' => post('address'),
                'country' => post('country'),
            );
            $this->model->use('MaintenanceModel')->createVendors($data);
        } else {
            $this->load->view('errors');
        }
    }

    
}