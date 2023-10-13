<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($products as $product)
    <div>
        <h2>{{ $product->name }}</h2>
        <p>Description: {{ $product->desciption }}</p>
        <p>Price: {{ $product->price }}</p>
        <img src="{{Storage::url($product->image)}}" width="80" alt="Product Image">
        
    </div>
@endforeach
</body>
</html>