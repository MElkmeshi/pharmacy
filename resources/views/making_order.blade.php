
   
@extends('layout.master',compact('menuItems'))
@section('title',"orderall")

@section('content')
    
<!-- Your Blade template -->

<form action="{{ route('confirm_order', ['product_id' => $id, 'cart_id' => $cartid ]) }}" method="POST">
    @csrf

    <label for="new_address">Your current address:</label>
    <input type="text" id="new_address" name="new_address" value="{{ $userAddress }}" required>

    <label for="new_address">Change address:</label>
    <input type="text" id="new_address" name="new_address">

    <!-- Other form fields if needed -->
    <label>Choose payment method</label>
    <select name="payment" id="paymentMethod">
        <option value="1">Cash on Delivery</option>
        <option value="2">Online Payment</option>
    </select>

    <div class="col-2">
        <button type="submit" class="btn btn-danger">Create Order</button>
    </div>
</form>

<div class="container py-5 text-center">
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        @method('POST')
            <button class="btn btn-lg text-light bg-dark text-center"
                type="submit" >create Online Order
            </button>
    </form>
</div>

<form action="{{ route('new') }}" method="GET">
    <div class="col-2" id="another">
        <button type="submit" class="btn btn-primary">another payment</button>
    </div>
    </form>

<script>
    document.querySelector('form').addEventListener('submit', function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Check which option is selected in the dropdown
        var selectedOption = document.getElementById('paymentMethod').value;

        if (selectedOption === '1') {
            // Redirect to the confirm_order route
            window.location.href = "{{ route('confirm_order', ['product_id' => $id, 'cart_id' => $cartid ]) }}";
        } else if (selectedOption === '2') {
            // Redirect to the checkout route
            window.location.href = "{{ route('checkout') }}";
        }
        else if (selectedOption === '3') {
           
           window.location.href = "{{ route('new') }}";
       }
    });
</script>






@endsection
