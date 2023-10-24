@extends('layout.master')

@section('title', 'home')


@section('content')
    <!-- start slider -->

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/baby.webp" class="d-block w-100" alt="baby-Photo" />
            </div>
            <div class="carousel-item">
                <img src="images/back.webp" class="d-block w-100" alt="backToSchool-Photo" />
            </div>
            <div class="carousel-item">
                <img src="images/cosmetics.webp" class="d-block w-100" alt="cosmetics-Photo" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- end of slider -->
    <div class="our-work text-center  pb-5 pt-5 ">
        <div class="container">
            <div class="main-title mt-5 mb-5 position-relative">
                <img class="mb-4" src="images/saydlya.png" alt="" />
                <h2>We have all you need</h2>
                <p class="text-black-50 text-uppercase">high quality low price</p>
            </div>
            <div class="row">

                <a href="{{route('produsercategory', ['category' => 'baby_care'])}}" class="col-sm-6 col-md-4 col-lg-3">
                    <div>
                        <div class="box mb-3 bg-white" data-work="Baby care">
                            <img class="img-fluid" src="images/BabyCare.png" alt="" />

                        </div>
                    </div>
                </a>

                <a href="{{route('produsercategory', ['category' => 'skin_care'])}}" class="col-sm-6 col-md-4 col-lg-3">
                   <div>
                        <div class="box mb-3 bg-white" data-work="Skin care">
                            <img class="img-fluid" src="images/FACE-CARE_1.jpg" alt="" />
                        </div>
                    </div> 
                </a>


                <a href="{{route('produsercategory', ['category' => 'medications'])}}" class="col-sm-6 col-md-4 col-lg-3">
                    <div>
                        <div class="box mb-3 bg-white" data-work="Medications">
                            <img class="img-fluid" src="images/Medications.png" alt="" />
                        </div>
                    </div>
                </a>

                <a href="{{route('produsercategory', ['category' => 'vitamins'])}}" class="col-sm-6 col-md-4 col-lg-3">
                    <div>
                        <div class="box mb-3 bg-white" data-work="Vitamins">
                            <img class="img-fluid" src="images/Vitamins-and-Minerals_1.png" alt="" />
                        </div>
                    </div>
                </a>


                <a href="{{route('produsercategory', ['category' => 'supplements'])}}" class="col-sm-6 col-md-4 col-lg-3">
                    <div>
                        <div class="box mb-3 bg-white" data-work="Supplements">
                            <img class="img-fluid" src="images/Supplements.jpg" alt="" />

                        </div>
                    </div>
                </a>

                <a href="{{route('produsercategory', ['category' => 'medical_equipment'])}}" class="col-sm-6 col-md-4 col-lg-3">
                   <div>
                        <div class="box mb-3 bg-white" data-work="medical equipments">
                            <img class="img-fluid" src="images/Medicalequipments.png" alt="" />
                        </div>
                    </div>
                </a>

                <a href="{{route('produsercategory', ['category' => 'bills'])}}" class="col-sm-6 col-md-4 col-lg-3">
                    <div>
                        <div class="box mb-3 bg-white" data-work="bills">
                            <img class="img-fluid" src="images/Bills.png" alt="" />
                        </div>
                    </div>
                </a>



               <a href="{{route('produsercategory', ['category' => 'antibiotics'])}}" class="col-sm-6 col-md-4 col-lg-3">
                    <div>
                        <div class="box mb-3 bg-white" data-work="antibiotique">

                            <img class="img-fluid" src="images/Anti-biotique.png" alt="" />


                        </div>
                    </div>
                </a>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a class="btn btn-primary rounded-bill main-btn" href="{{route("produser")}}">Show all products</a>
            </div>
        </div>
    </div>
    </div>


    <!-- discount product -->
    <section class="discount_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-5 offset-md-2">
                    <div class="detail-box">
                        <h2>
                            <strong>You get <br />
                                any medicine <br />
                                on
                                <span> 10% discount </span></strong>
                        </h2>
                        <p>
                            <strong>It is a long established fact that a reader will be
                                distracted by</strong>
                        </p>
                        <div>
                            <a href="#"> Buy Now </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-5">
                    <div class="img-box">
                        <img src="images/medicines.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of product section -->

    <!-- service section -->
    <div class="features text-center pt-5 pb-5">
        <div class="container">
            <div class="main-title mt-5 mb-5 position-relative">
                <img class="mb-4" src="images/saydla2.png" alt="" />
                <h2>We are Helping you 24/7</h2>
                <p class="text-black-70 text-uppercase">
                    We provide many servies to help you
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="feat">
                    <div class="icon-holder position-relative">
                        <i class="fa-solid fa-1 position-absolute bottom-0 number"></i>
                        <i class="fa-solid fa-4x fa-tablets position-absolute bottom-0 icon"></i>
                    </div>
                    <h4 class="mt-3 mb-3 text-uppercase">High quality</h4>
                    <p class="text-black-70 lh-lg">
                        We serve you with the best quality in the market
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feat">
                    <div class="icon-holder position-relative">
                        <i class="fa-solid fa-2 position-absolute bottom-0 number"></i>
                        <i class="fa-solid fa-4x fa-truck position-absolute bottom-0 icon"></i>
                    </div>
                    <h4 class="mt-3 mb-3 text-uppercase">Delivery 24/7</h4>
                    <p class="text-black-70 lh-lg">
                        We deliver all the day once you call us
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feat">
                    <div class="icon-holder position-relative">
                        <i class="fa-solid fa-3 position-absolute bottom-0 number"></i>
                        <i class="fa-solid fa-4x fa-user-doctor position-absolute bottom-0 icon"></i>
                    </div>
                    <h4 class="mt-3 mb-3 text-uppercase">Best staff</h4>
                    <p class="text-black-70 lh-lg">
                        Best doctor are available to help you
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
