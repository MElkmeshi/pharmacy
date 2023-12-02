<div class="big row">
    @foreach ($data as $product)
        <div class="disp col-3">
            <h2 class="hed2">{{ $product->name }}</h2>
            <p class="pr">Description: {{ $product->desciption }}</p>
            <p class="pr">Price: {{ $product->price }}</p>
            <img src="{{ Storage::url($product->image) }}" width="80" alt="Product Image">
            <a href="{{ route('addtocart', ['id' => $product->id]) }}"><button class="sbt">Add to
                    cart</button></a>
            <a href="{{ route('productdetails', ['id' => $product->id]) }}"><button
                    class="sbt">Details</button></a>
        </div>
    @endforeach
</div>