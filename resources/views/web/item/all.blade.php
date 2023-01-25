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
                  <div class="productbox" style="padding:15px">
                     <div class="panel panel-primary" >
                         <div class="panel-heading" style="background-color:#ffffff">
                            <div class="row">
                    <div class="col-md-10">
                        <h3 class="panel-title" style="color:#000000;"> <i class="fa fa-tasks" aria-hidden="true" style="margin:5px;color:#FF8A80"></i>Posts</h3>
                    </div>
                    <div class="col-md-2 text-right">
                            <span><a href="{{url('items/search?country_id=')}}{{auth()->user()->country_id}}&search={{$search}}">See All</a></span>
                        {{--<span><a href="{{url('items/search?search=')}}{{$search}}&country_id={{auth()->user()->country_id}}">See All</a></span>--}}
                    </div>
                </div>
                         </div>
                         <div class="panel-body">
                            @include('web.item.sharefile', ['item' => $item])
                        </div>
                     </div>
                  </div>
                 <div class="productbox" style="padding:15px">
                 <div class="panel panel-primary">
                    <div class="panel panel-primary" >
                        <div class="panel-heading" style="background-color:#ffffff">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="panel-title" style="color:#000000;"> <i class="fa fa-users" aria-hidden="true" style="margin:5px;color:#FF8A80"></i>People</h3>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if($people->count()>0)
                            <small>Showing {{$people->count()}} results</small>
                            @endif
                               @include('web.item.people', ['people' => $people])
                                <div class="clearfix"></div>
                                <br>
                                <div class="text-center">
                                    {{  $people->appends(Request::except('page'))->render() }}
                                </div>
                        </div>
                    </div>
                 </div>
              </div>
        </div>
    </div>

    </div>
@endsection
{{--@section('js')--}}

    {{--<script>--}}
        {{--$(document).on('click','.pagination a', function (e) {--}}

            {{--e.preventDefault();--}}
            {{--var page = $(this).attr('href').split('page=')[1];--}}
            {{--getItems(page);--}}

        {{--});--}}
        {{--function getItems(page){--}}

            {{--$.ajax({--}}
                {{--url: '/ajax/items/search?page='+page--}}
            {{--}).done(function(data){--}}
                {{--$('.content').html(data);--}}
                {{--location.hash= page;--}}
            {{--});--}}
        {{--}--}}
    {{--</script>--}}

{{--@endsection--}}