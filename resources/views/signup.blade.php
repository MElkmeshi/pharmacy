<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/homepage.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Signup</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            background: #000039;
            padding: 0 20px 0 20px;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

    .hed{
        min-width: 300px;
        text-align: center;
        padding-top: 50px;
        padding-left: 100px;
    }

        .row1 {
            color: #000;
            width: 600px;
            height: 600px;
            border-radius: 10px;
            background: #fff;
            padding-left: 150px;
            box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
            align-items: center;
        }

        .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .text p {
            color: #fff;
            font-size: 20px;
        }

        i {
            font-weight: 400;
            font-size: 15px;
        }

        .right {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .input-box {
            box-sizing: border-box;
        }

        img {
            width: 35px;
            position: absolute;
            top: 30px;
            left: 30px;
        }

        .input-box header {
            font-weight: 700;
            text-align: center;
            margin-bottom: 45px;
        }

        .input-field {
            width: 500px;
            display: flex;
            padding-left: 50px;
            flex-direction: column;
            position: relative;
            padding: 0 10px 0 10px;
        }

        .input {
            height: 45px;
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            outline: none;
            margin-bottom: 20px;
            color: #fff;
        }

        .input-box .input-field label {
            position: absolute;
            top: 10px;
            left: 10px;
            pointer-events: none;
            transition: .5s;
        }

        .input-field input:focus~label {
            top: -10px;
            font-size: 13px;
        }

        .input-field input:valid~label {
            top: -10px;
            font-size: 13px;
            color: #5d5076;
        }

        .input-field .input:focus,
        .input-field .input:valid {
            border-bottom: 1px solid #743ae1;
        }

        .input-field:hover {
            color: #f4ec07;
        }

        .submit {
            color: #fff;
            border: none;
            outline: none;
            height: 45px;
            background: #1c1cf0;
            border-radius: 5px;
            transition: .4s;
        }

        .submit:hover {
            background: #0000cd;
        }

        .signin {
            text-align: center;
            font-size: small;
            margin-top: 25px;
        }

        #sp #anc{
            text-decoration: none;
            font-weight: 700;
            color:#000;
            transition: .5s;
        }

        #sp #anc:hover {
            text-decoration: underline;
            color: #f4ec07;
        }

        @media only screen and (max-width: 768px) {
            .side-image {
                border-radius: 10px 10px 0 0;
            }

            img {
                width: 35px;
                position: absolute;
                top: 20px;
                left: 47%;
            }

            .text {
                position: absolute;
                top: 70%;
                text-align: center;
            }

            .text p,
            i {
                font-size: 16px;
            }

            .row {
                max-width: 420px;
                width: 100%;
            }
        }
    </style>
</head>

<body>
@include('layout.header')


    <div class="wrapper">
        <div class="container main">
            <div class="row1">
                <div class="col-md-6 ">
                </div>

                <div class="col-md-6 right">

                    <div class="input-box">

                        <h2 class="hed">Create Account </h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p> {{ $error }}
                                    <p>
                                @endforeach
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form id="signupform" action="{{ route('reg') }}" method="post">
                            @csrf
                            <div class="input-field">
                                <input type="text" class="input" id="name" name="username" required="">
                                <label id="input-label" for="name">Name</label>
                                <div style="color: red" class="error-message" id="name-error"></div>
                            </div>
                            <input type="hidden" name="role" value="user">
                            <div class="input-field">
                                <input type="email" class="input" id="email" name="email" required="">
                                <label id="input-label" for="email">Email</label>
                                <div style="color: red" class="error-message" id="email-error"></div>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="password" name="password" required="">
                                <label id="input-label"  for="password">Password</label>
                                <div style="color: red" class="error-message" id="password-error"></div>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="phone" name="phone" required="">
                                <label id="input-label" for="pass">Phone</label>
                                <div style="color: red" class="error-message" id="phone-error"></div>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="address" name="address" required="">
                                <label id="input-label" for="address">Address</label>
                                <div style="color: red" class="error-message" id="address-error"></div>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="age" name="age" required="">
                                <label id="input-label" for="age">Age</label>
                                <div style="color: red" class="error-message" id="age-error"></div>
                            </div>
                            <input type="hidden" value="user" name='role'>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Sign Up">
                            </div>
                            <div class="signin">
                                <span id="sp">Already have an account? <a id="anc" href="{{ route('loginform') }}">Login in
                                        here</a></span>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("signupform");

        form.addEventListener("submit", function(event) {
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const phone = document.getElementById("phone").value;
            const address = document.getElementById("address").value;
            const age = document.getElementById("age").value;

            const nameError = document.getElementById("name-error");
            const emailError = document.getElementById("email-error");
            const passwordError = document.getElementById("password-error");
            const phoneError = document.getElementById("phone-error");
            const addressError = document.getElementById("address-error");
            const ageError = document.getElementById("age-error");

            nameError.textContent = "";
            emailError.textContent = "";
            passwordError.textContent = "";
            phoneError.textContent = "";
            addressError.textContent = "";
            ageError.textContent = "";

            let isValid = true;

            if (name == "") {
                nameError.textContent = "Please enter your name.";
                isValid = false;
            }

            if (email == "" || !isValidEmail(email)) {
                emailError.textContent = "Please enter a valid email address.";
                isValid = false;
            }

            if (password == "") {
                passwordError.textContent = "Please enter your password.";
                isValid = false;
            } else if (password.length < 8) {
                passwordError.textContent = "password must be more than 8 chars";
                isValid = false;
            }

            if (phone == "") {
                phoneError.textContent = "Please enter your phone number.";
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

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });
</script>

</html>
