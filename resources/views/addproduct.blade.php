<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="{{route('addprod')}}" enctype="multipart/form-data">
        @csrf
        <label for="name">name:</label>
        <input type="text" name="name">
        <label for="description">description:</label>
        <input type="text" name="description">
        <label for="price">price:</label>
        <input type="text" name="price">
        <label for="image">image:</label>
        <input type="file" name="image">
        <button type="submit">add</button>
        
    </form> 
    
</body>
</html>