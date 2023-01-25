@extends('layouts.app')


@section('title')
    Register
@endsection
@section('header')
    <style media="screen">
        .header {
            margin: 22px auto 12px;
            background-position: 0 0;
            height: 51px;
            width: 175px;
        }
        .reg-form-container {
            background: #fff;
            box-shadow: 0 0 35px rgba(0,0,0, .4);
            padding: 20px 20px 20px 40px;
            border-radius: 6px;
            position: relative;
            min-height: 460px;
            z-index: 10;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-5 col-md-offset-3">
            <div class="reg-form-container">
                 <div class="panel panel-default">
                   <div class="header">
                          <h1 title="{{getSetting()}}">{{getSetting()}}</h1>
                        Get started - it's free
                    </div>
                     <div class ="clearfix"></div>
                     <br>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="text2{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" placeholder="First name" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                          </div>
                             <div class="text2{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                 <div class="col-md-6">
                                      <input id="lastname" type="text" class="form-control" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                 </div>
                            </div>
                        </div>
                        <div class ="clearfix"></div>
                        <br>
                        <div class="row">
                               <div class="text2 {{ $errors->has('email') ? ' has-error' : '' }}">
                                   <div class="col-md-12">

                                        <input id="email" type="email" placeholder= "Email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                   </div>
                             </div>
                        </div>
                        <div class ="clearfix"></div>
                        <br>
                        <div class="row">
                             <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">
                                 <div class=" col-md-12">
                                        <input id="password" type="password" placeholder="Password (6 or more characters)" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                 </div>
                        </div>
                        </div>
                        <div class ="clearfix"></div>
                        <br>
                        <div class="row">
                            <div class="text2">
                                <div class="col-md-12">
                                    <select class="form-control" name="country_id" required>
                                        <option>select country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" @if(isset($user))@if($country->id ==$user->country_id ) selected @endif @endif>{{ucwords($country->name)}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('country_id') }}</strong>
                                         </span>
                                    @endif
                                </div>
                            </div>


                        </div>
                        <div class ="clearfix"></div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning btn-block" style="background:#FF8A80;">
                                    Sign up
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                By clicking Join now, , you agree to our Terms & Privacy Policy.
                            </div>
                        </div>
                    </form>
                </div>
            </div>
             <div class="panel panel-default">
                <div class="text-center">
                    <p>have an account?
                        <a href="{{ route('login') }}">Log in </a>
                    </p>
                </div>
            </div>
          </div>
        </div>

    </div>
</div>

@endsection
@section('footer')
    @include('includes/footer')
@endsection
