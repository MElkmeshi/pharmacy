
   
@extends('layout.master')
@section('title',"order")

@section('content')
    
<form action="{{ route('confirm_order_all')}} " method="POST">
    @csrf

    <label for="new_address">your current address:</label>
    <input type="text" id="new_address" name="new_address" value="{{$userAddress}}" required>

    <label for="new_address">Change address:</label>
    <input type="text" id="new_address" name="new_address" >

    <!-- Other form fields if needed -->
    <label>choose pay method</label>
    <select name="payment" id="paymentMethod">
        <option value="1"> cash on delivery</option>
        <option value="2"> online payment</option>
    </select>
   

    <div class="col-2">
        <button type="submit" class="btn btn-danger" >  Create Order
        </button>
            
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
            window.location.href = "{{ route('confirm_order_all') }}";
        } else if (selectedOption === '2') {
            // Redirect to the about-us route
            window.location.href = "{{ route('checkout') }}";
        }
    });
</script>


   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>


@endsection
