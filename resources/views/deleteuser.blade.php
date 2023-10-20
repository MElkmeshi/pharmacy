<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #838392f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color:  #000039;
            box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #fff;
            font-size: 28px;
            margin-bottom: 20px;
        }
        h1:hover{
            color: #f4ec07;
        }

        label {
            color: #fff;
            display: block;
            font-size: 16px;
            margin-bottom: 10px;
        }
label:hover{
    color: #f4ec07;
}
        input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #fff;
            color: black;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #f4ec07;
        }
    </style>
</head>
<body>
    <form id="deleteform" method="POST" action="{{ route('deleteuser') }}">
        @csrf <!-- CSRF Token -->
        <h1>Delete User</h1>
        <label for="email">Enter the email to delete:</label>
        <input type="email" id="email" name="email" required>
        <div>
            <button type="submit">Delete</button>
        </div>
    </form>
</body>
</html>

