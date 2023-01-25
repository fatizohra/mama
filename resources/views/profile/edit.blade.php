@extends('layouts.app')
@section('title')

    Edit Settings
@endsection
@section('header')
    <link href="{{ asset('src/css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="container" style="width:1260px;">

            @if(Session::has('message'))

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="alert alert-success" id="mes">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                </div>

            @endif

            <div class="row profile">
              @include('includes.profilesidebar')


                <div class="col-md-8 col-xs-8">
                    <div class="productbox" style="padding:15px">
                        <h3><b>Profile</b></h3>
                        <hr>
                            {!! Form::model( $user, ['url' => '/editSettings' , 'method' => 'patch','files' =>true]) !!}
                               @include('profile.form')
                            {!! Form::close() !!}

                    </div>
                    <div class="productbox" style="padding:15px">
                        <div class="text2">

                            <div class="col-md-12">
                                <label class="control-label" for="email">Account</label><br>
                                <a class="btn btn-danger btn-destroy" role="button" data-toggle="modal"
                                    data-target="#desactivateaccount">
                                    Desactivate Account
                                </a>

                            </div>
                        </div>
                        <div class ="clearfix"></div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('web.modals.delete.modal_account')
@endsection



