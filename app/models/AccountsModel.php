<?php 

class AccountsModel extends Model {

    protected $table = 'accounts';

    public function __construct() {
        parent:: __construct();
    }
       
    public function createPersonnel($data) {
        $this->db->insert($this->table,$data);
        redirect('personnel','New Personnel has been added.');
    }


    public function updatePersonnel($data) {
        $this->db->update($this->table, $data, [ 'accounts_id' => $data['accounts_id'] ]);
        redirect('personnel/view/'.encode($data['accounts_id']),'Personnel\'s details has been updated. <a style="color:#000;font-weight:bolder" href="'.site_url('personnel').'">Back</a>');
    }

    public function updateProfile($data) {
       $this->db->update($this->table, $data, [ 'accounts_id' => $data['accounts_id'] ]);
       redirect('admin/profile/','Details has been updated');
    }

    public function countAllUsers() {
        return $this->db->count($this->table,'*',['role' => 1]);
    }

    public function GetAllPersonnels() {
        return $this->db->select($this->table,'*',['role[!]'=>0]);
    }

    public function GetUserByAccountsId($accounts_id) {
        $query = $this->db->select($this->table,'*',['accounts_id' => $accounts_id]);
        return $query;
    }

    public function secureLogin($data) {
        if($this->db->has($this->table,['email' => $data['email']])) {
            $check = $this->db->select('accounts','*',['email' => $data['email']]);
            $hash  = $check[0]['password'];
            if(verify($data['password'],$hash)) {
                $_SESSION['accounts_id'] = $check[0]['accounts_id'];
                $_SESSION['role']        = $check[0]['role'];
                redirect('admin/profile');
            } else {
                redirect('login','Invalid username or password');
            }
        } else {
            redirect('login','Invalid username or password');
            
        }
    }

}


