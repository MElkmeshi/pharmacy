
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
<h1>User's Cart</h1>

    @if ($productsInCart->isEmpty())
        <p>The cart is empty.</p>
    @else
        <ul>
            @foreach ($productsInCart as $item)
                <li>
                    Product Name: {{ $item['product']->name }}
                    <br>
                    description: {{ $item['product']->desciption }}
                    <br>
                    Price: ${{ $item['product']->price }}
                    <br>
                    <br>
                    Amount: <span id="amount-{{ $item['product']->id }}">{{ $item['amount'] }}</span>
                    <form action="{{ route('update.cart', $item['product']->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="submit" name="increment" value="1">+</button>
                        <button type="submit" name="decrement" value="1">-</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>