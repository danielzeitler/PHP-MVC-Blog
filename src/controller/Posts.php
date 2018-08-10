<?php

class Posts extends Controller {
    public function doAdd() {
        $post = $_POST;
        $userId = Session::get('user')['id'];
        $post_header = trim($post['header']);
        $post_content = trim($post['content']);
        $post_file = $_FILES['post_file'];

        // $data = $this->model->getPosts();
        
        // $this->view->post = $data;

        // if(empty($user_header) || empty($user_content)) {
        //     $this->view->post_err = 'Please fill out the complete form';
        //     return $this->add();
        // }

        $uploadedFile = File::uploadImg($post_file);
        $this->model->addPost($userId, $post_header, $post_content, $uploadedFile);

        Message::add('Perfect! New post has been added to your blog');

        $this->add();
        
        // header('Location: ' . URL . 'posts');
    }

    public function show($id) {
        $data = $this->model->getPostById($id);

        $this->view->data = $data;

        $this->view->render('posts/show');
    }

    public function doEdit($id) {        
        
        $post = $_POST;
        $post['id'] = $id;
        $post['header'] = trim($post['header']);
        $post['content'] = trim($post['content']);
        
        if(empty($post['header']) || empty($post['content'])) {
            $this->view->post_err = 'Please fill out the complete form';
            return $this->edit();
        }

        $this->view->post = $post;
        $this->model->updatePost($post);
        Message::add('Post updated');
        header('Location: ' . URL . 'posts');


    }

    public function delete($id) {
        $post = $this->model->getPostById($id);

     
            $this->model->deletePost($id);
     
            Message::add('Post deleted', 'danger');
            header('Location: ' . URL . 'posts');
    }

    public function edit($id) {

        $post = $this->model->getPostById($id);

        $this->view->post = $post;

        $this->view->render('posts/edit');
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