<?php
class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function getCategory()
    {
        $this->db->query('SELECT * FROM categories');
        $result = $this->db->resultSet();
        return $result;
    }

    public function getCateById($id)
    {
        $this->db->query('SELECT * FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function addCate($data)
    {
        $this->db->query('INSERT INTO categories (category_name, description) VALUES (:category_name, :description)');
        $this->db->bind(':category_name', $data['category_name']);
        $this->db->bind(':description', $data['description']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCate($data)
    {
        $this->db->query('UPDATE categories SET category_name = :category_name, description = :description WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':category_name', $data['category_name']);
        $this->db->bind(':description', $data['description']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCate($id)
    {
        $this->db->query('DELETE FROM categories WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
