<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>update Form</h1>
    <form method="POST" action="{{ route('updateuser') }}">
        @csrf <!-- CSRF Token -->
        
        <!-- Name -->
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $userName }}" required>
        </div>

        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address"value="{{$userAddress}}" required>
        </div>

        <div>
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" value="{{$userAge}}" required>
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="{{$userPassword}}" required>
        </div>

       
        <div>
            <button type="submit">update</button>
        </div>

    </form>
</body>
</html>