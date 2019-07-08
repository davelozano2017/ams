<?php 

class AccountsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function newAccount($data) {
        if($this->db->has('accounts_tbl',['username' => $data['username']])) {
            redirect('login','Username already exist.');
        } else {
            $this->db->insert('accounts_tbl',$data);
            redirect('login','New account has been added.');
        }
    }

    public function createCredentials($accountCredentials) {
        if($this->db->has('accounts',['username' => $accountCredentials['username']])) {
            redirect('librarian/librarian/view','Username already exist.');
        } else {
            $filename = 'assets/uploads/qrcode/'.$accountCredentials['username'].'.png';
            QRcode::png($accountCredentials['username'], $filename, 'H', min(max((int)10, 1), 10), 2);   
            $result = $this->db->insert('accounts',$accountCredentials);
            return $this->db->id();
        }
    }

    public function updateCredentials($data) {
        $redirect =  $_SESSION['role'] == 0 ? 'librarian/profile' : 'students/profile';
        if(!isset($data['password'])) {
            $query = $this->db->update('accounts',[
                'username' => $data['username']
            ], ['accounts_id' => $data['accounts_id'] ]);
        } else {
            $query = $this->db->update('accounts',[
                'password' => $data['password'], 
                'username' => $data['username']
            ], ['accounts_id' => $data['accounts_id'] ]);
        }
        $filename = 'assets/uploads/qrcode/'.$data['username'].'.png';
        QRcode::png($data['username'], $filename, 'H', min(max((int)10, 1), 10), 2);   
        return $query ? redirect($redirect,'Credentials has been changed.') : redirect($redirect,'Something went wrong.');
    }    
       
    public function createLibrarian($accountDetails) {
        $this->db->insert('librarian',$accountDetails);
        redirect('librarian/librarian/view','New librarian has been added.');
    }


    public function updateLibrarian($data,$account) {
        $this->db->update('librarian', $data, [ 'accounts_id' => $data['accounts_id'] ]);
        redirect('librarian/librarian/update/'.encode($data['accounts_id']),'Librarian details has been updated. <a style="color:#000;font-weight:bolder" href="'.site_url('librarian/librarian/view').'">Back</a>');
    }

    public function updateProfile($data,$table) {
        $this->db->update($table, $data, [ 'accounts_id' => $data['accounts_id'] ]);
        move_uploaded_file($_FILES['files']['tmp_name'],'assets/uploads/profile/'.$_FILES['files']['name']);
    }

    public function createStudent($accountDetails) {
        $this->db->insert('students',$accountDetails);
        
        redirect('librarian/student/view','New student has been added.');
    }

    public function updateStudent($data) {
        $this->db->update('students', $data, [ 'accounts_id' => $data['accounts_id'] ]);
        redirect('librarian/student/update/'.encode($data['accounts_id']),'Student details has been updated. <a style="color:#000;font-weight:bolder" href="'.site_url('librarian/student/view').'">Back</a>');
    }

    public function countUsers($role) {
        return $this->db->count('accounts','*',['role' => $role]);
    }

    public function GetAllPersonnels() {
        return $this->db->select('accounts','*');
    }

    public function GetUserByAccountsId($accounts_id) {
        $query = $this->db->select('accounts','*',['accounts_id' => $accounts_id]);
        return $query;
    }

    public function secureLogin($data) {
        if($this->db->has('accounts',['email' => $data['email']])) {
            $check = $this->db->select('accounts','*',['email' => $data['email']]);
            $hash = $check[0]['password'];
            if(verify($data['password'],$hash)) {
                $_SESSION['accounts_id'] = $check[0]['accounts_id'];
                $_SESSION['role'] = $check[0]['role'];
                redirect('admin/profile');
            } else {
                redirect('login','Invalid username or password');
            }
        } else {
            redirect('login','Invalid username or password');
            
        }
    }

    public function update_user_information($data) {
        $query = $this->db->update('accounts_tbl',[
            'customer_name' => $data['customer_name'], 'contact' => $data['contact'], 'email' => $data['email']
        ],[
            'account_id' => $data['account_id']
        ]);
        $page =  $_SESSION['role'] == 0 ? 'admin/profile' : 'profile';
        return $query ? redirect($page,'Information has been updated.') : redirect($page,'Something went wrong.');
    } 

}


