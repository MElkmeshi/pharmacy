<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #838392f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color:#000039 ;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
            width: 300px;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
        }
        .form-container h1:hover{
            color: #f4ec07;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #fff;
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .form-group label:hover{
            color: #f4ec07;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            width: 100%;
            background-color: #fff;
            color: black;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #f4ec07;
        }
    </style>
</head>
<body>

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

    <div class="form-container">
        <h1>Update User</h1>
        <form id="updateuserform" method="POST" action="{{ route('updateuser') }}">
            @csrf <!-- CSRF Token -->
            
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $userName }}" required>
                <div style="color: red" class="error-message" id="name-error"></div>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{$userAddress}}" required>
                <div style="color: red" class="error-message" id="address-error"></div>
            </div>

            <!-- Age -->
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" value="{{$userAge}}" required>
                <div style="color: red" class="error-message" id="age-error"></div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="{{$userPassword}}" required>
                <div style="color: red" class="error-message" id="password-error"></div>
            </div>

            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
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

            if (name=="") {
                nameError.textContent = "Please enter your name.";
                isValid = false;
            }

            if (password=="") {
                passwordError.textContent = "Please enter your password.";
                isValid = false;
            }else if(password.length<8){
                passwordError.textContent = "password must be more than 8 chars";
                isValid = false;
            }

            if (address=="") {
                addressError.textContent = "Please enter your address.";
                isValid = false;
            }

            if (age=="") {
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
