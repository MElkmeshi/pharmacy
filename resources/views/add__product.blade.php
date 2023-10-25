@extends('aside_bar')


@section('name')
  <title>Add Product</title>
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
                        <h2>Create Product</h2>
                    </div>
                </div>
                <form id="adpordform" method="POST" action="{{ route('addprod') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-field">
                        <label class="label" for="name">Product Name</label>
                        <input class="input" type="text" class="input form-control" name="name" id="name" required="">

                        <div style="color: red" class="error-message" id="name-error"></div>
                    </div>
                    <div class="input-field">
                        <label class="label" for="description">Product Description</label>
                        <input class="input" type="text" class="input form-control" id="description" name="description" required="">

                        <div style="color: red" class="error-message" id="description-error"></div>

                    </div>
                    <div class="input-field">
                        <label class="label" for="price">Price</label>
                        <input class="input" type="text" class="input form-control" name="price" id="price" required="">

                        <div style="color: red" class="error-message" id="price-error"></div>
                    </div>
                    <div class="input-field">
                        <label class="label" for="image">Image</label>
                        <input class="input" type="file" class="input form-control" id="image" name="image" required="">
                        <div style="color: red" class="error-message" id="image-error"></div>
                    </div>
                    <div class="form-group">
                       
                        <label class="label" for="category">Category:</label>
                        
                        <select class="form-control" name="category" id="category" required="">
                            <option value="baby_care">Baby Care</option>
                            <option value="skin_care">Skin Care</option>
                            <option value="medications">Medications</option>
                            <option value="vitamins">Vitamins</option>
                            <option value="supplements">Supplements</option>
                            <option value="medical_equipment">Medical Equipment</option>
                            <option value="bills">Bills</option>
                            <option value="antibiotics">Antibiotics</option>
                        </select>
                    </div>
                
                    <div class="input-field">
                        <button type="submit" class="submit" value="Add">Add</button>  
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        const form = document.getElementById("adpordform");

        form.addEventListener("submit", function(event) {
            const name = document.getElementById("name").value;
            const description = document.getElementById("description").value;
            const price = document.getElementById("price").value;
            const image = document.getElementById("image").value;

            const nameError = document.getElementById("name-error");
            const descriptionError = document.getElementById("description-error");
            const priceError = document.getElementById("price-error");
            const imageError = document.getElementById("image-error");

            nameError.textContent = "";
            descriptionError.textContent = "";
            priceError.textContent = "";
            imageError.textContent = "";

            if (name == "") {
                nameError.textContent = "Please enter the product name.";
                event.preventDefault();
            }

            if (description == "") {
                descriptionError.textContent = "Please enter the product description.";
                event.preventDefault();
            } else if (description.length < 8) {
                descriptionError.textContent = "product description must be more than 8 chars";
                event.preventDefault();
            }

            if (price == "") {
                priceError.textContent = "Please enter a valid positive price.";
                event.preventDefault();
            }

            if (!image) {
                imageError.textContent = "Please select an image.";
                event.preventDefault();
            }
        });
    </script>

@endsection
