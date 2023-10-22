<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>display all products</title>
</head>
<style>
    /* Apply styles to the body and overall layout */
body {
    font-family: Arial, sans-serif;
    background-color: #838392f8;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

/* Style the product container */
div {
    background-color: #000039;;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px;
    padding: 20px;
    text-align: center;
    width: 300px;
    transition: box-shadow 0.3s ease-in-out;
}

/* Add hover effect to the product container */
div:hover {
    box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
}

/* Style the product name */
h2 {
    color: #fff;
    font-size: 1.5rem;
    margin-bottom: 10px;
}

/* Style the product description and price */
p {
    color: #fff;
    font-size: 1rem;
    margin-bottom: 15px;
}

/* Style the product image */
img {
    border-radius: 5px;
    margin-bottom: 15px;
}

/* Style the action buttons */
button {
    background-color: #1c1cf0;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    font-size: 1rem;
    margin: 5px;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s ease-in-out;
}

/* Add hover effect to the buttons */
button:hover {
    background-color: #0000cd;
}

/* Responsive design */
@media (max-width: 768px) {
    div {
        width: 90%;
    }
}

</style>
<body>
    @foreach($products as $product)
    <div>
        <h2>{{ $product->name }}</h2>
        <p>Description: {{ $product->desciption }}</p>
        <p>Price: {{ $product->price }}</p>
        <img src="{{Storage::url($product->image)}}" width="80" alt="Product Image">
        <a href="{{ route('deleteprod', ['id' => $product->id]) }}"><button>Delete</button></a>
        <a href="{{ route('editprodform', ['id' => $product->id]) }}"><button>Edit</button></a>
        <a href="{{ route('addtocart', ['id' => $product->id]) }}"><button>Add to cart</button></a>
        

    </div>
@endforeach
</body>
</html>