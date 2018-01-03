@extends('layouts.subMaster')

@section('content')
    <div class="fullscreen-bg">
        <video loop muted autoplay poster="{{ asset('img/videoframe.jpg') }}" class="fullscreen-bg__video">
            <source src="{{ asset('img/subscribe.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="greeting-card">
        <div class="intro-heading">حمل أقوى ألعاب الأكشن و المغامرة</div>
    </div>

    <!-- Subscribe -->
    <div class="col-lg-4 mx-auto login-form" dir="rtl">
        <div id="loginForm">
            <div class="row">

                <div class="clearfix"></div>
                <div class="col-lg-6 text-center">
                    <a class="btn btn-success btn-xl" href="{{ route('login') }}">تسجيل دخول</a>
                </div>
                <div class="col-lg-6 text-center">
                    <a class="btn btn-primary btn-xl" href="{{ route('subscription') }}">إشترك</a>
                </div>
            </div>

        </div>
    </div>

@endsection