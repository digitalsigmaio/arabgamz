@extends('layouts.subMaster')


@section('content')
    <div class="col-md-6 mx-auto greeting-card">
        <div class="intro-text">
            <div class="intro-lead-in">عفوا</div>
            <div class="intro-heading">
                لقد تجاوزت عدد المرات المسموح التحميل بها فى يوم واحد
            </div>

        </div>
    </div>

    <!-- Subscribe -->
    <div class="col-lg-4 mx-auto login-form" dir="rtl">
        <div id="loginForm">
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <a class="btn btn-primary btn-xl" href="{{ route('home') }}">الذهاب الى الرئيسية</a>
                </div>
            </div>
        </div>
    </div>
@endsection