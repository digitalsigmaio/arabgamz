<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>عرب جيمز دوت كوم</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
    <link href="{{asset('css/agency.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/subscribe.css') }}">
    <link rel="icon" href="favicon.png">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style type="text/css" rel="stylesheet">
        .fullscreen-bg {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            z-index: -100;
        }

        .fullscreen-bg__video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (min-aspect-ratio: 16/9) {
            .fullscreen-bg__video {
                height: 300%;
                top: -100%;
            }
        }

        @media (max-aspect-ratio: 16/9) {
            .fullscreen-bg__video {
                width: 300%;
                left: -100%;
            }
        }

    </style>
	
	<!-- =======================================================
      Author: GMS Group
      Author URL: https://gms-group.company
	  Developer: Mohamed Ibrahim
	  E-Mail: m.sayed@gmsproduction.com
    ======================================================= -->

</head>

<body id="page-top">

<div class="placeholder">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Arab Games</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive" dir="rtl">
                <ul class="navbar-nav text-right ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#">الرئيسية</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}">خروج</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row" dir="rtl">
            <div class="col-md-4">
                <span class="copyright">جميع الحقوق محفوظة لشركة عرب جيمز &copy;</span>
            </div>

            <div class="col-md-8">
                <p class="terms-of-use">
                    سوف تقوم بالاشتراك فى خدمة العبها مقابل 2 جنيه يوميا.
                    لالغاء الاشتراك: لعملاء اورانج ارسل STOP ARABGAMZ الى 5030 و لعملاء فودافون ارسل STOP ARABGAMZ الى 6699 و لعملاء اتصالات ارسل STOP AR الى 4565.
                    لالغاء الاشتراك من الموقع قم بالدخول الى http://www.arabgamz.com/unsubscribe و اضغط الغاء الاشتراك.
                    لأية استفسارات يرجى التواصل معانا على support@arabgamz.com
                </p>
            </div>
        </div>
    </div>
</footer>


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
<script src="{{ asset('js/subscribe.js') }}"></script>
</body>

</html>