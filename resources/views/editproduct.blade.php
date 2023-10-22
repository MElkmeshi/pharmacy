@extends('aside_bar')


@section('name')
   
   
@endsection
@section('card')


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
@endsection