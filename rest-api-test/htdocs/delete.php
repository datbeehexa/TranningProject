<?php
// SET HEADER
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// INCLUDING DATABASE AND MAKING OBJECT
require 'database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();


// GET DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));

$product->id = isset($_GET['id']) ? $_GET['id'] : die();

//CHECKING, IF ID AVAILABLE ON $data
if(isset($data->id)){
    $msg['message'] = '';
    
    $cate_id = $data->id;
    
    //GET POST BY ID FROM DATABASE
    // YOU CAN REMOVE THIS QUERY AND PERFORM ONLY DELETE QUERY
    $check_cate = "SELECT * FROM `categories` WHERE id=:cate_id";
    $check_cate_stmt = $conn->prepare($check_cate);
    $check_cate_stmt->bindValue(':cate_id', $cate_id,PDO::PARAM_INT);
    $check_cate_stmt->execute();
    
    //CHECK WHETHER THERE IS ANY POST IN OUR DATABASE
    if($check_cate_stmt->rowCount() > 0){
        
        //DELETE POST BY ID FROM DATABASE
        $delete_cate = "DELETE FROM `categories` WHERE id=:cate_id";
        $delete_cate_stmt = $conn->prepare($delete_cate);
        $delete_cate_stmt->bindValue(':cate_id', $cate_id,PDO::PARAM_INT);
        
        if($delete_cate_stmt->execute()){
            $msg['message'] = 'Category Deleted Successfully';
        }else{
            $msg['message'] = 'Category Not Deleted';
        }
        
    }else{
        $msg['message'] = 'Invlid ID';
    }
    // ECHO MESSAGE IN JSON FORMAT
    echo  json_encode($msg);
    
}
?>