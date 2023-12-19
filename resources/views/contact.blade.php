@extends('layout.master',compact('menuItems'))

@section('title','contact')

@section('content')
    
<div class="container p-3 pb-3 m-3 text-center">
    <div class="row">
        <div class="col-md-7">
          <h4>Get in touch</h4>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your name">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Email</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter your email">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter your number">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <button class="btn btn-primary rounded-bill main-btn ">Submit</button>
              <br>
        </div>
        <div class="col-md-5 ">
          <h4>Contact us</h4><hr>
          <div class="mt-4">
              <div class="d-flex">
                <i class="bi bi-geo-alt-fill"></i>
                <p >Address: 78 makrab ebied , madint nasr</p>
              </div><hr>
              <div class="d-flex">
                <i class="bi bi-telephone-fill"></i>
                <p>Contact :- 022486554</p>
              </div><hr>
              <div class="d-flex">
                <i class="bi bi-envelope-fill"></i>
                <p>Email:- drmohamed@gmail.com</p>
              </div><hr>
              <div class="d-flex">
                <i class="bi bi-browser-chrome"></i>
                <p>Website: www.drmohameddpharmacy.com </p>
              </div><hr>
          </div>
        </div>
    </div>
  </div>
@endsection
    
