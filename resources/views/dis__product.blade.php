@extends('aside_bar')

@section($active="displayProduct")
@section('name')
    <link rel="stylesheet" href="css/disproduct.css">
    <title> Display all product</title>
@endsection
@section('card')
    <div class="details">
        <div class="search">
            <label>
                <input type="text" name="searchadmin" id="searchadmin" placeholder="Search here">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Products</h2>
            </div>
            <div id="searchresult">
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

                    @foreach ($products as $product)
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
            </div>
        </div>
    @endsection
    @section("script")
    <script>
      $(document).ready(function(){
        $(document).on("input","#searchadmin",function(){
        var searchadmin=$(this).val();
        jQuery.ajax({
          url:"{{ route("ajaxsearchadmin") }}",
          type:'post',
          datatype:'html',
          cache:false,
          data:{searchadmin:searchadmin,'_token':"{{ csrf_token() }}"},
          success:function(data){
            $("#searchresult").html(data);
          },
          error:function(){

          }
        });
      });
      });
    </script>
  @endsection