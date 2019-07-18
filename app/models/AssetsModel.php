<?php 

class AssetsModel extends model {

    protected $table = ['assets','assets_type','vendors','brands','accounts'];

    public function __construct() {
        parent:: __construct();
    }

    public function GetAllAssetsType() {
        return $this->db->select($this->table[1],'*');
    }

    public function GetAllAssets($assets_type_id) {
        return $this->db->select($this->table[0], [
            "[>]".$this->table[1] => ["assets_type_id" => "assets_type_id"],
            "[>]".$this->table[2] => ["vendors_id" => "vendors_id"],
            "[>]".$this->table[3] => ["brands_id" => "brands_id"],
            "[>]".$this->table[4] => ["accounts_id" => "accounts_id"]
        ],'*',[$this->table[1].'.assets_type_id' => $assets_type_id]);
    }

    public function GetAllAssetsByAccountsId($accounts_id) {
        return $this->db->select($this->table[0], [
            "[>]".$this->table[1] => ["assets_type_id" => "assets_type_id"],
            "[>]".$this->table[2] => ["vendors_id" => "vendors_id"],
            "[>]".$this->table[3] => ["brands_id" => "brands_id"],
            "[>]".$this->table[4] => ["accounts_id" => "accounts_id"]
        ],'*',[$this->table[4].'.accounts_id' => $accounts_id]);
    }

    public function GetAllAssetsByVendorsId($vendors_id) {
        return $this->db->select($this->table[0], [
            "[>]".$this->table[1] => ["assets_type_id" => "assets_type_id"],
            "[>]".$this->table[2] => ["vendors_id" => "vendors_id"],
            "[>]".$this->table[3] => ["brands_id" => "brands_id"],
            "[>]".$this->table[4] => ["accounts_id" => "accounts_id"]
        ],'*',[$this->table[2].'.vendors_id' => $vendors_id]);
    }

    public function GetAssetByAssetsId($assets_id) {
        return $this->db->select($this->table[0], [
            "[>]".$this->table[1] => ["assets_type_id" => "assets_type_id"],
            "[>]".$this->table[2] => ["vendors_id" => "vendors_id"],
            "[>]".$this->table[3] => ["brands_id" => "brands_id"],
            "[>]".$this->table[4] => ["accounts_id" => "accounts_id"]
        ],'*',[$this->table[0].'.assets_id' => $assets_id]);
    }

    public function GetAssetsTypeByAssetsId($assets_type_id) {
        return $this->db->select($this->table[1],'*',['assets_type_id' => $assets_type_id]);
    }

    public function CountAssetsTypeByAssetsId($assets_id) {
        return $this->db->count($this->table[0],'*',['assets_type_id' => $assets_id]);
    }
}