<?php

class Message {

    public static function add($text, $class = 'success', $duration = 0) {
        $allMessages = self::getAll();

        $now = time();

        array_push($allMessages, array('text' => $text, 'class' => $class, 'time' => $now, 'duration' => $duration));

        Session::set('allMessages', $allMessages);
    }

    public static function get() {
        // todo: 
    }

    public static function getAll() {
        return (Session::get('allMessages')) ? Session::get('allMessages')  : array();
    }

    public static function remove($index) {
        $allMessages = self::getAll();
        
        unset($allMessages[$index]);

        Session::set('allMessages', $allMessages);
    }
    
    // static public function flash($name = '', $message = '', $class = 'alert alert-success'){
    //     if(!empty($name)){
    //       if(!empty($message) && empty($_SESSION[$name])){
    //         if(!empty($_SESSION[$name])){
    //           unset($_SESSION[$name]);
    //         }
    
    //         if(!empty($_SESSION[$name. '_class'])){
    //           unset($_SESSION[$name. '_class']);
    //         }
    
    //         $_SESSION[$name] = $message;
    //         $_SESSION[$name. '_class'] = $class;
    //       } elseif(empty($message) && !empty($_SESSION[$name])){
    //         $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
    //         echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
    //         unset($_SESSION[$name]);
    //         unset($_SESSION[$name. '_class']);
    //       }
    //     }
    //   }
}