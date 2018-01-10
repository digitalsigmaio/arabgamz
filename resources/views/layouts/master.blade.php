<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>عرب جيمز دوت كوم</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
    <link href="{{ asset('css/agency.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="icon" href="favicon.png">
	
	<!-- =======================================================
      Author: GMS Group
      Author URL: https://gms-group.company
	  Developer: Mohamed Ibrahim
	  E-Mail: m.sayed@gmsproduction.com
    ======================================================= -->
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger header-title" href="#page-top">Arab Gamz</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" dir="rtl">
            <ul class="navbar-nav text-right ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger header-title" href="{{ route('home') }}">الرئيسية</a>
                </li>
                @if(isset($categories))
                    <li class="dropdown nav-item  game-list">
                        <a class="dropdown-toggle nav-link js-scroll-trigger header-title" data-toggle="dropdown" href="#">الألعاب
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu game-menu text-center">
                            @foreach($categories as $category)
                                @if(count($category->games))
                                    <li class="nav-item header-title"><a href="#category{{ $category->id }}" class="nav-link js-scroll-trigger">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @foreach($categories as $category)
                        @if(count($category->games))
                            <li class="nav-item header-title"><a href="#category{{ $category->id }}" class="nav-link js-scroll-trigger game-link">{{ $category->name }}</a></li>
                        @endif
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger header-title" href="#about">عن عرب جيمز</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger header-title" href="{{ route('unsubscribe') }}">إلغاء الإشتراك</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger header-title" href="{{ route('logout') }}">تسجيل خروج</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger header-title" href="{{ route('subscribe') }}">إشترك</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger header-title" href="{{ route('login') }}">تسجيل دخول</a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>


@yield('content')



@include('about')


@include('layouts.footer')

<!-- Bootstrap core JavaScript -->

<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Contact form JavaScript -->
<script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('js/contact_me.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('js/agency.min.js') }}"></script>
<script src="{{ asset('js/slider.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>