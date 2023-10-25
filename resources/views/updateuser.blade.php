<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/all.min.css" />
    <link rel="stylesheet" href="/css/homepage.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Form</title>
    <style>
        * {
    font-family: 'Poppins', sans-serif;
}
    body {
    font-family: Arial, sans-serif;
    background-color: #000039;
    display: flex;

    height: 100vh;
    margin: 0;
}
.big{
    padding-bottom: 20px;
    padding-top: 20px;
    justify-content: center;
    padding-left: 450px;
}
.containo {
    background-color: #ffffff;
    box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
    border-radius: 10px;
    padding: 40px;
    width: 400px;
    text-align: center;
}

#userh {
    color: #333;
    margin-bottom: 20px;
}

#updateuserform {
    display: flex;
    flex-direction: column;
}

#userlb {
    color: #555;
    margin-bottom: 5px;
    text-align: left;
}

#inp[type="text"],
#inp[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}

#inp[type="text"]:focus,
#inp[type="password"]:focus {
    border-color: #4caf50;
}

.error-message {
    margin-top: -15px;
    margin-bottom: 20px;
}

#upbtn {
    background-color: #1c1cf0;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 12px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

#upbtn:hover {
    background-color: #0000cd;
}

    </style>
</head>

<body>
@include('layout.header')
    @if (count($errors) > 0)
        <div class="card mt-5">
            <div class="card-body">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p> {{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
<div class="big">
    <div class="containo" >
        <h1 id="userh">Update User</h1>
        <form id="updateuserform" method="POST" action="{{ route('updateuser') }}">
            @csrf <!-- CSRF Token -->

            <!-- Name -->
            <div class="inpfield" >
                <label id="userlb" id="userlb" for="name">Name:</label>
                <input id="inp" type="text" id="name" name="name" value="{{ $userName }}" required>
                <div style="color: red" class="error-message" id="name-error"></div>
            </div>

            <!-- Address -->
            <div class="inpfield" >
                <label id="userlb"  for="address">Address:</label>
                <input id="inp" type="text" id="address" name="address" value="{{ $userAddress }}" required>
                <div style="color: red" class="error-message" id="address-error"></div>
            </div>

            <!-- Age -->
            <div class="inpfield" >
                <label id="userlb"  for="age">Age:</label>
                <input id="inp" type="text" id="age" name="age" value="{{ $userAge }}" required>
                <div style="color: red" class="error-message" id="age-error"></div>
            </div>

            <!-- Password -->
<<<<<<< HEAD
            <div class="inpfield">
                <label id="userlb"  for="password">Password:</label>
                <input id="inp" type="password" id="password" name="password" value="{{ $userPassword }}" required>
=======
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="{{ $userPassword }}">
>>>>>>> c9b23504261a762a0e0938eb8bb46988261c139f
                <div style="color: red" class="error-message" id="password-error"></div>
            </div>

            <div class="inpfield" >
                <button id="upbtn" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
    @include('layout.footer')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("updateuserform");

        form.addEventListener("submit", function(event) {
            const name = document.getElementById("name").value;
            const password = document.getElementById("password").value;
            const address = document.getElementById("address").value;
            const age = document.getElementById("age").value;

            const nameError = document.getElementById("name-error");
            const passwordError = document.getElementById("password-error");
            const addressError = document.getElementById("address-error");
            const ageError = document.getElementById("age-error");

            nameError.textContent = "";
            passwordError.textContent = "";
            addressError.textContent = "";
            ageError.textContent = "";

            let isValid = true;

            if (name == "") {
                nameError.textContent = "Please enter your name.";
                isValid = false;
            }

            if (password.length > 0 && password.length < 8) {
                passwordError.textContent = "password must be more than 8 chars";
                isValid = false;
            }

            if (address == "") {
                addressError.textContent = "Please enter your address.";
                isValid = false;
            }

            if (age == "") {
                ageError.textContent = "Please enter a valid age.";
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    });
</script>

</html>
