<?php

class Session {

    static public function start() {
        session_start();
    }

    static public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    static public function get($key) {
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
    }

    static public function remove($key) {
        unset($_SESSION[$key]);
    }

    static public function isLoggedIn() {
        if(isset(Session::get('user')['id'])) {
            return true;
        } else {
            return false;
        }
    }

    static public function isAdmin() {
        if(Session::get('user')['admin']) {
            return true;
        } else {
            return false;
        }
    }
}