<?php
    class Contact extends Controller {
    
        public function index() {
            $this->view->render('contact/index');
        }
    }