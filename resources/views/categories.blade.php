@extends('layouts.app')
@section('title')

@endsection
@section('header')
    <style>
        .thumbnail {
            position: relative;
        }

        .caption {
            position: absolute;
            top: 45%;
            left: 0;
            width: 100%;
        }
        .select_category{width:100%;float:left;    position: relative;margin-bottom:30px;}
        .select_category .check-image{    position: absolute;    top: 50%;    left: 50%;    color: #0c800c;    font-size: 25px;    transform: translateX(-50%)translateY(-50%);
            background: #fff;-webkit-transform: translateX(-50%)translateY(-50%);-moz-transform: translateX(-50%)translateY(-50%);
            padding: 10px;}
        .cardHolder {
            display: flex;
            flex-flow: row wrap;
        }

        .card {
            flex: 1;
            margin: .5em;
            height: 100px;
            min-width: 100px;
            background-color: #fff;
            border-radius: 3px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: all .25s ease;
            animation: populate .5s ease-out normal backwards;
        }
        .card:hover {
            transform: scale(1.05);
            z-index: 1;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.2);
        }

        @keyframes populate {
            0% {
                transform: scale(0);
            }
        }
    </style>

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">


                {!! Form::open(['url' => '/home', 'method' => 'post']) !!}


                @foreach($categories as $category)

                <div class="col-md-3">
                    {{--<div class="productbox">--}}
                        <div class="select_category">
                            <div class="thumbnail text-center">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('/website/images/').'/'.$category->image}}" width="174px" height="145px" class="img-responsive">
                                    <span class="glyphicon check-image"></span>
                                    <div class="caption">
                                        <h4><b style=" color: #ffffff;">{{$category->name}}</b></h4>
                                    </div>
                                </a>
                            </div>

                        </div>
                    {{--</div>--}}
                </div>

                    {{--<?php--}}
                    {{--Auth::user()->unreadNotifications->markAsRead();--}}
                    {{--$nots= Auth::user()->notifications;--}}
                    {{--?>--}}
                    {{--@if($nots->count()>0)--}}
                    {{--<ul class="dropdown-menu profile-usermenu" role="menu" style="width:370px;--}}
                    {{--max-height:500px;--}}
                    {{--overflow-y :scroll; ">--}}

                    {{--@foreach($nots as $not)--}}
                    {{--<li style="padding:10px;border-bottom: 1px solid #efefef;" onmouseover="this.style.backgroundColor='#efefef'" onmouseout="this.style.backgroundColor=''">--}}

                    {{--<div class="row">--}}
                    {{--<a href="{{ url ('/profile') }}{{'/'}}{{ $not->data['username']}}">--}}
                    {{--<div class="col-md-2">--}}
                    {{--<img src="{{checkIfImageExists(  $not->data['image']) }} " width="30px" height="30px"--}}
                    {{--style=" margin-left:10px;"--}}
                    {{--class="img-circle img-user text-center"/>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-8">--}}
                    {{--<b style="color:green; font-size:90%"> {{ucwords($not->data['firstname'])}} {{ucwords($not->data['lastname'])}}</b>--}}
                    {{--<span style="color:#000; font-size:90%">{{ $not->data['message'] }}</span>--}}
                    {{--<br/>--}}
                    {{--<small style="color:#90949C"> <i aria-hidden="true" class="fa fa-users"></i>--}}
                    {{--{{date('F j, Y', strtotime($not->created_at))}}--}}
                    {{--at {{date('H: i', strtotime($not->created_at))}}</small>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-2">--}}
                    {{--<span class="pull-right">--}}
                    {{--<a href="{{url('/deleteNot/'.$not->not_id)}}" class="pull-right">X</a>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--</a>--}}
                    {{--</div>--}}

                    {{--</li>--}}

                    {{--@endforeach--}}

                    {{--</ul>--}}
                    {{--@endif--}}
                @endforeach

                {{--<li class="list-group-item">--}}
                {{--<a href="{{ url ('/profile') }}{{'/'}}{{ $not->data['username']}}">--}}
                {{--<img src="{{checkIfImageExists(  $not->data['image']) }} " width="30px" height="30px"--}}
                {{--style=" margin-left:10px;"--}}
                {{--class="img-circle img-user text-center"/>--}}
                {{--{{ucwords($not->data['firstname'])}} {{ucwords($not->data['lastname'])}}--}}
                {{--</a>--}}
                {{--&nbsp; {{ $not->data['message'] }}  <small>({{ $not->created_at->diffForHumans() }})</small>--}}
                {{--<span class="pull-right">--}}
                {{--<a href="{{url('/deleteNot/'.$not->not_id)}}" class="pull-right">X</a>--}}
                {{--</span>--}}
                {{--</li>--}}
                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
        $('.please-select').click(function(){
        //alert('dasdas');
        $(this).find('.check-image').toggleClass('glyphicon-ok')
        $(this).parent().siblings().find('.check-image').removeClass('glyphicon-ok');
        });
        });
    </script>
@endsection