<?php
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query('SELECT posts.*, categories.category_name as categoryName FROM posts
        INNER JOIN categories ON posts.category_id = categories.id order by publish_date desc');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (title, short_content, full_content, image, category_id) VALUES(:title, :short_content, :full_content, :image, :category_id)');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':short_content', $data['short_content']);
        $this->db->bind(':full_content', $data['full_content']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':category_id', $data['category_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, short_content = :short_content, full_content = :full_content, image = :image, category_id = :category_id WHERE posts.id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':short_content', $data['short_content']);
        $this->db->bind(':full_content', $data['full_content']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':category_id', $data['category_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id)
    {
        $this->db->query('SELECT posts.*, categories.category_name as categoryName FROM posts INNER JOIN categories ON posts.category_id = categories.id WHERE posts.id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE posts.id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findTop3()
    {
        $this->db->query('SELECT posts.*, categories.category_name as categoryName FROM posts
        INNER JOIN categories ON posts.category_id = categories.id order by publish_date desc LIMIT 3');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findTop8()
    {
        $this->db->query('SELECT posts.*, categories.category_name as categoryName FROM posts
        INNER JOIN categories ON posts.category_id = categories.id order by publish_date desc LIMIT 8');

        $results = $this->db->resultSet();
        return $results;
    }

    public function findTop3Ran()
    {
        $this->db->query('SELECT posts.*, categories.category_name as categoryName FROM posts
        INNER JOIN categories ON posts.category_id = categories.id order by rand() desc LIMIT 3');

        $results = $this->db->resultSet();
        return $results;
    }

    public function findTop5Popular()
    {
        $this->db->query('SELECT posts.*, categories.category_name as categoryName FROM posts
        INNER JOIN categories ON posts.category_id = categories.id order by posts.views desc LIMIT 3');

        $results = $this->db->resultSet();
        return $results;
    }

    public function findByCate($id)
    {
        $this->db->query('SELECT posts.*,categories.category_name as categoryName FROM posts 
        INNER JOIN categories ON posts.category_id = categories.id WHERE categories.id=:id order by publish_date desc');
        $this->db->bind(':id',$id);
        
        $results = $this->db->resultSet();
        return $results;
    }
}
