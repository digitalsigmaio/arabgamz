@extends('layouts.subMaster')

@section('content')
    <div class="col-lg-4 col-md-6 mx-auto login-form" dir="rtl">
        <form id="subscribeForm" action="{{ route('request') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="requestId" value="{{ $requestId }}">
                    <input type="hidden" name="ani" value="{{ $ani }}">
                    <input type="hidden" name="operator_id" value="{{ $operator_id }}">
                    <div class="form-group" style="color: #fff;text-align: right">
                        <label for="pinCode">أدخل ال Pin Code الذي يصل على رقمك لتأكيد الإشتراك</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="pinCode" name="pinCode" type="text" placeholder="كود التفعيل" required data-validation-required-message=".من فضلك أدخل كود التفعيل">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-primary btn-xl" type="submit">تأكيد الإشتراك</button>
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