<?php

class Holiday_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getHolidays() {

        $sql = 'SELECT * FROM holiday WHERE 1';

        $obj = $this->db->prepare($sql);

        $obj->execute();

        if ($obj->rowCount() > 0) {
            $data = $obj->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        return false;

    }



}