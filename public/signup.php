<?php
$nameerror="";
$emailerror="";
$passworderror="";
$phoneerror="";
$birthdateerror=""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $birthdate = $_POST["date"];
    if(empty($username)){
        $nameerror="name is required";
    }else{
        $username=trim($username);
        $username=htmlspecialchars($username);
        if(!preg_match("/^[a-zA-Z]+$/",$username)){
            $nameerror="Name shold contain only char and space";
        }
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)||!filter_var($email, FILTER_SANITIZE_EMAIL)){
        $emailerror="enter avalid email";
    }
    if (empty($password)||strlen($password)<8) {
        $passworderror = "Password must be at least 8 characters long.";
    }
    if(empty($phone) || !is_numeric($phone)){
        $phoneerror="enter a phone number to contact you";
    }
    if (empty($birthdate)) {
        $birthdateerror = "Birthdate is required.";
    }

}
?>