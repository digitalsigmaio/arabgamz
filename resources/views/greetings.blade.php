@extends('layouts.subMaster')


@section('content')
    <div class="col-md-6 mx-auto greeting-card">
        <div class="intro-text">
            <div class="intro-lead-in">تهانينا</div>
            <div class="intro-heading">
                تم إشتراككم بنجاح في منصة عرب جيمز دوت كوم
                للألعاب<br> أسم المستخدم الخاص بكم
                {{ $ani }} <br>
                تم إرسال رسالة على هاتفكم رقم {{ $ani }} تحتوي على كلمة المرور
                للدخول على الموقع
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