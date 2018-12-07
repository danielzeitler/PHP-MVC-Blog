<?php
    class Navbar_Model extends Model {

        public function getAllCategories() {
            $sql = "SELECT * FROM category WHERE 1";
            $obj = $this->db->prepare($sql);
            $result = $obj->execute();

            if($result) {
                $data = $obj->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }

            return false;
        }
    }