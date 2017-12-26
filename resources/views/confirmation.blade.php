@extends('layouts.subMaster')

@section('content')
    <div class="col-md-6 mx-auto greeting-card">
        <div class="intro-text" dir="rtl">
            <h1 class="">تأكيد إلغاء الإشتراك</h1>
            <div class="intro-heading text-uppercase">
                المشغل الخاص بكم هو إتصالات
            </div>
            <div class="intro-heading text-uppercase">
                رقم التليفون الخاص بك هو 201125512200
            </div>
            <div class="intro-heading text-uppercase">
                لإلغاء الأشتراك أدخل كود الإلغاء ثم إضغط على تأكيد الإلغاء
            </div>
            <div class="intro-heading text-uppercase">
                <input type="text" class="form-control" placeholder="كود الإلغاء *">
            </div>
            <div class="btn-unsubscribe">
                <a class="btn btn-danger btn-xl text-uppercase js-scroll-trigger" href="#services">تأكيد الإلغاء</a>
                <a class="btn btn-success btn-xl text-uppercase js-scroll-trigger" href="#services">رجوع</a>
            </div>

        </div>
    </div>
@endsection