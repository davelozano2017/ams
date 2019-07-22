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

    // assets Type 
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

    // assets 
    public function createAssets() {
        if($this->token == post('token')) {
            if(!empty($_FILES['files']['name'])) {
                $data = array(
                    'image'           => $_FILES['files']['name'],
                    'serial_number'   => post('serial_number'),
                    'brands_id'       => decode(post('brands_id')),
                    'description'     => post('description'),
                    'assets_type_id'  => decode(post('assets_type_id')),
                    'status'          => post('status'),
                    'model'           => post('model'),
                    'warranty_expiry' => post('warranty_expiry'),
                    'vendors_id'      => decode(post('vendors_id')),
                    'purchase_price'  => post('purchase_price'),
                    'expected_life'   => post('expected_life'),
                    'scrap_value'     => post('scrap_value')
                );
            } else {
                $data = array(
                    'serial_number'   => post('serial_number'),
                    'brands_id'       => decode(post('brands_id')),
                    'description'     => post('description'),
                    'assets_type_id'  => decode(post('assets_type_id')),
                    'status'          => post('status'),
                    'model'           => post('model'),
                    'warranty_expiry' => post('warranty_expiry'),
                    'vendors_id'      => decode(post('vendors_id')),
                    'purchase_price'  => post('purchase_price'),
                    'expected_life'   => post('expected_life'),
                    'scrap_value'     => post('scrap_value')
                );
            }
                $this->model->use('MaintenanceModel')->createAssets($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function updateAssets() {
        if($this->token == post('token')) {
            if(!empty($_FILES['files']['name'])) {
                $data = array(
                    'assets_id'       => decode(post('assets_id')),
                    'accounts_id'     => decode(post('accounts_id')),
                    'image'           => $_FILES['files']['name'],
                    'serial_number'   => post('serial_number'),
                    'brands_id'       => decode(post('brands_id')),
                    'description'     => post('description'),
                    'assets_type_id'  => decode(post('assets_type_id')),
                    'status'          => post('status'),
                    'model'           => post('model'),
                    'warranty_expiry' => post('warranty_expiry'),
                    'vendors_id'      => decode(post('vendors_id')),
                    'purchase_price'  => post('purchase_price'),
                    'expected_life'   => post('expected_life'),
                    'scrap_value'     => post('scrap_value')
                );
            } else {
                $data = array(
                    'assets_id'       => decode(post('assets_id')),
                    'accounts_id'     => decode(post('accounts_id')),
                    'serial_number'   => post('serial_number'),
                    'brands_id'       => decode(post('brands_id')),
                    'description'     => post('description'),
                    'assets_type_id'  => decode(post('assets_type_id')),
                    'status'          => post('status'),
                    'model'           => post('model'),
                    'warranty_expiry' => post('warranty_expiry'),
                    'vendors_id'      => decode(post('vendors_id')),
                    'purchase_price'  => post('purchase_price'),
                    'expected_life'   => post('expected_life'),
                    'scrap_value'     => post('scrap_value')
                );
            }
                $this->model->use('MaintenanceModel')->updateAssets($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function updateBrands() {
        if($this->token == post('token')) {
            $data = array(
                'brands_id' => decode(post('brands_id')),
                'brands_name' => post('brands_name'),
            );
            $this->model->use('MaintenanceModel')->updateBrands($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function createBrands() {
        if($this->token == post('token')) {
            $data = array(
                'brands_name' => post('brands_name'),
            );
            $this->model->use('MaintenanceModel')->createBrands($data);
        } else {
            $this->load->view('errors');
        }
    }

    // notes
    public function createNote() {
        if($this->token == post('token')) {
            $data = array(
                'note'        => post('note'),
                'projects_id' => decode(post('projects_id')),
            );
            $this->model->use('MaintenanceModel')->createNote($data);
        } else {
            $this->load->view('errors');
        }
    }

    // projects 
    public function createProjects() {
        if($this->token == post('token')) {
            $data = array(
                'project_name'  => post('project_name'),
                'accounts_id'   => decode(post('accounts_id')),
                'project_type'  => post('project_type'),
                'cost_estimate' => post('cost_estimate'),
                'address'       => post('address'),
            );
            $this->model->use('MaintenanceModel')->createProjects($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function updateProjects() {
        if($this->token == post('token')) {
            $data = array(
                'projects_id'   => decode(post('projects_id')),
                'project_name'  => post('project_name'),
                'accounts_id'   => decode(post('accounts_id')),
                'project_type'  => post('project_type'),
                'project_type'  => post('project_type'),
                'cost_estimate' => post('cost_estimate'),
                'address'       => post('address'),
            );
            $this->model->use('MaintenanceModel')->updateProjects($data);
        } else {
            $this->load->view('errors');
        }
    }

    // vendors
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