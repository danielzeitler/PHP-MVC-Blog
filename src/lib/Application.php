<?php

class Application {

    function __construct() {

       // echo "Hallo, ich bin die Application...";

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim( $url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) $url[0] = 'home';

        $url[0] = ucfirst($url[0]);

        //------------------------------------------------------
        // Autoload controller
        $file = 'controller/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            echo "(404) No \"$url[0]\" controller found <br />";
        }

        $controller = new $url[0];

        //------------------------------------------------------
        // Load a Model (if exists)
        $controller->loadModel();


        //------------------------------------------------------
        // Calling Controller-Methods
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                echo "Echo calling method with param $url[1]($url[2])";
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    echo "Error calling method $url[1]() <br />";
                }
            }
        }











        //---------------------------------------------------------
        // Rendering
        $controller->index();


    }

}