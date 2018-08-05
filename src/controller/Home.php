<?php


class Home extends Controller {


    public function testModel() {

        Helper::debug($this->model);

    }


    public function index() {


        $this->view->render('home/index');


    }

}