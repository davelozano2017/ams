<?php 

class MaintenanceModel extends model {

    protected $table = ['assets_type','vendors'];

    public function __construct() {
        parent:: __construct();
    }

    // public function updateSettings($data) {
    //     $this->db->update($this->table[0], $data, [ 'settings_id' => $data['settings_id'] ]);
    //     redirect('settings','Settings has been updated.');
    // }

    public function createAssetType($data) {
        if($this->db->hash($this->table[0],['assets_name' => $data['assets_name']])) {
            redirect('settings',$data['assets_name'].' already exist.');
        } else {
            $this->db->insert($this->table[0],$data);
            redirect('settings','New Asset has been added.');
        }
    }


    public function updateAssetType($data) {
        $this->db->update($this->table[0],$data,['assets_type_id' => $data['assets_type_id']]);
        redirect('assets/edit/'.encode($data['assets_type_id']),'Asset has been updated. <a style="color:#000;font-weight:bolder" href="'.site_url('settings').'">Back</a>');
    }

    public function createVendors($data) {
        if($this->db->hash($this->table[1],['name' => $data['name']])) {
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