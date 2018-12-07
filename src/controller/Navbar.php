<?php

class Navbar extends Controller {
    public function initCategories() {
        $categories = $this->model->getAllCategories();
        $newCategories = array();
        
        foreach($categories as $category) {
            $newCategories[$category['id']] = $category['category_name'];
        }

        Session::set('categories', $newCategories);
        Session::set('activeCategory', 'null');
    }
    
    public function index () {
        // Nothing to do here
    }
}