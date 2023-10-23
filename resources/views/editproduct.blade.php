@extends('aside_bar')


@section('name')
<Style>
    /* Apply a CSS reset to remove default browser styles */


    /* Global styles for your form */
  
        /* Style form inputs */
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Style the image container */
        .image-container {
            margin-bottom: 15px;
        }

        /* Style the image */
        img {
            max-width: 80px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style the submit button */
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }


    /* Additional styling for form elements can be added as needed */
</Style>
<link rel="stylesheet" href="/css/addproduct.css">
@endsection



@section('card')
<div class="cardBox">
    <div class="card">
        <div>

    @if (count($errors) > 0)
    <div class="card mt-5">
        <div class="card-body">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                   <p> {{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Edit Product</h2>
        </div>
    </div>
    <form method="POST" action="{{ route('editprod',$product->id) }}" enctype="multipart/form-data">
        @csrf
        <label for="name">name:</label>
        <input type="text" name="name" value="{{ $product->name }}">
        <label for="description">description:</label>
        <input type="text" name="description" value="{{ $product->desciption }}">
        <label for="price">price:</label>
        <input type="text" name="price" value="{{ $product->price }}">
        <div >
            <label>Image</label>
            <input type="file" name="image" name="image">
            <img src="{{Storage::url($product->image)}}" width="80">
        </div>
        <button type="submit">Edit</button>

        
    </form> 
        </div></div></div>
@endsection