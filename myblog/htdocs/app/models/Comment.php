<?php
class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCommnet()
    {
        $this->db->query('SELECT comments.*, posts.title as postName FROM comments
         INNER JOIN posts ON comments.post_id = posts.id WHERE posts.id = :id');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addComment($data){
        $this->db->query('INSERT INTO comments (comment, user_id, post_id) VALUES (:comment, user_id, post_id)');
        $this->db->bind(':comment',$data['comment']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':post_id',$data['post_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
