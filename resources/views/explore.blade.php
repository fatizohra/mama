@extends('layouts.app')
@section('title')
    Explore
    |
@endsection
@section('header')
    <style>
        .user_img {
            max-width: 25%;
            margin-top: -15px;
            margin-left: 5%;
            margin-bottom: 15px;
            backface-visibility: hidden;
            vertical-align: top;
            border-radius: 5px;
        }

        .user_info {
            position: absolute;
            top: 0;
            left: 40%;
            right: 0;
            bottom: 0;
        }

        h3 {
            margin: 10px;
            font-size: 1.1em;
            font-weight: normal;
        }

        #nav .active a {
            color: #FF8A80;
            /*color:#f2a222;*/
            font-weight: bold;
            background-color: #eeeeee;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
    </style>
@endsection
@section('content')
    <div class="container" style="width:1260px;">
        <div class="row">
        <div class="col-md-12 col-xs-12">
            <ul class="nav navbar-nav navbar-right" id="nav">
                {{--<button class="btn btn-primary filter-button" data-filter="all">All</button>--}}
                <li class="{{setActive(['explore'])}}" style="margin-right:5px;margin-bottom:5px;">
                    <a href="{{url('/explore')}}" class="btn btn-default">All</a>
                </li>
                @foreach($categories as $category)
                    <li class="{{setActive(['byCategory',$category->id])}}" style="margin-right:5px;margin-bottom:5px;">
                        <a href="{{url('byCategory/'.$category->id)}}" class="btn btn-default"
                           title="{{ $category->name }}" data-filter="{{$category->name}}">{{ucwords($category->name)}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="profile">

            <div class="row profile">
                <div class="col-md-12">
                    <div id="container-mix" class="row _post-container_">
                            @include('web.item.sharefile', ['item' => $items])
                        <div class="clearfix"></div>
                        <br>
                        <div class="text-center">
                            {{  $items->appends(Request::except('page'))->render() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
