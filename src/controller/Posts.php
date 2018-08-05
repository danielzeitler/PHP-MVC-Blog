<?php

class Posts extends Controller {
    public function doAdd() {
        $user = $_POST;

        $user['header'] = trim($user['header']);
        $user['content'] = trim($user['content']);

        $data = $this->model->getPosts();
        
        $this->view->post = $data;

        if(empty($user['header']) || empty($user['content'])) {
            $this->view->post_err = 'Please fill out the complete form';
            return $this->add();
        }

        $this->model->addPost($user);

        header('Location: ' . URL . 'posts');

        $this->add();
    }

    public function add() {
        $this->view->render('posts/add');
    }

    public function index() {
        $data = $this->model->getPosts();
        
        $this->view->post = $data;

        $this->view->render('posts/index');
    }

}