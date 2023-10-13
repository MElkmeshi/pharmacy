<?php
$nameerror="";
$passworderror="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(empty($username)){
        $nameerror="name is required";
    }else{
        $username=trim($username);
        $username=htmlspecialchars($username);
        if(!preg_match("/^[a-zA-Z]+$/",$username)){
            $nameerror="Name shold contain only char and space";
        }
    }
    if (empty($password)||strlen($password)<8) {
        $passworderror = "Password must be at least 8 characters long.";
    }
}
?>