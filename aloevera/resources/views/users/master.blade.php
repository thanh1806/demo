<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- link google font  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    {{-- Link css --}}
    
    <link href="{{ asset('css/all.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tablet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/faticon.png') }}"/>
    <title>ALOE VERA</title>
    {{-- SEO --}}
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9WJ17Q47RL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9WJ17Q47RL');
</script>

<!-- <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1098017955216867',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.7'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> -->
   
</head>
<body>
   {{-- header --}}
   @include('users.partial.header')
   {{-- end header --}}
    {{-- Container --}}
    @yield('content')
    {{-- end Container --}}
   {{-- footer --}}
   @include('users.partial.footer')
   {{-- end footer --}}
   {{-- link script --}}
   @include('users.Login.login')
   <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
   <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>