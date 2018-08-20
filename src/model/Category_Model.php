<?php
    class Category_Model extends Model {
        public function insertCategory($title) {
            $sql = "INSERT INTO category(category_name) VALUES(:category_name)";
            $obj = $this->db->prepare($sql);
            $obj->execute(array(
                ":category_name" => $title
            ));
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