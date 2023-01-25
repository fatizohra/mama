@extends('layouts.app')
@section('title')
@endsection
@section('header')

    <style>
        .sidebar-nav {
            box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
            width: 240px;
            top: 0px;
            padding: 10px 10px 0px 10px;
            background: #ffffff;
            /*#80CBC4*/
            z-index: 99;
        }
        .listprofile {
            display: inline-block;
            padding: 0 10px;
            border-right: 1px solid #d4dbe0;
        }
    </style>
@endsection

@section('content')

    @if(auth()->user()->verified())
    @else
        <div class="col-md-12 alert alert-danger text-center">
          Please confirm your email address to get it verified. A confirmation message was sent to you
        </div>
    @endif
    <div class="container">
        <div class="row profile">
            <div class="col-md-12">
                <div id="container-mix" class="row _post-container_">

                    @if(count($items)>0)
                       <div class="profile-content">

                                     {{--<section class="items endless-pagination" data-next-page="{{ $items->nextPageUrl() }}">--}}
                             @foreach($items as $key =>$itm)
                                    <div class="col-md-3 col-xs-6">
                                        <div class="productbox">
                                             <a href="{{ url('/oppty/view/'.$itm->id) }}" title="{{ $itm->title }}">
                                                <img src="{{ url('/website/thumb/'.$itm->image) }}" style="height:200px;" class="img-responsive">
                                             </a>
                                            {{--@if($itm->user_id == Auth::user()->id)--}}
                                                {{--<a href="{{ url('/editItem/'.$itm->id) }}" title="{{ $itm->title }}" class="imgpencil">--}}
                                                    {{--<span class="fa fa-pencil"  style="font-size: 23px; color:#ffffff"></span>--}}
                                                {{--</a>--}}
                                            {{--@endif--}}
                                            <a href="{{ url('/oppty/view/'.$itm->id) }}" title="{{ $itm->title }}" class="post-title">
                                                <h4> {!! str_limit(ucwords( $itm->title),36) !!}</h4>
                                            </a>

                                            <div class="user-post">

                                                @if($count_items > 0)
                                                <a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}">
                                                     <img src="{{ checkIfImageExists($itm->user->image) }}" alt="" class="user-img" style="cursor:pointer; border:2px solid #FF8A80;">
                                                </a>
                                                <span>  <a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}"  style="color: #262626; font-family: Conv_helveticaneuecyr-bold;">
                                                          {!! str_limit(ucwords($itm->user->fullName()),20) !!}
                                                         </a>
                                                </span>
                                                -
                                                <span><small><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $itm->created_at->diffForHumans() }}</small></span>
                                                <br>
                                                <span class="icon" style="margin-left:30px;"><small><i class="fa fa-map-marker"></i>
                                                        @if (!empty($itm->user->location))
                                                            {{ $itm->user->location}},
                                                        @endif
                                                        {{ $itm->user->country->name}}
                                                    </small>
                                                </span>
                                                @else
                                                    <span>Suggested Post</span>

                                                @endif

                                            </div>

                                        </div>
                                    </div>
                             @endforeach
                           {{--</section>--}}
                           <div class="clearfix"></div>
                           <br>
                           <div class="text-center">
                               {{  $items->appends(Request::except('page'))->render() }}
                           </div>
                           {{--<div class="loading" style="text-align:center">--}}
                               {{--<img src="{{ url('images/loading.gif') }}" style="width:100px;height:100px">--}}
                           {{--</div>--}}

                       </div>
                        @else
                            <div class="col-md-12">
                                <div class="productbox text-center" style="padding:10px;">
                                    <h1>  No Oppties yet....</h1>
                                    This empty timeline won’t be around for long.
                                    Follow people and you’ll see opportunities show up here.<br>
                                    Or be the first to add new opportunity.<br>
                                    <a href="{{ url ('/findnetwork') }}" class="btn btn-azure"><i class="fa fa-user-plus"></i> Find people to follow</a>

                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('.loading').hide();--}}
{{--//            var isLoading = false;--}}
{{--//            var page = $('.endless-pagination').data('next-page');--}}

{{--//            if (page !== null  && page !== "" ) {--}}
                {{--$(window).scroll(fetchPosts);--}}
{{--//            }--}}

            {{--function fetchPosts() {--}}
                {{--var page = $('.endless-pagination').data('next-page');--}}

{{--//                console.log(page);--}}
                {{--if (page !== null  && page !== "" ) {--}}
{{--//                    isLoading = true;--}}


                        {{--$('.loading').show();--}}
                        {{--clearTimeout($.data(this, "scrollCheck"));--}}

                        {{--$.data(this, "scrollCheck", setTimeout(function () {--}}
                            {{--var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;--}}

                            {{--if (scroll_position_for_posts_load >= $(document).height() && page!==null) {--}}
                                {{--$.get(page, function (data) {--}}
                                    {{--$('.endless-pagination').data('next-page', data.next_page);--}}
                                    {{--$('.items').append(data.items);--}}
                                    {{--console.log(page);--}}
                                {{--});--}}
                                {{--$('.loading').hide();--}}
{{--//                                isLoading = false;--}}
                            {{--}--}}
                        {{--}, 350))--}}
{{--//                    1000--}}

                {{--}else{--}}
{{--//                    isLoading = false;--}}
                    {{--$('.loading').hide();--}}
                {{--}--}}
            {{--}--}}
        {{--})--}}
    {{--</script>--}}

@endsection
