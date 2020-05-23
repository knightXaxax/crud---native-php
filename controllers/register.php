<?php
session_start();
spl_autoload_register(function($class) {
    include "../{$class}.php";
});


if(isset($_POST['register'])) {
    $db = new Database([
        "dsn" => "mysql:host=localhost; dbname=crud;",
        "user" => "root",
        "passwd" => "", 
    ]);

    foreach($db->raw_query("SELECT `username` FROM student_information;", [])->fetchAll() as $student) 
        $usernames[] = $student['username'];

    $dataset = $_POST;

    $_SESSION['data'] = $_POST;

    if ($dataset['age'] <= 3) {
        header("Location: ../registration_page.php?error_age_range_down=true");
    } elseif ($dataset['age'] > 80) {
        header("Location: ../registration_page.php?error_age_range_up=true");
    } elseif (in_array($dataset['username'], $usernames)) {
        header("Location: ../registration_page.php?error_email_exists=true");
    } elseif (strlen($dataset['password']) < 8) {
        header("Location: ../registration_page.php?error_pass_len=true");
    } elseif ($dataset['password'] !== $dataset['confirm_password']) {
        header("Location: ../registration_page.php?error_pass_not_match=true");
    } else {
        session_destroy();
        $query = "INSERT INTO student_information VALUES (0, :fullname, :age, DATE(:bday), :add, :stud_number, :campus, :user, :passwd);";
        $status = $db->raw_query($query, [
            ':fullname' => $dataset['fullname'],
            ':age' => $dataset['age'],
            ':bday' => $dataset['birthday'],
            ':add' => $dataset['address'],
            ':stud_number' => $dataset['student_number'],
            ':campus' => $dataset['campus'],
            ':user' => $dataset['username'],
            ':passwd' => password_hash($dataset['password'], PASSWORD_DEFAULT),
        ]);
        header("Location: ../index.php");
    }
    sleep(1);
}