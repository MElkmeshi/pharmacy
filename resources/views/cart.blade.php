<!DOCTYPE html>
<html lang="en">
<head>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

    <script>
        function incrementCart(productId) {
            $.ajax({
                type: 'POST',
                url: '/update-cart/' + productId,
                data: { increment: 1 },
                success: function(data) {
                    $('#amount-' + productId).text(data.amount);
                    console.log('Incrementing cart for product ID:', productId);
                },
                error: function(xhr, status, error) {
                  
                }
            });
        }

        function decrementCart(productId) {
            $.ajax({
                type: 'POST',
                url: '/update-cart/' + productId,
                data: { decrement: 1 },
                success: function(data) {
                    $('#amount-' + productId).text(data.amount);
                },
                error: function(xhr, status, error) {
                }
            });
        }
    </script>
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
                Description: {{ $item['product']->description }}
                <br>
                Price: ${{ $item['product']->price }}
                <br>
                <img src="{{Storage::url($item['product']->image)}}" width="80" alt="Product Image">
                <br>
                Amount: <span id="amount-{{ $item['product']->id }}">{{ $item['amount'] }}</span>
                <button type="button" onclick="incrementCart({{ $item['product']->id }})">+</button>
                <button type="button" onclick="decrementCart({{ $item['product']->id }})">-</button>
            </li>
        @endforeach
    </ul>
@endif
</body>
</html>
