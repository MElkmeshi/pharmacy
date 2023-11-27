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
            window.location.href = "{{ route('confirm_order', ['product_id' => $id, 'cart_id' => $cartid ]) }}";
        } else if (selectedOption === '2') {
            // Redirect to the about-us route
            window.location.href = "{{ route('checkout') }}";
        }
    });
</script>


   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>


</html>
