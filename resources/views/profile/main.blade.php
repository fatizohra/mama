@extends('layouts.app')
@section('title')
    {{ $profile->user->fullName()}}

@endsection
@section('header')
    <style>
        .imgpencil {
            position: absolute;
            margin-bottom: 100%;
            margin-left: 80%;
            transform: translate(-50%, -400%);
        }

        .listprofile {
            display: inline-block;
            padding: 0 0px;
            border-right: 1px solid #d4dbe0;
        }

        .dropdown-menu {
            min-width: 120px;
            left: -30px
        }

        .dropdown-menu a {
            cursor: pointer;
        }

        .dropdown-divider {
            height: 1px;
            margin: .5rem 0;
            overflow: hidden;
            background-color: #eceeef;
        }

        .user_name {
            font-size: 18px;
            font-weight: bold;
            text-transform: capitalize;
            margin: 3px
        }
        .all_posts {
            background-color: #fff;
            padding: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            -webkit-box-shadow: 0 8px 6px -6px #666;
            -moz-box-shadow: 0 8px 6px -6px #666;
            box-shadow: 0 8px 6px -6px #666;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
@endsection
@section('content')
    {{--<div style="width:100%; height:80px; background-color:#009688">--}}
    {{--</div>--}}
    <div class="container">
        <div class="row profile">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row" style="margin-left:100px">
                            <div class="col-md-10 col-xs-10">
                                <div class="col-md-2 col-xs-4">
                                    <a href="{{ url ('/profile') }}/{{$profile->username }}" title="Profile">
                                        <img id="newProfileImg" src="{{ checkIfImageExists($profile->user->image)  }}"
                                             style="cursor:pointer; width: 100px; height:100px;" alt="avatar"
                                             class="img-circle">
                                    </a>
                                </div>
                                <div class="col-md-8 col-xs-8">
                                    <h3 style="color:#000000"><b>{{ $profile->user->fullName()}} </b></h3>
                                    <span class="icon"><i class="fa fa-map-marker"></i>
                                        @if (!empty($profile->location))
                                            {{ $profile->location}},
                                        @endif
                                        {{ $profile->user->country->name}}
                                    </span>
                                    <p>
                                        @if($followerCount>0)
                                            <a href="#follower" class="btn btn-sm btn-green" data-toggle="modal">
                                                <span class="label label-info"> {{$followerCount}} Followers</span></a>
                                        @else
                                            <span class="label label-info">  {{$followerCount}} Followers</span>
                                        @endif

                                        @if($followingCount>0)
                                            <a href="#following" class="btn btn-sm btn-green" data-toggle="modal">
                                                <span class="label label-warning"> {{$followingCount}} Following</span></a>
                                        @else
                                            <span class="label label-warning"> {{$followingCount}} Following</span>

                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <div class="profile-userbuttons">
                                        @if ($profile->user->id != Auth::user()->id)
                                            <follower profile_user_id="{{ $profile->user->id }}"></follower>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-10">
                                    @if (!empty($profile->about))
                                        <hr style="width:300px;">
                                        {{ $profile->about}} <br>
                                    @endif
                                </div>
                                <hr style="width:300px;color:#000000">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="productbox">
                            <div class="panel panel-primary" style="top:15px;">
                                <div class="panel-heading" style="background-color:#ffffff">
                                    <div class="row">
                                        <div class="col-md-10 col-xs-10">
                                            <h3 class="panel-title" style="color:#000000;"><i class="fa fa-bullhorn"
                                                                                              aria-hidden="true"
                                                                                              style="margin:5px;"></i>Oppties
                                            </h3>
                                        </div>
                                        @if(Auth::user()->id == $profile->user->id)
                                            <div class="col-md-2 col-xs-2 text-right">
                                                <a href="#createitems" data-toggle="modal" title="add new deal">
                                                    <i class="fa fa-plus" style="font-size: 25px;"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(count($myItems)>0)

                                            @foreach($myItems as $key => $itm)
                                                <div class="col-md-3 col-xs-6">
                                                   <div class="productbox">
                                                       <a href="{{ url('/oppty/view/'.$itm->id)}}" title="{{ $itm->title }}">
                                                            <img id="newProfileImg" src="{{ url('/website/thumb/'.$itm->image) }}" class="img-responsive">
                                                        </a>
                                                        <a href="{{ url('/oppty/view/'.$itm->id)}}" class="post-title" title="{{ $itm->title }}">
                                                            <h4> {!! str_limit(ucwords( $itm->title),36) !!}</h4>
                                                        </a>
                                                        <div class="user-post">
                                                            <a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}">
                                                                <img src="{{ checkIfImageExists($itm->user->image) }}" alt=""
                                                                     class="user-img" style="cursor:pointer; border:2px solid #FF8A80;">
                                                            </a>

                                                            <span><a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}"
                                                                     style="color: #262626; font-family: Conv_helveticaneuecyr-bold;">
                                                                      {!! str_limit(ucwords($itm->user->fullName()),17) !!}
                                                            </a></span>-
                                                            <span><small><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $itm->created_at->diffForHumans()  }}</small></span>
                                                            <br>
                                                            <span class="icon" style="margin-left:30px;">
                                                                <small><i class="fa fa-map-marker"></i>
                                                                    @if (!empty($itm->user->location))
                                                                        {{ $itm->user->location}},
                                                                    @endif
                                                                    {{ $itm->user->country->name}}</small>
                                                            </span>
                                                        </div>
                                                            <hr>
                                                            {{--<span style="padding:20px">--}}

                                                            @if($itm->user_id == Auth::user()->id)
                                                                <div class="col-md-1 pull-right">

                                                                    <!-- delete button goes here -->
                                                                    <a href="#" data-toggle="dropdown" style="font-size:15px;"><i class="fa fa-cog"></i></a>
                                                                    <div class="dropdown-menu">
                                                                        <li>
                                                                            <a role="button" data-toggle="modal"
                                                                               data-target="#edititems{{$itm->id}}">
                                                                                Edit
                                                                            </a>
                                                                        </li>
                                                                        <div class="dropdown-divider"></div>
                                                                        <li>
                                                                            <a role="button" data-toggle="modal"
                                                                               data-target="#deleteitem{{$itm->id}}">
                                                                                Delete
                                                                            </a>
                                                                        </li>

                                                                    </div>
                                                                </div>
                                                           <div class="clearfix"></div>
                                                           <br>


                                                           @include('web.modals.edit.modal_item',['submitTextButton' => 'Save'])
                                                                    @include('web.modals.delete.modal_item')
                                                            @endif
                                                            {{--</span>--}}

                                                    </div>
                                                </div>
                                            @endforeach
                                                <div class="clearfix"></div>
                                                <br>
                                                <div class="text-center">
                                                    {{  $myItems->appends(Request::except('page'))->render() }}
                                                </div>

                                    @else
                                        No results found.
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.modals')
    @include('includes.followermodals')
    @include('web.modals.create.modal_item',['submitTextButton' => 'Save'])
@endsection

@section('js')
    <script>
        $('#createitems').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
        });
        @if (count($errors) > 0)
            $('#createitems').modal('show');
        @endif

    </script>
@endsection


@section('footer')
    @include('includes.footer')
@endsection


