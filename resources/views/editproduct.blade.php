<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
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

form {
    background-color:  #000039;
    border-radius: 10px;
    box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
    padding: 40px;
    width: 300px;
    text-align: center;
}

label {
    color: #fff;
    display: block;
    margin-bottom: 10px;
    text-align: left;
    font-weight: bold;
}

input[type="text"], input[type="file"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

input[type="file"] {
    cursor: pointer;
}

img {
    margin: 10px 0;
    border-radius: 5px;
}

button[type="submit"] {
    background-color: #1c1cf0;
    border: none;
    border-radius: 5px;
    color: black;
    cursor: pointer;
    font-size: 16px;
    padding: 10px 20px;
    transition: background-color 0.3s ease-in-out;
}

button[type="submit"]:hover {
    background-color: #0000cd;
}

</style>
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
    
    <form method="POST" action="{{ route('editprod',$product->id) }}" enctype="multipart/form-data">
        @csrf
        <label for="name">name:</label>
        <input type="text" name="name" value="{{ $product->name }}">
        <label for="description">description:</label>
        <input type="text" name="description" value="{{ $product->desciption }}">
        <label for="price">price:</label>
        <input type="text" name="price" value="{{ $product->price }}">
        <div >
            <label>Image</label>
            <input type="file" name="image" name="image">
            <img src="{{Storage::url($product->image)}}" width="80">
        </div>
        <button type="submit">Edit</button>

        
    </form> 
</body>
</html>