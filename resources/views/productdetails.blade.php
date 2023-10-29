<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/homepage.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>product details</title>
    <style>
                * {
    font-family: 'Poppins', sans-serif;
}
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #000039;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.big{
    padding-left: 200px;
    padding-bottom: 20px;
    padding-top: 20px;
    justify-content: center;

}

.prodetails {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
    overflow: hidden;
    display: flex;
    width: 80%;
}

.proimage {
    flex: 1;
}

.proimage img {
    width: 100%;
    height: auto;
}

.proinfo {
    flex: 1;
    padding: 20px;
}

.proinfo h1 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #333333;
}

.proinfo .desc {
    font-size: 16px;
    color: #555555;
    margin-bottom: 20px;
}

.proinfo .pri {
    font-size: 20px;
    color: #ff5733;
    margin-bottom: 20px;
}

.cart-btn {
    background-color: #1c1cf0;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.cart-btn:hover {
    background-color: #0000cd;
}

    </style>
</head>
<body>
    @include('layout.header')
    <div class="big">
        <div class="prodetails">
            <div class="proimage">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name  }}">
            </div>
            <div class="proinfo">
                <h1>{{  $product->name }}</h1>
                <p class="desc">{{ $product->desciption }}</p>
                <p class="pri">$ {{ $product->price }}</p>
                <a href="{{ route('addtocart', ['id' => $product->id]) }}"><button class="cart-btn">Add to
                    cart</button></a>
            </div>
        </div>
    </div>
    @include('layout.footer')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</html>