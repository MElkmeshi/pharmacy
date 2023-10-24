<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Signup</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

*{
    font-family: 'Poppins', sans-serif;
}
.wrapper{
    background: #838392f8;
    padding: 0 20px 0 20px;
}
.main{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
.side-image{
    background-image: url("https://medpharm.ie/wp-content/uploads/pharmacytechnicianjobs.jpeg");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 10px 0 0 10px;
    position: relative;
}
.row{
  color: #fff;
  width:  950px;
  height:600px;
  border-radius: 10px;
  background: #000039;
  padding: 0px;
  box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
}
.text{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.text p{
    color: #fff;
    font-size: 20px; 
}
i{
    font-weight: 400;
    font-size: 15px;
}
.right{
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}
.input-box{
  width: 330px;
  box-sizing: border-box;
}
img{
    width: 35px;
    position: absolute;
    top: 30px;
    left: 30px;
}
.input-box header{
    font-weight: 700;
    text-align: center;
    margin-bottom: 45px;
}
.input-field{
    display: flex;
    flex-direction: column;
    position: relative;
    padding: 0 10px 0 10px;
}
.input{
    height: 45px;
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    outline: none;
    margin-bottom: 20px;
    color: #fff;
}
.input-box .input-field label{
    position: absolute;
    top: 10px;
    left: 10px;
    pointer-events: none;
    transition: .5s;
}
.input-field input:focus ~ label
   {
    top: -10px;
    font-size: 13px;
  }
  .input-field input:valid ~ label
  {
   top: -10px;
   font-size: 13px;
   color: #5d5076;
 }
 .input-field .input:focus, .input-field .input:valid{
    border-bottom: 1px solid #743ae1;
 }
 .input-field:hover{
    color: #f4ec07;
 }
 .submit{
    border: none;
    outline: none;
    height: 45px;
    background: #ececec;
    border-radius: 5px;
    transition: .4s;
 }
 .submit:hover{
    background: #f4ec07;
    color: #fff;
 }
 .signin{
    text-align: center;
    font-size: small;
    margin-top: 25px;
}
span a{
    text-decoration: none;
    font-weight: 700;
    color: #000;
    transition: .5s;
}
span a:hover{
    text-decoration: underline;
    color: #000;
}

@media only screen and (max-width: 768px){
    .side-image{
        border-radius: 10px 10px 0 0;
    }
    img{
        width: 35px;
        position: absolute;
        top: 20px;
        left: 47%;
    }
    .text{
        position: absolute;
        top: 70%;
        text-align: center;
    }
    .text p, i{
        font-size: 16px;
    }
    .row{
        max-width:420px;
        width: 100%;
    }
    
}
    </style>
</head>
<body>

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

  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
            </div>

            <div class="col-md-6 right">
                
                <div class="input-box">
                   
                   <header>Create Product</header>
                   <form id="adpordform" method="POST" action="{{route("addprod")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-field">
                      <input type="text" class="input" name="name" id="name" required="" >
                      <label for="name">Product Name</label>
                      <div style="color: red" class="error-message" id="name-error"></div>
                  </div> 
                    <div class="input-field">
                      <input type="text" class="input" id="description" name="description" required="" >
                      <label for="description">Product Description</label>
                      <div style="color: red" class="error-message" id="description-error"></div>

                  </div> 
                    <div  class="input-field">
                      <input type="text" class="input" name="price" id="price" required="" >
                      <label for="price">Price</label>
                      <div style="color: red" class="error-message" id="price-error"></div>
                  </div> 
                    <div class="input-field">
                      <input type="file" class="input" id="image" name="image" required="">
                      <div style="color: red" class="error-message" id="image-error"></div>
                  </div> 
                  <div class="form-group">
                       
                    <label for="category">Category:</label>
                    
                    <select class="form-control" name="category" id="category">
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
                        <input type="submit" class="submit" value="Add">
                   </div> 
                </div>  
              </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    const form = document.getElementById("adpordform");

    form.addEventListener("submit", function (event) {
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

        if (name=="") {
            nameError.textContent = "Please enter the product name.";
            event.preventDefault();
        }

        if (description=="") {
            descriptionError.textContent = "Please enter the product description.";
            event.preventDefault();
        }else if(description.length<8){
            descriptionError.textContent = "product description must be more than 8 chars";
            event.preventDefault();
        }

        if (price=="") {
            priceError.textContent = "Please enter a valid positive price.";
            event.preventDefault();
        }

        if (!image) {
            imageError.textContent = "Please select an image.";
            event.preventDefault();
        }
    });
</script>
</html>