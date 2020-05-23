<?php

spl_autoload_register(function($class) {
    include "../{$class}.php";
});

$db = new Database([
    "dsn" => "mysql:host=localhost; dbname=crud;",
    "user" => "root",
    "passwd" => "", 
]);

if(isset($_POST['msg']))
    if($_POST['msg'] == "get all info") {
        $dataset = $db->raw_query("SELECT `id`, `fullname`, `age`, `address`, `birthday`, `student_number`, `campus`, `username` FROM `student_information`;", [])->fetchAll();

    } if($_POST['msg'] == "select a record") {
        $dataset = $db->raw_query("SELECT * FROM `student_information` WHERE id=:id;", [
            ':id' => $_POST['record_id'],
        ])->fetch();
        
    }

    foreach($db->raw_query("SELECT `username` FROM student_information;", [])->fetchAll() as $student) 
        $usernames[] = $student['username'];

    if(is_array($dataset)) 
        echo json_encode([
            'data' => base64_encode(base64_encode(json_encode($dataset))),
            'usernames' => base64_encode(base64_encode(json_encode($usernames))),
        ]); 

