<?php


class Home extends Controller {


    # render all posts on the start page
    public function index() {
        $data = $this->model->getPosts();

        $this->view->post = $data;
        $this->view->render('home/index');
    }

}