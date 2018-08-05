<?php


class Debug {

    static public $data = array();

    static public function add($value, $key = null) {

        if ($key)
            Debug::$data[$key] = $value;
        else
            Debug::$data[] = $value;

    }

}