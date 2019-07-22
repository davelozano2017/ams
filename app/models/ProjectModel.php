<?php 

class ProjectModel extends model {

    protected $table = ['projects','accounts','projects_timeline'];

    public function __construct() {
        parent:: __construct();
    }

    public function GetAllProjects() {
        return $this->db->select($this->table[0], [
            "[>]".$this->table[1] => [$this->table[0].".accounts_id" => "accounts_id"],
        ],'*');
    }

    public function GetAllProjectsByAccountsId($accounts_id) {
        return $this->db->select($this->table[0], [
            "[>]".$this->table[1] => ["accounts_id" => "accounts_id"],
        ],'*',[$this->table[1].'.accounts_id' => $accounts_id]);
    }

    public function GetAllProjectsByProjectsId($projects_id) {
        return $this->db->select($this->table[0], [
            "[>]".$this->table[1] => ["accounts_id" => "accounts_id"],
        ],'*',[$this->table[0].'.projects_id' => $projects_id]);
    }

    public function GetProjectTimelineByProjectsId($projects_id) {
        return $this->db->select($this->table[0], [
            "[>]".$this->table[1] => ["accounts_id" => "accounts_id"],
            "[>]".$this->table[2] => ["projects_id" => "projects_id"],
        ],'*',[$this->table[2].'.projects_id' => $projects_id]);
    }

}