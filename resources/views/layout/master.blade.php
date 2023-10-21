<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'unKnown page')</title>
    
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