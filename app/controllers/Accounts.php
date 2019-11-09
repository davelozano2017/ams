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

    public function createPersonnel() {
        if($this->token == post('token')) {
            $data = array(
                'id_number'     => post('id_number'),
                'name'          => post('name'),
                'contact'       => post('contact'),
                'email'         => post('email'),
                'password'      => hashing('12345'),
                'is_status'     => 1,
                'role'          => 1
            );
            $this->model->use('AccountsModel')->createPersonnel($data);
        } else {
            $this->load->view('errors');
        }
    }

    public function updatePersonnel() {
        if($this->token == post('token')) {
            $data = array(
                'accounts_id' => decode(post('accounts_id')),
                'id_number'   => post('id_number'), 
                'name'        => post('name'),
                'contact'     => post('contact'),
                'email'       => post('email'),
                'is_status'   => post('status')
            );
            $this->model->use('AccountsModel')->updatePersonnel($data);
        } 
    }

    public function updateProfile() {
        if($this->token == post('token')) {
            $accounts_id      = decode(post('accounts_id'));
            $password         = post('password');
            $confirm_password = post('confirm_password');
            if($confirm_password != $password || $password != $confirm_password) {
                redirect('admin/profile','Password mismatched.');
            } else {
                if(empty($password)) {
                    $data = array(
                        'name'        => post('name'),
                        'contact'     => post('contact'),
                        'email'       => post('email'),
                        'accounts_id' => $accounts_id
                    );
                } else {
                    $data = array(
                        'name'        => post('name'),
                        'contact'     => post('contact'),
                        'email'       => post('email'),
                        'password'    => hashing($password),
                        'accounts_id' => $accounts_id
                    );
                }
                $this->model->use('AccountsModel')->updateProfile($data);
            }

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

}