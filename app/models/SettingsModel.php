<?php 

class SettingsModel extends model {

    protected $table = ['settings'];

    public function __construct() {
        parent::__construct();
    }

    public function GetAllSettings() {
        return $this->db->select($this->table[0],'*');
    }

    public function updateSettings($data) {
        $this->db->update($this->table[0], $data, [ 'settings_id' => $data['settings_id'] ]);
        redirect('settings','Settings has been updated.');
    }
}