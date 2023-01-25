@extends('layouts.app')
@section('title')
    {{$itemInfo->title}}
    |
@endsection
@section('header')

    <style>
        body {
            background: #F9F9F8;
        }
        .heart{
            color:#ffffff;
            font-size: 60px;
            text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black;
        }

    </style>
@endsection
@section('content')
    <a href="{{'/home'}}"><i class="fa fa-chevron-circle-left" style="font-size:24px; margin-left:10px"></i></a>
    <div class="container">
        <div class="row">
            <div class="col-md-8 ">

                <div class="productbox" style="margin-bottom:70px; padding:5px 30px 5px">
                    <favourite profile_user_id="{{ $itemInfo->user->profile->user_id }}"
                              item_id="{{$itemInfo->id}}"></favourite>
                    <h2 style="color:#000000;padding:15px;">{{ ucwords($itemInfo->title) }}</h2>

                    <div class="user-post">
                        <img src="{{ checkIfImageExists($itemInfo->user->image) }}" alt=""
                             class="user-img">
                        <span> By <a href="{{ url ('/profile') }}/{{ $itemInfo->user->profile->username }}"
                                     style="color: #262626; font-family: Conv_helveticaneuecyr-bold;"> {{$itemInfo->user->fullName()}}</a>
                            - <small> {{$itemInfo->created_at->diffForHumans()}}</small>

                                  <div style="float:right;">
                                             <follower profile_user_id="{{ $itemInfo->user->profile->user_id }}"
                                                       user_id="{{Auth::user()->id}}"></follower>
                                  </div>
                         </span>
                        <span class="icon" style="margin-left:30px;"><br>
                                <small><i class="fa fa-map-marker"></i>
                                    @if (!empty($itm->user->location))
                                        {{ $itemInfo->user->location}},
                                    @endif
                                    {{ $itemInfo->user->country->name}}
                                 </small>
                             </span>
                    </div>
                        <img src="{{ url('/website/thumb/'.$itemInfo->image)}}" width="900px"
                             class="img-responsive">

                    <p style="padding:15px;">{{ $itemInfo->description }}</p>

                    <div class="col-md-4">
                        <small>  @if (!empty($itemInfo->site))
                                <a href="{{ $itemInfo->site}}" target="_blank" class="btn btn-default btn-block"><i class="fa fa-external-link"></i> Visit the website</a>
                            @endif</small>
                    </div>
                    <br>
                    <hr>
                    <comment item_id="{{ $itemInfo->id }}" user="{{Auth::user()}}"></comment>
                </div>


            </div>

            <div class="col-md-3">
                <div class="productbox text-center" style="height:50px;">
                    <h4><b>Similar items</b></h4>
                </div>
            </div>
                @include('web.item.sharefile', ['item' => $suggested_items])


    </div>
    </div>
@endsection

