<?php
spl_autoload_register(function($class) {
    include "../{$class}.php";
});

if(isset($_POST['data'])) {
    if($_POST['msg'] == "update record") {
        $db = new Database([
            "dsn" => "mysql:host=localhost; dbname=crud;",
            "user" => "root",
            "passwd" => "", 
        ]);
        
        $query = "UPDATE `student_information` SET `fullname`=:fullname, `age`=:age, `birthday`=DATE(:birthday), `address`=:add, `student_number`=:stud_num, `campus`=:campus, `username`=:username, `password`=:passwd WHERE `id`=:id";

        $status = $db->raw_query($query, [
            ':id' => $_POST['data']['id'],
            ':fullname' => $_POST['data']['fullname'],
            ':age' => $_POST['data']['age'],
            ':birthday' => $_POST['data']['birthday'],
            ':add' => $_POST['data']['address'],
            ':stud_num' => $_POST['data']['student_number'],
            ':campus' => $_POST['data']['campus'],
            ':username' => $_POST['data']['username'],
            ':passwd' => password_hash($_POST['data']['password'], PASSWORD_DEFAULT),
        ]);
        
        if($status) 
            echo json_encode(['msg' => 'record updated successfully']);

        echo json_encode(['msg' => $_POST['data']]);
    }
}
