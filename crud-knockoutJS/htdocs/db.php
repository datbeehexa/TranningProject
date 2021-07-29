<?php
	// Include config.php file
	include_once 'config.php';

	// Create a class Users
	class Database extends Config {
	  // Fetch all or a single user from database
	  public function fetch($id = 0) {
	    $sql = 'SELECT * FROM categories';
	    if ($id != 0) {
	      $sql .= ' WHERE id = :id';
	    }
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id' => $id]);
	    $rows = $stmt->fetchAll();
	    return $rows;
	  }

	  // Insert an user in the database
	  public function insert($category_name, $description) {
	    $sql = 'INSERT INTO categories (category_name, description) VALUES (:category_name, :description)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['category_name' => $category_name, 'description' => $description]);
	    return true;
	  }

	  // Update an user in the database
	  public function update($category_name, $description, $id) {
	    $sql = 'UPDATE categories SET category_name = :category_name, description = :description WHERE id = :id';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['category_name' => $category_name, 'description' => $description, 'id' => $id]);
	    return true;
	  }

	  // Delete an user from database
	  public function delete($id) {
	    $sql = 'DELETE FROM categories WHERE id = :id';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id' => $id]);
	    return true;
	  }
	}

?>