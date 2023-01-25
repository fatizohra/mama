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
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background-color:#ffffff">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="panel-title" style="color:#000000;"><i class="fa fa-tasks" aria-hidden="true" style="margin:5px;color:#FF8A80"></i>Posts</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12" style="background-color:#FF8A80; padding-bottom:15px">

                            <form action="{{ url('/items/search')}}" class="" method="get">
                                <div class="form-group" style="margin-left:60px;">
                                    {{--<search></search>--}}
                                    <div class="col-md-5" style="padding:1px;">
                                        <select class="form-control country_list" name="country_id">
                                            <option value="{{$country_id}}">Select country</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" @if($country_id == $country->id ) selected @endif> {{ ucwords($country->name) }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-5" style="padding:1px;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search"
                                                   placeholder=" Search" autocomplete="off" id="message" value="{{$search}}"/>

                                            <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit" style="background-color:#FF8A80;">
                                                       <span class="glyphicon glyphicon-search" style="color:#ffffff"></span>
                                                     </button>
                                               </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="clearfix"></div>
                        <br>
                        <div class="panel-body">
                              @include('web.item.sharefile', ['item' => $item])
                            <div class="clearfix"></div>
                            <br>
                                <div class="text-center">
                                    {{  $item->appends(Request::except('page'))->render() }}
                                </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
