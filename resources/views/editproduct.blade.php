@extends('aside_bar')


@section('name')
<title>Edit product</title>

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
        <label class="label" for="name">name:</label>
        <input class="input" type="text" name="name" value="{{ $product->name }}">
        <label class="label" for="description">description:</label>
        <input class="input" type="text" name="description" value="{{ $product->desciption }}">
        <label class="label" for="price">price:</label>
        <input class="input" type="text" name="price" value="{{ $product->price }}">
        <div >
            <label class="label">Image</label>
            <input class="input" type="file" name="image" name="image">
            <img src="{{Storage::url($product->image)}}" width="80">
        </div>
        <button type="submit">Edit</button>

        
    </form> 
        </div></div></div>
@endsection