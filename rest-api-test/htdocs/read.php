<?php
// SET HEADER
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

// INCLUDING DATABASE AND MAKING OBJECT
require 'database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

// CHECK GET ID PARAMETER OR NOT
if(isset($_GET['id']))
{
    //IF HAS ID PARAMETER
    $cate_id = filter_var($_GET['id'], FILTER_VALIDATE_INT,[
        'options' => [
            'default' => 'all_categories',
            'min_range' => 1
        ]
    ]);
}
else{
    $cate_id = 'all_categories';
}

// MAKE SQL QUERY
// IF GET POSTS ID, THEN SHOW POSTS BY ID OTHERWISE SHOW ALL POSTS
$sql = is_numeric($cate_id) ? "SELECT * FROM `categories` WHERE id='$cate_id'" : "SELECT * FROM `categories`"; 

$stmt = $conn->prepare($sql);

$stmt->execute();

//CHECK WHETHER THERE IS ANY POST IN OUR DATABASE
if($stmt->rowCount() > 0){
    // CREATE POSTS ARRAY
    $cates_array = [];
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        $cate_data = [
            'id' => $row['id'],
            'category_name' => $row['category_name'],
            'description' => html_entity_decode($row['description']),
        ];
        // PUSH POST DATA IN OUR $posts_array ARRAY
        array_push($cates_array, $cate_data);
    }
    //SHOW POST/POSTS IN JSON FORMAT
    echo json_encode($cates_array);
 

}
else{
    //IF THER IS NO POST IN OUR DATABASE
    echo json_encode(['message'=>'No post found']);
}
?>