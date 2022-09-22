<!DOCTYPE html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
   <![endif]-->
<!--[if IE 7]>         
   <html class="no-js lt-ie9 lt-ie8">
      <![endif]-->
<!--[if IE 8]>         
      <html class="no-js lt-ie9">
         <![endif]-->
<!--[if gt IE 8]>      
         <html class="no-js">
            <![endif]-->
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>@yield('title', 'Profile')</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="{{asset('assets/images/favicon.svg')}}" width="10" height="10" type="image/x-icon" />
   <!--========= Bootsrap CDN Here =========-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
   <link rel="stylesheet" href="{{asset('assets/scss/main.css')}}" />
   <link rel="stylesheet" href="{{asset('css/toastr.css')}}" />
   <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
</head>

<body>
    @include('employer.profile.partials.header')
    @yield('content')
    @include('employer.profile.partials.footer')
    @include('employer.profile.partials.script')
    @yield('scripts')
</body>

</html>