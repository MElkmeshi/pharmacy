<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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