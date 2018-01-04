@extends('layouts.subMaster')


@section('content')
    <div class="col-md-6 mx-auto greeting-card">
        <div class="intro-text" dir="rtl">
            <h1 class="">إلغاء الإشتراك</h1>
            <div class="intro-heading ">
                هل أنت متأكد من أنك تريد إلغاء الإشتراك نهائيا
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>أسم المشغل</h3>
                    <h3>رقم التليفون</h3>
                </div>
                <div class="col-md-6">
                    <h3>{{ $operator }}</h3>
                    <h3>{{ $user->ani }}</h3>
                </div>
            </div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{ route('unsubscribeUser') }}">إلغاء الإشتراك</a>
            <a class="btn btn-success btn-xl text-uppercase js-scroll-trigger" href="{{ route('home') }}">الرجوع الى الرئيسية</a>
        </div>
    </div>
@endsection