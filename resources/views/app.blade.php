<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('meta')
    <!-- Google tag (gtag.js) -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-259136833-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-259136833-1');
</script>



<title>Eys Design</title>
<!-- Facebook Meta Tags -->
        <meta property="og:url" content="{{env('APP_ENV')}}">
        <meta property="og:type" content="website">
        <link rel="shortcut icon" type="image/png"  href="{{ asset('assets/images/icon.png')}}">
    <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


<style>

</style>

    <!-- Scripts -->
   {{--  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> --}}

{{--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Styles -->
{{--     <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> --}}
    <link href="/css/app.css" rel="stylesheet">



    @yield('head')
</head>
<body>

    @yield('header')

    <div id="app">

            @yield('content')
    </div>
    @yield('footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


    <script src="/js/app.js" defer></script>

    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script>
     new WOW().init();
    </script>

    @yield('script')
    <script src="/js/style.js" defer></script>

<script>
    const linkWrapper = document.querySelector('.portal__link__wrapper__shop');
    linkWrapper.addEventListener('click', () => {
            window.scrollTo({
            top: document.documentElement.scrollHeight,
            behavior: 'smooth'
        });
        });

</script>
</body>
</html>

