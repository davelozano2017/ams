<?php 

class CountryModel extends model {

    protected $table = ['countries'];

    public function __construct() {
        parent:: __construct();
    }

    public function GetAllCountries() {
        return $this->db->select($this->table[0],'*');
    }

}