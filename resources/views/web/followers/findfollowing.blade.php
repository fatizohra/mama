@extends('layouts.app')
@section('title')

     network
    |

@endsection

@section('header')
    <style>
        .follower_box {
            font-family: 'Open Sans', Arial, sans-serif;
            position: relative;
            display: inline-block;
            margin: 40px 8px;
            min-width: 230px;
            max-width: 315px;
            width: 100%;
            color: #000;
            text-align: left;
            font-size: 16px;
            background: #fff;
            border-radius: 5px;
        }
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
            /*padding: 15px;*/
        }
        h3 {
            margin: 10px;
            font-size: 1.1em;
            font-weight: normal;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row profile">

            <div class="col-md-12">
                <div id="container-mix" class="row _post-container_">
                    <div class="row">

                            <div class="col-md-6" style="margin-left:45px;">
                                <div class="productbox">
                                    <div class="input-group col-md-10 text-center" style="margin-left:35px;margin-top:20px">
                                        <form action="{{ url('/searchFollowing')}}" class="" method="get">
                                            {{ csrf_field() }}
                                            <div class="form-group">

                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               placeholder="Enter firstname, lastname, username or email address to follow"
                                                               name="search">
                                                        <span class="input-group-btn">
                                                        <button class="btn btn-danger" type="submit">
                                                            <span class=" glyphicon glyphicon-search"></span>
                                                        </button>
                                                        </span>
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if(count($users)>0)
                                <div class="productbox">
                                    <div class="profile-usermenu" id="userslist">
                                        @if($message!='')
                                            <span style="margin-left:10px;color:#999;font-size:12px"><b>{{ $message }}</b></span>
                                         @else
                                        @endif
                                          <ul class="nav">
                                            @foreach($users as $user)
                                                <li class="{{url('/profile')}}/" >
                                                    <a href="{{ url ('/profile') }}/{{$user->profile->username }}">
                                                        <div class="row">
                                                            <div class="col-md-2 pull-left">
                                                                <a href="{{ url ('/profile') }}/{{$user->profile->username }}" title="Profile">
                                                                        <img src="{{ checkIfImageExists($user->pic) }}"
                                                                         width="48px" height="48px"
                                                                         style="margin-bottom:5px; margin-left:10px;"
                                                                         class="img-circle img-user"/>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <a href="{{ url ('/profile') }}/{{$user->profile->username }}" title="Profile">
                                                                   {!! str_limit(ucwords($user->fullName()),36) !!}
                                                                </a><br>
                                                                <span class="icon"><small><i class="fa fa-map-marker"></i>
                                                                 @if (!empty($user->profile->location))
                                                                {{ $user->profile->location}},
                                                                      @endif
                                                                {{ $user->country->name}}</small>
                                                                </span>

                                                            </div>
                                                            <div class="col-md-2">
                                                                <follower profile_user_id="{{ $user->id }}"
                                                                          user_id="{{Auth::user()->id}}"></follower>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="clearfix"></div>
                                        <br>
                                        <div class="text-center">
                                            {{  $users->appends(Request::except('page'))->render() }}
                                        </div>


                                    </div>
                                </div>
                            @else

                                <div class="productbox text-center">
                                    No results found.
                                </div>
                                @endif
                            </div>

                        <div class="col-md-4">
                            <div class="productbox text-center" style="padding-top:20px">
                                Let other users follow you <br>
                                Post an Offer in few minutes<br>
                                <div class="col-xs-6 text-center" style="margin-left:80px;margin-top:10px">
                                    <a href="{{ url ('/profile') }}/{{ Auth::user()->profile->username }}" class="btn btn-azure btn-block"><i class="fa fa-user-plus"></i> Post Job</a>
                                </div>
                                <div class ="clearfix"></div>
                                <br>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $("#btn").on("click", function(e) {
            e.preventDefault(); // in some browsers a button submits if no type=
            $(this).siblings("div.userslist").show();
        });
//        $(document).ready(function () {
////            $("#userslist").hide();
//            $("#btn").click(function () {
//                $("#userslist").toggle();
//            });
//        });

    </script>
@endsection