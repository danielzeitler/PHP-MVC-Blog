<?php

class Posts_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function addPost($data) {
        $sql = 'INSERT INTO posts(header, content, user_id) VALUES (:header, :content, :user_id)';
        
        $obj = $this->db->prepare($sql);
        
        $result = $obj->execute(array(
            ":header" => $data['header'],
            ":content" => $data['content'],
            ":user_id" => $_SESSION['user']['id'],
        ));
        
        return $result;
    }

    public function getPosts() {

        $sql = 'SELECT user.firstname, user.lastname, posts.* FROM user JOIN posts ON user.id = posts.user_id;';

        $obj = $this->db->prepare($sql);

        $obj->execute();

        if ($obj->rowCount() > 0) {
            $data = $obj->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }

        return false;
    }

    public function getPostById($id) {
        $sql = "SELECT user.firstname, user.lastname, posts.* FROM user JOIN posts ON user.id = posts.user_id WHERE posts.id = :id";

        $obj = $this->db->prepare($sql);

        $obj->execute(array(
            ":id" => $id
        ));
        
        if($obj->rowCount() > 0) {
            $data = $obj->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
    
        return false;
    }

    public function updatePost($data) {
        $sql = "UPDATE posts SET header = :header, content = :content WHERE id = :id";

        $obj = $this->db->prepare($sql);

        $obj->execute(array(
            ":id" => $data["id"],
            ":header" => $data["header"],
            ":content" => $data["content"]
        ));
    }

    public function deletePost($id) {
        $sql = "DELETE FROM posts WHERE id = :id";
        $obj = $this->db->prepare($sql);
        $result = $obj->execute(array(
            ":id" => $id
        ));

        return $result;
    }

}