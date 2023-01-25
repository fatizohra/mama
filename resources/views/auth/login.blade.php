@extends('layouts.app')

@section('title')
    Login
@endsection


@section('header')
    <style media="screen">
        {{--body{--}}
            {{--background: url(" {{checkIfImageExists(getSetting('main_slider'), '/website/slider/','/website/slider/')}}") no-repeat center;--}}
       {{--/*width: 100%;*/--}}
  {{--/*background:#ffffff;*/--}}
        {{--}--}}
        {{--.container {--}}
            {{--background: url(" {{checkIfImageExists(getSetting('main_slider'), '/public/website/slider/','/website/slider/')}}") no-repeat center;--}}
            {{--height: 100%;--}}
            {{--width: 100%;--}}
        {{--}--}}

    </style>
@endsection
@section('content')
    <div class="container">
            <div class="row vertical-offset-100">

                <div class="col-md-5 col-xs-7">
                    <div class="reg-form-container">
                              <div class="panel panel-default">

                                  <h1 class="header" title="{{getSetting()}}">{{getSetting()}}</h1>
                                   <div class="panel-body">

                                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                {{ csrf_field() }}
                                                <fieldset>
                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                                        <div class="col-lg-12">
                                                            <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                                        <div class="col-lg-12">
                                                            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                            <button type="submit" title="login" class="btn btn-warning btn-block" style="background:#FF8A80;">
                                                                Login
                                                            </button>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                                {{--<a class="btn btn-link" href="{{ url('/forgetPassword') }}">--}}
                                                                    {{--Forgot Password?--}}
                                                                {{--</a>--}}
                                                            <a href="{{ route('password.request') }}" class="btn btn-link need-help">Forgot Your Password? </a><span class="clearfix"></span>

                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                             </div>
                             <div class="panel panel-default">
                        <div class="text-center">
                           <p>Don't have an account?
                               <a href="{{ route('register') }}" title="join now">Join Now</a>
                           </p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-7 col-xs-5 profile">
                    <img src="{{checkIfImageExists(getSetting('main_slider'), '/website/slider/','/website/slider/')}}" style="width:100%;height:430px"/>
                </div>
                {{--<div class="col-md-7 profile">--}}
                    {{--<img src="{{checkIfImageExists(getSetting('main_slider'), '/website/slider/','/website/slider/')}}" style="width:100%;height:100px"/>--}}
                {{--</div>--}}
            </div>

    </div>
@endsection
@section('footer')
    @include('includes/footer')
@endsection
