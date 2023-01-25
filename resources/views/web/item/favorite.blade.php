@extends('layouts.app')
@section('title')
     deals
    |
@endsection
@section('header')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="productbox">
                    <div class="panel panel-primary" style="top:15px;">
                        <div class="panel-heading" style="background-color:#ffffff">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="panel-title" style="color:#000000;"><i class="fa fa-heart-o "
                                                                                      aria-hidden="true"
                                                                                      style="margin:5px;color: #FF8A80;"></i>My favorite Oppties
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(count($favoriteitems)>0)
                                    @include('web.item.sharefile', ['item' => $favoriteitems])
                                <div class="clearfix"></div>
                                <br>
                                <div class="text-center">
                                    {{  $favoriteitems->appends(Request::except('page'))->render() }}
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
@endsection
