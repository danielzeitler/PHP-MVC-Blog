<?php

class Holiday extends Controller {

    public function getHolidays() {

        $data = $this->model->getHolidays();

        $this->view->holidays = $data;

    }

    public function index() {

        $this->getHolidays();

        $this->view->render('holiday/index');
    }

}