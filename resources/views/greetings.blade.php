@extends('layouts.subMaster')


@section('content')
    <div class="col-md-6 mx-auto greeting-card">
        <div class="intro-text">
            <div class="intro-lead-in">تهانينا</div>
            <div class="intro-heading">
                <div class="col-md-12">تم إشتراككم بنجاح في عرب جيمز دوت كوم للألعاب</div>
                <div class="row">
                    <div class="col-md-6 highlight">{{ $ani }}</div>
                    <div class="col-md-6">أسم المستخدم الخاص بكم</div>
                </div>
                <div class="row">
                    <div class="col-md-6 highlight">{{ $password }}</div>
                    <div class="col-md-6">كلمة السر</div>
                </div>
                <div class="col-md-12">تم إرسال رسالة على هاتفك بها كلمة السر</div>
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