@extends('layouts.app')
@section('title')
    All items
@endsection
@section('header')
    {{--{!! Html::style('css/main.css') !!}--}}
    <style>
        /*.itemsearch{*/
        /*margin-botton:10px;*/
        /*}*/
        /*.breadcrumb{*/
        /*backgroun-color:#FFFFFF;*/
        /*}*/
    </style>
@endsection
@section('content')
    <div class="container" style="width:1260px;">
  <div class="row">
        <div class="col-md-12" style="margin-top:10px;margin-bottom:5px;margin-left:30px">
            <form method="get" action="">

                {{ csrf_field() }}

                <div class="form-group">

                    <div class="col-md-5" style="padding:1px;">
                        <input type="text" class="form-control" name="search"
                               placeholder=" looking for?" autocomplete="off" style="height: 40px;"/>
                    </div>

                    <div class="col-md-4" style="padding:1px;">
                        <select class="form-control country_list" name="country_id" required style="height: 40px;">
                            <option>select country</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}" @if(isset(Auth::user()->id))@if($country->id ==Auth::user()->country_id ) selected @endif @endif>{{ucwords($country->name)}}</option>
                            @endforeach
                        </select>
                        {{--<select  name="city" id="city" required="" class="form-control" style="height: 40px;">--}}
                            {{--<option value="0" selected="">Country</option>--}}

                        {{--</select>--}}


                    </div>

                    {{----}}
                    <div class="" style="padding:1px;">

                        <button type="submit" style="background:#FF8A80; width:150px; height: 40px;">
                            <bold style="color:#ffffff">Find</bold>
                        </button>
                    </div>
                </div>


            </form>
        </div>
  </div>





        {{--<div class="input-group col-md-12" style="margin-left:100px; margin-top:5px">--}}
            {{--<form action="/search" class="" method="get">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="col-md-8">--}}
                {{--<div class="form-group">--}}
                        {{--<div class="input-group">--}}
                            {{--<div class="row">--}}
                                    {{--<div class="col-md-7">--}}
                                    {{--<input type="text" class="form-control" name="search"--}}
                                       {{--placeholder=" looking for?" autocomplete="off"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-3" style="padding:1px;">--}}
                                        {{--<select title="category" class="form-control text-center" name="category" style="width:auto;">--}}
                                            {{--<option>All</option>--}}
                                            {{--<option value="0">Items</option>--}}
                                            {{--<option value="1">People</option>--}}

                                        {{--</select>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-2">--}}
                                         {{--<span class="input-group-btn">--}}
                                             {{--<button class="btn btn-default" type="submit">--}}
                          {{--<span class=" glyphicon glyphicon-search"></span>--}}
                     {{--</button>--}}
                                            {{--</span>--}}
                                    {{--</div>--}}
                            {{--</div>--}}

                    {{--</div>--}}

                    {{--<input type="text" class="form-control"--}}
                    {{--placeholder="Search for Products, Brands and more" name="search">--}}


                {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}

        <div class="row profile">
            <div class="col-md-12">
                <div id="container-mix" class="row _post-container_">
                    <div class="">
                        {{--<section class="itemAll endless-pagination" data-next-page="{{ $itemAll->nextPageUrl() }}">--}}
                             @include('web.item.sharefile', ['item' => $itemAll])
                            {{--<div class="text-center">--}}
                                {{--{!! $itemAll->render() !!}--}}
                            {{--</div>--}}
                        {{--</section>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{--<script>--}}
        {{--$(document).ready(function() {--}}

            {{--$('body').on('click', '.pagination a', function (e) {--}}

                {{--e.preventDefault();--}}
                {{--var url = $(this).attr('href');--}}

                {{--$.get(url, function (data) {--}}
                    {{--$('.itemAll').html(data);--}}
                {{--});--}}

            {{--});--}}
        {{--})--}}
    {{--</script>--}}
@endsection