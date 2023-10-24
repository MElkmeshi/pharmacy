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
                    $('#totalprice').text(data.total_price+ ' EGP' );
                    
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
                    $('#totalprice').text(data.total_price+ ' EGP' );
                },
                error: function(xhr, status, error) {
                }
            });
        }
     </script>
 
</head>
<body>
    @extends('layout.master')
 
    @section('title', 'cart')
    @section('content')
    




@if ($productsInCart->isEmpty())
    <h2 class="text-primary">The cart is empty.</h2>
@else
    <ul>
        <h3 class="text-primary">Cart Items</h3>
        @foreach ($productsInCart as $item)
           
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <img src="{{Storage::url($item['product']->image)}}" width="200" height="200" class="img-fluid" alt="Product Image">
                </div>
                <div class="col-4">
                    <h5 class="card-title">Product Name : {{ $item['product']->name }}</h5>
                    <p class="card-text">Product Description : {{ $item['product']->desciption }}</p>
                </div>
                <div class="col-2">
                    @php
                        $totalPrice = $item['product']->price * $item['amount'];
                        //$item['product']->total_price
                    @endphp
                    <p class="card-text" > Total_Price:</p><P id="totalprice">{{ $totalPrice }}EGP</P>
                   
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-danger" id="decrement" onclick="decrementCart({{ $item['product']->id }})">
                                <i class="fa fa-minus"></i>
                            </button>
                        </span>
                        <span type="text" class="form-control text-center" id="amount-{{ $item['product']->id }}">{{ $item['amount'] }}</span>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success" id="increment" onclick="incrementCart({{ $item['product']->id }})">
                                <i class="fa fa-plus"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="col-2">
                    <a href="{{ route('deletecart', ['id' => $item['cart_id']]) }}"><button type="button" class="btn btn-danger" id="delete"> <i class="fa fa-trash"></i> Delete
                    </button></a>
                        
                </div>
            </div>
        </div>
    </div>
</div>
        @endforeach
    </ul>
@endif
@endsection
</body>

</html>
