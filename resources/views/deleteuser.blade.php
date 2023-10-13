<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>delete user</h1>
    <form method="POST" action="{{ route('deleteuser') }}">
        @csrf <!-- CSRF Token -->
    
            <label for="email">Enter the email to delete:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <button type="submit">Delete</button>
        </div>

    </form>
</body>

</html>