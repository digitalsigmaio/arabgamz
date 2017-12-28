@extends('layouts.subMaster')

@section('content')
    <div class="col-lg-4 col-md-6 mx-auto login-form" dir="rtl">
        <form id="subscribeForm" action="{{ route('request') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-gourp msp-list">
                        <ul class="list-inline">
                            <li class="list-inline-item" value="vodafone" >
                                <input type="hidden" value="vodafone">
                                <div class="msp msp-vodafone"></div>
                            </li>
                            <li class="list-inline-item" value="orange" >
                                <input type="hidden" value="orange">
                                <div class="msp msp-orange"></div>
                            </li>
                            <li class="list-inline-item" value="etisalat" >
                                <input type="hidden" value="etisalat">
                                <div class="msp msp-etisalat"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <select name="operator" id="operator" class="form-control" style="padding: 5px">
                            <option id="orange" value="1">أورانج</option>
                            <option id="vodafone" value="2">فودافون</option>
                            <option id="etisalat" value="3">إتصالات</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="number" name="number" type="text" placeholder="رقمك *" required data-validation-required-message=".من فضلك أدخل رقمك">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-primary btn-xl" type="submit">إشترك</button>
                </div>
            </div>
        </form>
    </div>
@endsection