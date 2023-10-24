
@extends('aside_bar')


@section('name')
<Style>
    /* Apply a CSS reset to remove default browser styles */


    /* Global styles for your form */
  
        /* Style form inputs */
        input[type="text"],
        input[type="file"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Style the image container */
        .image-container {
            margin-bottom: 15px;
        }

        /* Style the image */
        img {
            max-width: 80px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style the submit button */
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }


    /* Additional styling for form elements can be added as needed */
</Style>
<link rel="stylesheet" href="/css/addproduct.css">
@endsection



@section('card')
<div class="cardBox">
    <div class="card">
        <div>

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
    
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Update User</h2>
        </div>
    </div>
    



    
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

    <form id="updateuserform" method="POST" action="{{ route('updateuser') }}">
        @csrf <!-- CSRF Token -->

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
            <div style="color: red" class="error-message" id="name-error"></div>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ $user->address }}" required>
            <div style="color: red" class="error-message" id="address-error"></div>
        </div>

        <!-- Age -->
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" value="{{ $user->age }}" required>
            <div style="color: red" class="error-message" id="age-error"></div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <div style="color: red" class="error-message" id="password-error"></div>
        </div>

        <div class="form-group">
            <button type="submit">Update</button>
        </div>
    </form>






        </div></div></div>   
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

@endsection






       
