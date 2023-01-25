@extends('layouts.app')
@section('title')
    All items
@endsection
@section('header')
    <style>
        .nav-tabs { border-bottom: 2px solid #DDD; }
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
        .nav-tabs > li > a { border: none; color: #ffffff;background: #FF8A80;; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #FF8A80; !important; background: #fff; }
        .nav-tabs > li > a::after { content: ""; background: #FF8A80;; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
        .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
        .tab-nav > li > a::after { background: #FF8A80; none repeat scroll 0% 0%; color: #fff; }
        .tab-pane { padding: 15px 0; }
        .tab-content{padding:20px}
        .nav-tabs > li  {width:20%; text-align:center;}
        .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
        body{ background: #EDECEC; padding:50px}

        @media all and (max-width:724px){
            .nav-tabs > li > a > span {display:none;}
            .nav-tabs > li > a {padding: 5px 5px;}
        }
    </style>
@endsection
@section('content')
    <div class="row">
    {{--<div class="col-md-12">--}}
    <!-- Nav tabs -->
        <div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">  <span>All</span></a></li>
                <li role="presentation"><a href="#people" aria-controls="people" role="tab" data-toggle="tab"><span>People</span></a></li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">

                </div>
                <div role="tabpanel" class="tab-pane" id="people">

                </div>

            </div>
        </div>
        {{--</div>--}}
    </div>
    {{--<div class="container" style="width:1260px;">--}}


    {{--</div>--}}
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $('body').on('click', '.pagination a', function (e) {

                e.preventDefault();
                var url = $(this).attr('href');

                $.get(url, function (data) {
                    $('.people').html(data);
                });
                $("#people .tab").each(function(){
                    if (location.href.indexOf($(this).attr("url"))>-1) $(this).addClass("active");
                });

            });
        })
    </script>
@endsection