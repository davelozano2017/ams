<?php 

class MaintenanceModel extends model {

    protected $table = ['assets_type','vendors','brands','assets','projects','projects_timeline'];

    public function __construct() {
        parent:: __construct();
    }

    // public function updateSettings($data) {
    //     $this->db->update($this->table[0], $data, [ 'settings_id' => $data['settings_id'] ]);
    //     redirect('settings','Settings has been updated.');
    // }

    //    assets type 
    public function createAssetType($data) {
        if($this->db->has($this->table[0],['assets_name' => $data['assets_name']])) {
            redirect('settings',$data['assets_name'].' already exist.');
        } else {
            $this->db->insert($this->table[0],$data);
            redirect('settings','New Asset has been added.');
        }
    }

    // assets
    public function createAssets($data) {
        if($this->db->has($this->table[3],['model' => $data['model']])) {
            redirect('assets/view/'.encode($data['assets_type_id']),$data['model'].' already exist.');
        } else {
            $this->db->insert($this->table[3],$data);
            move_uploaded_file($_FILES['files']['tmp_name'],'assets/uploads/'.$_FILES['files']['name']);
            redirect('assets/view/'.encode($data['assets_type_id']),'New Asset has been added.');
        }
    }

    public function updateAssets($data) {
        $this->db->update($this->table[3],$data,['assets_id' => $data['assets_id']]);
        move_uploaded_file($_FILES['files']['tmp_name'],'assets/uploads/'.$_FILES['files']['name']);
        redirect('assets/modify/'.encode($data['assets_id']),$data['model'].' has been updated.  <a style="color:#000;font-weight:bolder" href="'.site_url('assets/view/'.encode($data['assets_type_id'])).'">Back</a>');
    }

    // projects
    public function createProjects($data) {
        if($this->db->has($this->table[4],['project_name' => $data['project_name']])) {
            redirect('project',$data['project_name'].' already exist.');
        } else {
            $this->db->insert($this->table[4],$data);
            redirect('project','New project has been added.');
        }
    }

    public function updateProjects($data) {
        $this->db->update($this->table[4],$data,['projects_id' => $data['projects_id']]);
        redirect('project/view/'.encode($data['projects_id']),$data['project_name'].' has been updated.  <a style="color:#000;font-weight:bolder" href="'.site_url('project').'">Back</a>');
    }

    // note 
    public function createNote($data) {
        $this->db->insert($this->table[5],$data);
        redirect('project/view/'.encode($data['projects_id']),'New Note has been added.');
    }
    // brands
    public function createBrands($data) {
        if($this->db->has($this->table[2],['brands_name' => $data['brands_name']])) {
            redirect('settings',$data['brands_name'].' already exist.');
        } else {
            $this->db->insert($this->table[2],$data);
            redirect('settings','New Brand has been added.');
        }
    }


    public function updateAssetType($data) {
        $this->db->update($this->table[0],$data,['assets_type_id' => $data['assets_type_id']]);
        redirect('assets/edit/'.encode($data['assets_type_id']),'Asset has been updated. <a style="color:#000;font-weight:bolder" href="'.site_url('settings').'">Back</a>');
    }

    public function updateBrands($data) {
        $this->db->update($this->table[2],$data,['brands_id' => $data['brands_id']]);
        redirect('brands/edit/'.encode($data['brands_id']),'Brand has been updated. <a style="color:#000;font-weight:bolder" href="'.site_url('settings').'">Back</a>');
    }

    public function createVendors($data) {
        if($this->db->has($this->table[1],['name' => $data['name']])) {
            redirect('settings','Vendor '.$data['name'].' already exist.');
        } else {
            $this->db->insert($this->table[1],$data);
            redirect('settings','New Vendor has been added.');
        }
    }


    public function updateVendors($data) {
        $this->db->update($this->table[1],$data,['vendors_id' => $data['vendors_id']]);
        redirect('vendors/edit/'.encode($data['vendors_id']),'Vendor has been updated. <a style="color:#000;font-weight:bolder" href="'.site_url('settings').'">Back</a>');
    }

    

}