<?php

require "Database.php";
require "Validator.php";

$config = require("config.php");
$db = new Database($config);

$validator = new Validator();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $date_of_birth = $_POST['date_of_birth'];
    $image = $_POST['image'];

    $errors = [];

    if (empty($name) || strlen($name) < 2 || !ctype_alpha($name)) {
        $errors['name'] = 'Name must be at least 2 characters long and contain only letters.';
    }
    if (empty($lastname) || strlen($lastname) < 2 || !ctype_alpha($lastname)) {
        $errors['lastname'] = 'Last name must be at least 2 characters long and contain only letters.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'A valid email is required.';
    }
    if (empty($number) || !ctype_digit($number) || strlen($number) != 8) {
        $errors['number'] = 'Number must be exactly 8 digits.';
    }
    if (empty($password) || strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters long.';
    }
    if (empty($gender) || !in_array($gender, ['male', 'female'])) {
        $errors['gender'] = 'Gender must be either "male" or "female".';
    }
    if (empty($age) || !ctype_digit($age)) {
        $errors['age'] = 'Age must be a valid number.';
    }
    if (empty($date_of_birth) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_of_birth)) {
        $errors['date_of_birth'] = 'Date of birth must be in the format "YYYY-MM-DD".';
    } else {
        $date = new DateTime($date_of_birth);
        if ($date >= new DateTime('today')) {
            $errors['date_of_birth'] = 'Date of birth must be in the past.';
        }
    }
    if (empty($image) || !filter_var($image, FILTER_VALIDATE_URL)) {
        $errors['image'] = 'Image must be a valid URL.';
    }

    if (!empty($errors)) {
     
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertQuery = "INSERT INTO users (first_name, last_name, email, password, number, gender, age, date_of_birth, image) 
                        VALUES (:name, :lastname, :email, :password, :number, :gender, :age, :date_of_birth, :image)";
        $params = [
            ':name' => $name,
            ':lastname' => $lastname,
            ':email' => $email,
            ':password' => $hashedPassword,
            ':number' => $number,
            ':gender' => $gender,   
            ':age' => $age,
            ':date_of_birth' => $date_of_birth,
            ':image' => $image
        ];
        $db->execute($insertQuery, $params);

        header("Location: /");
        exit();
    }
}

require "index.view.php";

