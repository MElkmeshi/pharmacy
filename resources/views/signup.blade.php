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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dr/Sayed nassef</title>
    
</head>
 <body class="bg-dark">
<div  class="container mt-5">
    <div class="row justify-content-center" >

<div class="col-md-6 col-md-offset-3" align="center">

<form action="login" method="post">
    @csrf
    <div>
    <input type="text" id="username" minlength="3" maxlength="25" name="username" class="form-control" placeholder="Enter your name" required><br>
    <span style="color: red;" > <?php echo $nameerror ?></span>
    </div>
<div>
<input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required><br>
<span style="color: red;" > <?php echo $emailerror ?></span>
</div>
<div>
<input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required><br>
<span style="color: red;" > <?php echo $passworderror ?></span>
</div>
<div>
<input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required><br>
<span style="color: red;" > <?php echo $phoneerror ?></span>
</div>
<div>
    <label style="color: aliceblue;" for="date">Enter your birth of date</label>
    <input type="date" id="date" name="date" class="form-control" required><br>
    <span style="color: red;" > <?php echo $birthdateerror ?></span>
</div>
<input type="submit" value="signup" class="btn btn-success"><br>
<p class="text-light">or have an account please</p><a href="{{route("loginform")}}"><button type="button" class="btn btn-success">login</button></a>

</form>

</div>
    </div>
</div>
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="reg.js"></script>
</html>
