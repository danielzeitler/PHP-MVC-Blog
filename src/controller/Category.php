<?php
    class Category extends Controller {
        public function addCategory() {
            $getCategory = $_POST['category'];

            $this->model->insertCategory($getCategory);
        }

        public function index() {
            $this->view->render('category/index');
        }

        public function getCategories() {
            $sql = "SELECT * FROM category WHERE 1";
            $obj = $this->db->prepare($sql);
    
            $obj->execute();
    
            if($obj->rowCount() > 0) {
                $data = $obj->fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
    
            return false;
        }
    }