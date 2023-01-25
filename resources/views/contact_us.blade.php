@extends('layouts.app')
@section('title')
    | Contact Us
@endsection
@section('header')

@endsection
@section('content')

    <div class="container">
        <div id="content">
            <div class="container">
                <div class="row" style="background:#FF8A80; padding:20px;">
                    <div class="col-md-12 text-center">
                       <b style="color:#ffffff;font-size: 30px;"> HOW CAN WE HELP YOU ? </b>
                    </div>
                </div>
                <div class ="clearfix"></div>
                <br>
                <div class="row">
                    <div class="productbox" style="padding:15px;">
                        <h3><b>Contact Us</b></h3>
                        <hr>
                    <p>
                        {!! Form::open(['url' =>'/contact', 'method'=>'post']) !!}
                            @include('web.contact.form')
                        {!! Form::close() !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection