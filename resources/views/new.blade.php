
<label for="payment"> choose your prefered payment</label>
<select name="payments" id="payment">
@foreach($paymentMethods as $paymentMethod)

    <option value="">{{ $paymentMethod->name }}</option>

   
    

@endforeach

</select>
