<?php

class Posts_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function addPost($data) {
        $sql = 'INSERT INTO posts(header, content) VALUES (:header, :content)';
        
        $obj = $this->db->prepare($sql);
        
        $result = $obj->execute(array(
            ":header" => $data['header'],
            ":content" => $data['content']
        ));
        
        return $result;
    }

    public function getPosts() {

        $sql = 'SELECT * FROM posts WHERE 1';

        $obj = $this->db->prepare($sql);

        $obj->execute();

        if ($obj->rowCount() > 0) {
            $data = $obj->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }

        return false;
    }



}