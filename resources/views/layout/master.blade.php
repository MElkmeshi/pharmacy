<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'unKnown page')</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="/images/about-medicine.png">
    <!-- css styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/homepage.css" />

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto+Mono:ital,wght@0,100;0,300;0,600;1,400;1,600&display=swap"
      rel="stylesheet"
    />
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</head>
<body>
    {{-- start navbar --}}
    @include('layout.header')
     {{-- end navbar --}}

     @yield('content')
      @section('content')   {{--override this function in all pages to show the content of the pages --}}
         show your content
     @endsection

     @include('layout.footer')
</body>
</html>