<?php 

class VendorsModel extends model {

    protected $table = ['vendors'];

    public function __construct() {
        parent:: __construct();
    }

    public function GetAllVendors() {
        return $this->db->select($this->table[0],'*');
    }

    public function GetVendorsByVendorsId($vendors_id) {
        return $this->db->select($this->table[0],'*',['vendors_id' => $vendors_id]);
    }
}