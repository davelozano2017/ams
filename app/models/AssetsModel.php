<?php 

class AssetsModel extends model {

    protected $table = ['assets','assets_type'];

    public function __construct() {
        parent::__construct();
    }

    public function GetAllAssetsType() {
        return $this->db->select($this->table[1],'*');
    }

    public function GetAssetsTypeByAssetsId($assets_type_id) {
        return $this->db->select($this->table[1],'*',['assets_type_id' => $assets_type_id]);
    }

    public function CountAssetsTypeByAssetsId($assets_id) {
        return $this->db->count($this->table[0],'*',['assets_type_id' => $assets_id]);
    }
}