<?php

class Auth extends Controller {

    public function doRegister() {
        // Check for POST 
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process Form

            //Get credentials from POST
            $user = $_POST;

            // Init data
            $data = [
                'name' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
            ];

            //Validate Email
            if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Not a valid mail';
            } 

            // Check if Mail already exists
            $userEntry = $this->model->getUserFromEmail($user['email']);
            if ($userEntry) {
                $data['email_err'] = 'E-Mail already exists';
            } 

            // Validate Name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter first name';
            } 

            // Validate Name
            if(empty($data['lastname'])){
                $data['lastname_err'] = 'Please enter last name';
            } 

            // Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                Message::add('You are registered and can now log in');
                header('Location: ' . URL . 'auth/login');
                // Validated
                $this->model->registerUser($user);
            }
        } 
        $this->view->data = $data;
        $this->register();
        
    }

    public function logout() {
        // Remove userEntry from Session
        Session::remove('user');
        session_destroy();

        // Change location (goto home)
        header('Location: ' . URL . 'home');
    }

    public function doLogin() {
        
            //Get credentials from POST
            $user = $_POST;

            // Init data
            $user['email'] = trim($user['email']);
            $user['password'] = trim($user['password']);

            // Empty check
            if(empty($user['email']) || empty($user['password'])) {
                $this->view->email_err = 'Filling out the form would be a good start';
                return $this->login();
            } 

            // Adds +1 to the login attempts if login is false
            $this->model->recordLoginAttempt($user['email']);

            // Get User Entry, Check if exists & Verify Password
            $userEntry = $this->model->loginUser($user);

            // Checking user entry + attempted logins
            if($userEntry && $userEntry['login_attempts'] < MAXIMUM_LOGINS) {
                Session::set('user', $userEntry);

                // Resets login attempts to 0 if login successfull
                $resetAttempts = $this->model->resetLoginAttempts($user['email']);
                header('Location: ' . URL . 'home');
                return;
            }

            // Gets the attempted logins from the Database
            $checkLoginAttempts = $this->model->checkLoginAttempts($user['email']);

            // Check if login Attempts exceeded max logins.
            if($checkLoginAttempts >= MAXIMUM_LOGINS) {
                $this->view->email_err = 'Contact Admin. You\'re blocked.';
                return $this->login();
            }

            $this->view->email_err = 'Username or Password wrong.';
            $this->login();
    }
    
    public function login() {
        $this->view->render('auth/login');
    }

    public function register() {
        //Render register view
        $this->view->render('auth/register');
    }
    
    public function index() {

    }

}