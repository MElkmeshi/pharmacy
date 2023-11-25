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
    <title>Signup</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
</head>

<body>
   

    @foreach ($orders as $order)
    {{-- <h2>Order ID: {{ $order->id }}</h2> --}}
    <p>Total Amount: ${{ $order->total_amount }}</p>
    <p>Status: {{ $order->status }}</p>
    <p>Address: {{ $order->address }}</p>

    <ul>
        @foreach ($order->orderItems as $orderItem)
            <li>
                <p>Product Name: {{ $orderItem->product->name }}</p>
               <p> Desrciption:{{ $orderItem->product->desciption }}</p>
               <p>Price for the piece:{{ $orderItem->product->price }}</p> 
                {{-- Quantity: {{ $orderItem->quantity }} --}}
                
            </li>
            <img src="{{Storage::url($orderItem->product->image)}}" width="200" height="200" class="img-fluid" alt="Product Image">
        @endforeach
    </ul>
    @if ($order->status == 'processing' || $order->status == 'shipped')
    <a href="{{route("cancelorder",['order_id'=>$order->id ])}}"><button type="button" >Cancel The Order</button></a>
    @endif
  

    <hr>
   
@endforeach


   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>


</html>
