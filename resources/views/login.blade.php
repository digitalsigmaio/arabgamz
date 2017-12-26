@extends('layouts.master')

@section('content')

    <div class="row login-header">
        <div class="col-lg-4 mx-auto login-form" dir="rtl">
            <form id="loginForm" action="login" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input class="form-control" id="number" name="number" type="text" placeholder="رقمك *" required data-validation-required-message=".من فضلك أدخل رقمك">
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
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection