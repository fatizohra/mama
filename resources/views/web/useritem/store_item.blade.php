@extends('layouts.app')
@section('title')
    Add item
@endsection

@section('header')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<style>
    .wizard {
        margin: 20px auto;
        background: #fff;
    }

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 80%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }

    .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tab {
        width: 70px;
        height: 70px;
        line-height: 70px;
        display: inline-block;
        border-radius: 100px;
        background: #fff;
        border: 2px solid #e0e0e0;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 25px;
    }
    span.round-tab i{
        color:#555555;
    }
    .wizard li.active span.round-tab {
        background: #fff;
        border: 2px solid #5bc0de;

    }
    .wizard li.active span.round-tab i{
        color: #5bc0de;
    }

    span.round-tab:hover {
        color: #333;
        border: 2px solid #333;
    }

    .wizard .nav-tabs > li {
        width: 25%;
    }

    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: #5bc0de;
        transition: 0.1s ease-in-out;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 1;
        margin: 0 auto;
        bottom: 0px;
        border: 10px solid transparent;
        border-bottom-color: #5bc0de;
    }

    .wizard .nav-tabs > li a {
        width: 70px;
        height: 70px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
    }

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

    .wizard .tab-pane {
        position: relative;
        padding-top: 50px;
    }

    .wizard h3 {
        margin-top: 0;
    }

    @media( max-width : 585px ) {

        .wizard {
            width: 90%;
            height: auto !important;
        }

        span.round-tab {
            font-size: 16px;
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard .nav-tabs > li a {
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 35%;
        }
    }
</style>

@endsection

@section('content')
    <style>
        .myContent{
        }
    </style>

    <div class="greyBg">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{url('/')}}">Home </a></li>
                                <li><span class="dot">/</span>
                                    <a href="{{url('/home')}}"> {{Auth::user()->lastname}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row top25">
                    <div class="panel itemBox">
                        <div class="prod"><h2 align="left">My Account</h2></div>



                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if(isset($link))
                                <div class="myContent">

                                    <ul class="nav nav-tabs">
                                        @if($link=="profile")
                                            <li class="active"><a href="#profile" data-toggle="tab">profile</a></li>
                                            <li><a href="#myorders" data-toggle="tab">My orders</a></li>
                                            <li><a href="#changepassword" data-toggle="tab">change Password</a></li>

                                        @elseif($link=="myorders")
                                            <li ><a href="#profile" data-toggle="tab">profile</a></li>
                                            <li class="active"><a href="#myorders" data-toggle="tab">My orders</a></li>
                                            <li><a href="#changepassword" data-toggle="tab">change Password</a></li>

                                        @elseif($link=="changepassword")
                                            <li ><a href="#profile" data-toggle="tab">profile</a></li>
                                            <li><a href="#myorders" data-toggle="tab">My orders</a></li>
                                            <li class="active"><a href="#changepassword" data-toggle="tab">change Password</a></li>
                                        @else
                                            something else
                                        @endif

                                    </ul>

                                    <div class="tab-content col-md-6">
                                        <div id="profile" class="tab-pane fade in active">

                                            your {{$link}} data
                                        </div>

                                        <div id="myorders" class="tab-pane fade in">
                                            myorders tab
                                        </div>

                                        <div id="changepassword" class="tab-pane fade in">
                                            changepassword tabe
                                        </div>

                                    </div>
                                </div>
                            @else
                                <div class="myContent">

                                    <ul class="nav nav-tabs">

                                        <li class="active"><a href="#profile" data-toggle="tab">profile</a></li>
                                        <li><a href="#myorders" data-toggle="tab">My orders</a></li>
                                        <li><a href="#changepassword" data-toggle="tab">change Password</a></li>

                                    </ul>

                                    <div class="tab-content col-md-6">
                                        <div id="profile" class="tab-pane fade in active">

                                            <form action="" method="post">

                                               jhvghghjg
                                            </form>
                                        </div>

                                        <div id="myorders" class="tab-pane fade in">
                                            myorders tab
                                        </div>

                                        <div id="changepassword" class="tab-pane fade in">
                                            changepassword tabe
                                        </div>

                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            //Initialize tooltips
            $('.nav-tabs > li a[title]').tooltip();

            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });
        });

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }
    </script>
@endsection
