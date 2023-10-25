<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>product details</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #000039;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.product-details {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
    overflow: hidden;
    display: flex;
    width: 80%;
}

.product-image {
    flex: 1;
}

.product-image img {
    width: 100%;
    height: auto;
}

.product-info {
    flex: 1;
    padding: 20px;
}

.product-info h1 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #333333;
}

.product-info .description {
    font-size: 16px;
    color: #555555;
    margin-bottom: 20px;
}

.product-info .price {
    font-size: 20px;
    color: #ff5733;
    margin-bottom: 20px;
}

.buy-button {
    background-color: #1c1cf0;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.buy-button:hover {
    background-color: #0000cd;
}

    </style>
</head>
<body>
        <div class="product-details">
            <div class="product-image">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name  }}">
            </div>
            <div class="product-info">
                <h1>{{  $product->name }}</h1>
                <p class="description">{{ $product->desciption }}</p>
                <p class="price">$ {{ $product->price }}</p>
                <button class="buy-button">Buy Now</button>
            </div>
        </div>
</body>
</html>