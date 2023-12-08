<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>Price</td>
            <td>Stock</td>
            <td>Desciption</td>
            <td>Picture</td>
            <td>Actions</td>
        </tr>
    </thead>


    <tbody>

        @foreach ($data as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>11</td>
                <td>{{ $product->desciption }}</td>
                <td> <img src="{{ Storage::url($product->image) }}" width="80" alt="Product Image">
                </td>
                <td>
                    <a href="{{ route('editprodform', ['id' => $product->id]) }}"><button
                            class="edit">Edit</button></a>
                    <a href="{{ route('deleteprod', ['id' => $product->id]) }}"><button
                            class="delete">Delete</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>