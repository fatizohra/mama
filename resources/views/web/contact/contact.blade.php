@extends('layouts.app')
@section('title')

    Contact Us
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
                       <h3><b>Contact Us</b></h3>
                    <hr>
                {!! Form::open(['url' =>'/contact', 'method'=>'post']) !!}
                        @include('web.contact.form')
                {!! Form::close() !!}
                    </div>

                </div>

            </div>


        </div>

    </div>
@endsection



