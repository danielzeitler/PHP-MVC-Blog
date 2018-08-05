<?php

class Model {

    protected $db;

    function __construct() {

        $this->db = new Database();

    }

}