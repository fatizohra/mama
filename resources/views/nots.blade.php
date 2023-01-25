@extends('layouts.app')

@section('title')
    Notifications
    |
@endsection

@section('content')
    <div class="container">
        <div class="row profile">
            <div class="col-md-8">
                <div class="m">
                     <div class="panel panel-default">
                    <div class="panel-heading text-center">Notifications</div>

                    <div class="panel-body">
                        @if(count($nots)>0)
                        <ul class="list-group">
                            @foreach($nots as $not)
                                <li class="list-group-item" style="padding:10px;border-bottom: 1px solid #efefef;" onmouseover="this.style.backgroundColor='#efefef'" onmouseout="this.style.backgroundColor=''">

                                    <div class="row">
                                        <a href="{{ url ('/profile') }}{{'/'}}{{ $not->data['username']}}">
                                            <div class="col-md-2">
                                                <img src="{{checkIfImageExists(  $not->data['image']) }} " width="50px" height="50px"
                                                     style=" margin-left:10px;"
                                                     class="img-circle img-user text-center"/>
                                            </div>

                                            <div class="col-md-8">
                                                <b style="color:#6b9dbb; font-size:90%"> {{ucwords($not->data['firstname'])}} {{ucwords($not->data['lastname'])}}</b>
                                                <span style="color:#000; font-size:90%">{{ $not->data['message'] }}</span>
                                                <br/>
                                                <small style="color:#90949C"> <i aria-hidden="true" class="fa fa-users"></i>
                                                    {{date('F j, Y', strtotime($not->created_at))}}
                                                    at {{date('H: i', strtotime($not->created_at))}}</small>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="pull-right">
                                                <a href="{{url('/deleteNot/'.$not->not_id)}}" class="pull-right">X</a>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                        @else

                            <div class="col-md-10" style="margin-left:15px;">
                                No notifications found.
                            </div>
                        @endif
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

