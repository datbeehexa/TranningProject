<?php
// Include CORS headers


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json');

// Include action.php file
include_once 'db.php';
// Create object of categories class
$category = new Database();

// create a api variable to get HTTP method dynamically
$api = $_SERVER['REQUEST_METHOD'];

// get id from url
$id = intval($_GET['id'] ?? '');

// Get all or a single category from database
if ($api == 'GET') {
	if ($id != 0) {
		$data = $category->fetch($id);
	} else {
		$data = $category->fetch();
	}
	echo json_encode($data);
}

// Add a new category into database
if ($api == 'POST') {
	$category_name = $category->test_input($_POST['category_name']);
	$description = $category->test_input($_POST['description']);

	if ($category->insert($category_name, $description)) {
		echo $category->message('Category added successfully!', false);
	} else {
		echo $category->message('Failed to add an category!', true);
	}
}

// Update an category in database
if ($api == 'PUT') {
	$post_input = file_get_contents('php://input');
	$data = json_decode($post_input);
	$category_name = $data->category_name;
	$description = $data->description;
	if ($id) {
		if ($category->update($category_name, $description, $id)) {
			echo $category->message('Category updated successfully!', false);
		} else {
			echo $category->message('Failed to update an category!', true);
		}
	} else {
		echo $category->message('category not found!', true);
	}
}

// Delete an category from database
if ($api == 'DELETE') {
	if ($id != null) {
		if ($category->delete($id)) {
			echo $category->message('Category deleted successfully!', false);
		} else {
			echo $category->message('Failed to delete an category!', true);
		}
	} else {
		echo $category->message('Category not found!', true);
	}
}
