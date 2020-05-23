<?php
spl_autoload_register(function($class) {
    include "../{$class}.php";
});

if(isset($_POST['data'])) {
    if($_POST['data']['msg'] == "delete record") {
        $db = new Database([
            "dsn" => "mysql:host=localhost; dbname=crud;",
            "user" => "root",
            "passwd" => "", 
        ]);
        
        $status = $db->raw_query("DELETE FROM `student_information` WHERE id=:id", [
            ':id' => $_POST['data']['record_id'],
        ]);
        
        if($status) 
            echo json_encode(['msg' => 'record deleted successfully']);
    }
}
    
