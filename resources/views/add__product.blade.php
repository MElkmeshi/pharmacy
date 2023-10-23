@extends('aside_bar')


@section('name')
    <link rel="stylesheet" href="css/addproduct.css">
   
    <Style>
        /* Apply a CSS reset to remove default browser styles */


        /* Global styles for your form */




        header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Input field styling */
        .input-field {
            margin-bottom: 20px;
        }

        form {
            width: 100%
        }

        .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #fff;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Label styling */
        label {
            font-weight: bold;
        }

        /* Error message styling */
        .error-message {
            margin-top: 5px;
        }

        /* Submit button styling */
        .submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit:hover {
            background-color: #0056b3;
        }

        /* Customize the file input field */
        .input[type="file"] {
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 4px;
            background-color: #fff;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        /* Additional styling for form elements can be added as needed */
    </Style>
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
                        <label for="name">Product Name</label>
                        <input type="text" class="input form-control" name="name" id="name" required="">

                        <div style="color: red" class="error-message" id="name-error"></div>
                    </div>
                    <div class="input-field">
                        <label for="description">Product Description</label>
                        <input type="text" class="input form-control" id="description" name="description" required="">

                        <div style="color: red" class="error-message" id="description-error"></div>

                    </div>
                    <div class="input-field">
                        <label for="price">Price</label>
                        <input type="text" class="input form-control" name="price" id="price" required="">

                        <div style="color: red" class="error-message" id="price-error"></div>
                    </div>
                    <div class="input-field">
                        <label for="image">Image</label>
                        <input type="file" class="input form-control" id="image" name="image" required="">
                        <div style="color: red" class="error-message" id="image-error"></div>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" value="Add">
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
