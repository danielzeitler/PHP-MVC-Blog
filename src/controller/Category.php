<?php

class Category extends Controller {

    # *************************************************************
    # Functions for individual category pages:
    # Digital Minimalism, Productivity, Mind, Books and Podcasts
    # *************************************************************

    public function showCategory($id) {
        Session::set('activeCategory', $id);
        $categories = Session::get('categories');
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $result = $this->model->getPostsByCategoryId($id, $search);
        $this->view->posts = $result;

        $this->view->render('category/showAll');
    }


    # **********************
    # Comment functionality
    # **********************

    public function insertComment() {
        $comment = $_POST;
        # Split URL to get Id parameter
        $getId = explode("/", $_GET['url']);
        $postId = $getId[2];
        # User input into comment field
        $user_comment = $comment['user_comment'];

        $this->model->userComment($user_comment, $postId);

        # Redirect to same page after comment has been submitted
        header("Location: " . URL . "category/show/$postId");
    }

    # ************************
    # Show Post Functionality
    # ************************

    public function show($id) {
        # Get all Data needed for post
        $data = $this->model->getPostById($id);
        $comments = $this->model->getAllCommentsById($id);

        # Passing it into the view
        $this->view->data = $data;
        $this->view->comments = $comments;

        $this->view->render('category/show');
    }

    # ************************
    # Standard Index Render
    # ************************

    public function index() {
        $this->view->render('category/digitalminimalism');
    }

}