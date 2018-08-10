<?php

class Posts_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function addPost($userId, $post_header, $post_content, $uploadedFile) {


        // 1. Step: insert File ----------------------------------------------------------------------------------------------
        $sql = 'INSERT INTO file (name, image, thumb, size) VALUES (:name, :image, :thumb, :size)';

        $obj = $this->db->prepare($sql);

        Debug::add($uploadedFile, '$uploadedFile');

        $result1 = $obj->execute(array(
            ':name' => $uploadedFile['name'],
            ':image' => $uploadedFile['image'],
            ':thumb' => $uploadedFile['thumb'],
            ':size' => $uploadedFile['size'],
        ));

        // Remember the id of the new file entry
        $file_id = $this->db->lastInsertId();


        // 2. Step: insert Post ----------------------------------------------------------------------------------------------

        $sql = 'INSERT INTO posts(header, content, user_id, file_id) VALUES (:header, :content, :user_id, :file_id)';
        
        $obj = $this->db->prepare($sql);
        
        $result2 = $obj->execute(array(
            ":header" => $post_header,
            ":content" => $post_content,
            ":user_id" => $userId,
            ":file_id" => $file_id
        ));
        

        return $result1 && $result2;
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