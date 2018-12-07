<?php

class Auth extends Controller {

    public function doRegister() {
    
        //Get credentials from POST
        $user = $_POST;

        // Get user by Mail
        $userEntry = $this->model->getUserFromEmail($user['email']);

        // Save all emails
        $error = array();

        //Validate Email
        if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email_err'] = 'Not a valid mail';
        } 

        // Check if Mail already exists
        if ($userEntry) {
            $error['email_err'] = 'E-Mail already exists';
        } 

        // Validate Name
        if(empty($user['firstname'])){
            $error['name_err'] = 'Please enter first name';
        } 

        // Validate Name
        if(empty($user['lastname'])){
            $error['lastname_err'] = 'Please enter last name';
        } 

        // Validate Password
        if(empty($user['password'])){
            $error['password_err'] = 'Please enter password';
        } elseif(strlen($user['password']) < 6){
            $error['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($user['confirm_password'])){
            $error['confirm_password_err'] = 'Please confirm password';
        } else {
            if($user['password'] != $user['confirm_password']){
                $error['confirm_password_err'] = 'Passwords do not match';
            }
        }
        
        // Check for error - if no error register
        if($error) {
            $this->view->error = $error;
            $this->view->formData = $user;

            $this->view->render('auth/register');
        } else {
            Message::add('You are registered and can now log in');
            $this->model->registerUser($user);

            // Change location (goto login)
            header('Location: ' . URL . 'auth/login');
        }
        
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
                Session::set('user_image', $userEntry['image']);
                
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

    public function logout() {
        // Remove userEntry from Session
        Session::remove('user');
        session_destroy();

        // Change location (goto home)
        header('Location: ' . URL . 'home');
    }
    
    # *****************
    # Render functions
    # *****************

    public function login() {
        $this->view->render('auth/login');
    }

    public function register() {
        //Render register view
        $this->view->render('auth/register');
    }
    
    public function index() {
        $this->view->render('auth/register');
    }

}