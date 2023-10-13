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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Dr/Sayed nassef</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">
          <form action="#" method="post">
          <div>
    <input type="text" name="username" class="form-control" placeholder="Enter your name"><br>
    <span style="color: red;" > <?php echo $nameerror ?></span>
    </div>
    <div>
<input type="password" name="password" class="form-control" placeholder="Enter your password"><br>
<span style="color: red;" > <?php echo $passworderror ?></span>
</div>
            <input type="submit" value="login" class="btn btn-success" /><br />
            <p class="nothave">OR</p>
            <a id="siup" class="link link-success" href="signup.php">signup</a>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
  ></script>
</html>