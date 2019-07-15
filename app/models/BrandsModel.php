<?php 

class BrandsModel extends model {

    protected $table = ['brands'];

    public function __construct() {
        parent:: __construct();
    }

    public function GetAllBrands() {
        return $this->db->select($this->table[0],'*');
    }


    public function GetBrandsByBrandsId($brands_id) {
        return $this->db->select($this->table[0],'*',['brands_id' => $brands_id]);
    }

    

 
}