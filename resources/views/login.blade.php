@extends('layouts.subMaster')

@section('content')

        <div class="col-lg-4 col-md-6 mx-auto login-form" dir="rtl">
            <form id="loginForm" action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input class="form-control" id="number" name="number" type="text" placeholder="أسم المستخدم *" required data-validation-required-message=".من فضلك أدخل رقمك">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" name="password" type="password" placeholder="كلمة السر *" required data-validation-required-message="من فضلك أدخل كلمة السر.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">

                        <button class="btn btn-primary btn-xl" type="submit">دخول</button>
                        <a href="{{ route('forgotPassword') }}" class="btn btn-danger btn-xl">نسيت كلمة السر</a>

                    </div>
                </div>
            </form>

            @if($errors->any())
                <hr>
                <div class="row">
                    <div class="alert alert-dismissible alert-danger col-md-12" style="text-align: right">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>


@endsection