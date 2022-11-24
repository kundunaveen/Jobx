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
   <!--Bootsrap CDN Here-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
   <link rel="stylesheet" href="{{asset('assets/scss/main.css')}}" />
   <link rel="stylesheet" href="{{asset('css/toastr.css')}}" />
   <link rel="stylesheet" href="{{asset('css/jquery.toast.css')}}" />
   <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
   <link rel="stylesheet" href="{{asset('css/intelTelInput.css')}}" />   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/jquery.raty.min.css" />
   <link rel="stylesheet" href="{{asset('css/custom-dev.css')}}" />
   @stack('header_css')
</head>

<body class="body">
    @include('employee.profile.partials.header')
    @yield('content')
    @include('employee.profile.partials.footer')
    @include('employee.profile.partials.script')
    @yield('scripts')
    @stack('footer_script')
</body>

</html>