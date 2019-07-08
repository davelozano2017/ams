<?php

class Accounts extends Controller { 

	public function __construct(){
        parent::__construct();
        $this->token = $_SESSION['token'];
	}

	public function secureLogin() {
       if($this->token == post('token')) {
            $data = array('email' => post('email'), 'password' => post('password'));
            $this->model->use('AccountsModel')->secureLogin($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function createLibrarian() {
        if($this->token == post('token')) {
            $accountCredentials = array(
                'username'   => post('username'),
                'password'   => hashing('password'),
                'role'       => 0
            );
            $result = $this->model->use('AccountModel')->createCredentials($accountCredentials);
            if($result) {
                $accountDetails = array(
                    'accounts_id' => $result,
                    'photos'      => 'default.png',
                    'surname'     => post('surname'), 
                    'firstname'   => post('firstname'),
                    'middlename'  => post('middlename'),
                    'email'       => post('email'),
                    'contact'     => post('contact'),
                );
                $this->model->use('AccountModel')->createLibrarian($accountDetails);
            } 
        } else {
            $this->load->view('errors');
        }
    }

    public function updateLibrarian() {
        if($this->token == post('token')) {
            $data = array(
                'accounts_id' => decode(post('accounts_id')),
                'surname'     => post('surname'), 
                'firstname'   => post('firstname'),
                'middlename'  => post('middlename'),
                'email'       => post('email'),
                'contact'     => post('contact')
            );
            $this->model->use('AccountModel')->updateLibrarian($data);
        } 
    }

    public function updateProfile() {
        if($this->token == post('token')) {
            $accounts_id = decode(post('accounts_id'));
            $password = post('password');
            $cp = post('cp');
            $table = $_SESSION['role'] == 0 ? 'librarian' : 'students';
            if(empty($password)) {
                $credentials = array(
                    'username'    => post('username'),
                    'accounts_id' => $accounts_id
                );
            } else {
                if($password != $cp || $cp != $password) {
                    redirect('students/profile','Password mismatched.');
                } else {
                    $credentials = array(
                        'username'    => post('username'),
                        'password'    => hashing($password),
                        'accounts_id' => $accounts_id
                    );
                }
                
            }
            $this->model->use('AccountModel')->updateCredentials($credentials);

            if(!empty($_FILES['files']['name'])) {
                $data = array(
                    'accounts_id' => $accounts_id,
                    'photos'      => $_FILES['files']['name'],
                    'surname'     => post('surname'), 
                    'firstname'   => post('firstname'),
                    'middlename'  => post('middlename'),
                    'email'       => post('email'),
                    'contact'     => post('contact')
                );
            } else {
                $data = array(
                    'accounts_id' => $accounts_id,
                    'surname'     => post('surname'), 
                    'firstname'   => post('firstname'),
                    'middlename'  => post('middlename'),
                    'email'       => post('email'),
                    'contact'     => post('contact')
                );
            }
            $this->model->use('AccountModel')->updateProfile($data,$table);
        }    
    }

    public function createStudent() {
        if($this->token == post('token')) {
            $accountCredentials = array(
                'username'   => post('username'),
                'password'   => hashing('password'),
                'role'       => 1
            );
            $result = $this->model->use('AccountModel')->createCredentials($accountCredentials);
            if($result) {
                $accountDetails = array(
                    'accounts_id' => $result,
                    'photos'      => 'default.png',
                    'surname'     => post('surname'), 
                    'firstname'   => post('firstname'),
                    'middlename'  => post('middlename'),
                    'age'         => post('age'),
                    'gender'      => post('gender'),
                    'email'       => post('email'),
                    'contact'     => post('contact'),
                    'course'      => post('course'),
                    'year'        => post('year'),
                    'section'     => post('section')
                );
                $this->model->use('AccountModel')->createStudent($accountDetails);
            } 
        } else {
            $this->load->view('errors');
        }
    }

    public function updateStudent() {
        if($this->token == post('token')) {
            $data = array(
                'accounts_id' => decode(post('accounts_id')),
                'surname'     => post('surname'), 
                'firstname'   => post('firstname'),
                'middlename'  => post('middlename'),
                'age'         => post('age'),
                'gender'      => post('gender'),
                'email'       => post('email'),
                'contact'     => post('contact'),
                'course'      => post('course'),
                'year'        => post('year'),
                'section'     => post('section')
            );
            $this->model->use('AccountModel')->updateStudent($data);
        } 
    }

    public function logout() {
        unset($_SESSION['role'],$_SESSION['accounts_id']);
        redirect('login','Successfully logged out.');
    }

    public function downloadQrCode($username) {
        $file = 'assets/uploads/qrcode/'.$username.'.png';
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    }
}