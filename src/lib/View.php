<?php

class View {

    //True if rendered
    private $rendered = false;

    public function render($name) {

        //Check if view has already been rendered
        if (!$this->rendered) {

            //Prevent double rendering
            $this->rendered = true;

            require 'partial/header.php';

            require 'partial/navbar.php';

            require 'partial/message.php';

            require 'view/' . $name . '.php';

            if(Session::get('controller_name') !== 'Dashboard') {
                require 'partial/footer.php';
            }
            
            // Check DEBUG_MODE (config)
            if (DEBUG_MODE) {
                //Draw Debug-View
                require 'partial/debug.php';
            }
            
            require 'partial/footer_essentials.php';

        }

    }

}