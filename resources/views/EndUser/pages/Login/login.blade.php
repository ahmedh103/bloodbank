@extends('enduser.includes.master',[
    'bodyClass' => 'signin-account'
    ])
@section('content')
<div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                </ol>
            </nav>
        </div>
        <div class="signin-form">
            <form id="login"  method="POST" action="{{ route('enduser.login') }}">
                @csrf
                <div class="logo">
                    <img src="{{ asset('enduser/imgs/logo.png') }}">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الجوال">
                    @error('phone')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                    @error('password')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                </div>

                <div class="row options">
                    <div class="col-md-6 remember">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                        </div>
                    </div>
                    <div class="col-md-6 forgot">
                        <img src="{{ asset('enduser/imgs/complain.png') }}">
                        <a href="#">هل نسيت كلمة المرور</a>
                    </div>
                </div>
                <div class="row buttons">
                    <div class="col-md-6 right">
                        <a href="javascript:void(0)"  onclick="document.getElementById('login').submit();">دخول</a>
                    </div>
                    <div class="col-md-6 left">
                        <a href="{{ route('enduser.register.page') }}">انشاء حساب جديد</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop