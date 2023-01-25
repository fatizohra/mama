@extends('layouts.app')
@section('title')

    Settings
    |
@endsection
@section('header')
    <link href="{{ asset('src/css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="container" style="width:1260px;">

            <div class="row profile">
              @include('includes.profilesidebar')

                <div class="col-md-8">
                    <div class="productbox" style="padding:15px;">
                        <h3><b>Change Password</b></h3>
                        <hr>
                        {!! Form::open( ['url' => '/changePassword', 'method' => 'post']) !!}


                        <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter your old password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class ="clearfix"></div>
                            <br>

                            <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">
                                 <div class="col-md-6">
                                <input type="password" class="form-control" name="newpassword" placeholder="Enter your new password">

                                @if ($errors->has('newpassword'))
                                    <span class="help-block">
                                                         <strong>{{ $errors->first('newpassword') }}</strong>
                                     </span>
                                @endif
                            </div>
                            </div>

                        <div class ="clearfix"></div>
                        <br>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">
                                Change password
                            </button>
                        </div>
                        <div class ="clearfix"></div>
                        <br>

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>


        </div>

    </div>
@endsection


