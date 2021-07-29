<?php 
 header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
   
// class ReadCate extends Controller{
//     public function __construct()
//     {
//         $this->cateModel = new Category();
//     }
//     $database = new Database();
//     $db = $database->getConnection();

//     $items = new Category($db);

//     $stmt = $items->getCate();
//     $itemCount = $stmt->rowCount();


//     echo json_encode($itemCount);

//     if($itemCount > 0){
        
//         $cateArr = array();
//         $cateArr["body"] = array();
//         $cateArr["itemCount"] = $itemCount;

//         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//             extract($row);
//             $e = array(
//                 "id" => $id,
//                 "category_name" => $category_name,
//                 "description" => $description,
//             );

//             array_push($cateArr["body"], $e);
//         }
//         echo json_encode($cateArr);
//     }

//     else{
//         http_response_code(404);
//         echo json_encode(
//             array("message" => "No record found.")
//         );
//     }
// }
    
?>