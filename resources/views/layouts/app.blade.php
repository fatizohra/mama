<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
        {{--<link rel="icon" href="{{checkIfImageExists(getSetting('logo'), '/website/slider/','/website/slider/')}}"/>--}}
        {{--<img src="{{checkIfImageExists(getSetting('logo'), '/website/slider/','/website/slider/')}}" style="width:70px;height:70px"/>--}}
        {{getSetting()}}
    </title>
    <link rel="icon" href="{{url('/website/slider/n2tDPkSTphIRz.png')}}" />

    {{--<span><a href="{{url('items/search?country_id=')}}{{auth()->user()->country_id}}&search={{$search}}">See All</a></span>--}}

    {{--<img src="{{checkIfImageExists(getSetting('logo'), '/website/slider/','/website/slider/')}}" style="width:70px;height:70px"/>--}}
    {{--<span class="logo-lg">  <img src="{{'/website/slider/'.getSetting('logo')}}" style="width:20px;height:20px"/></span>--}}
        @yield('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--{!! Html::style('css/main.css') !!}--}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('src/css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/noty.css') }}" rel="stylesheet">
    {{--{!! Html::style('css/select2.css') !!}--}}
    {{--@if(Request::is('login') || Request::is('/'))--}}
    {{--@else--}}
    <link href="{{ asset('src/css/post.css') }}" rel="stylesheet">
    {{--@endif--}}
    {!! Html::style('css/items.css') !!}
    <style>
        /*//for follow button*/
        .icon-btn { padding: 3px 20px 3px 20px; border-radius:50px;}
    a{
     text-decoration: none;
     }
        .m {
            background-color: #fafafa;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -webkit-box-shadow: 0 0 2px rgba(0, 0, 0, 0.12), 0 2px 2px rgba(0, 0, 0, 0.26);
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.12), 0 2px 2px rgba(0, 0, 0, 0.26);
            margin: 8px auto 0 auto;
            position: relative;
            transition: all .12s ease-out;
        }
        .header {
            margin: 22px auto 12px;
            background-position: 0 0;
            height: 51px;
            width: 175px;
        }
        .reg-form-container {
            background: #fff;
            box-shadow: 0 0 35px rgba(0,0,0, .4);
            padding: 20px 20px 20px 40px;
            border-radius: 6px;
            position: relative;
            min-height: 200px;
            z-index: 10;
        }
        .flow-h1 {
            margin-top: 45px;
            margin-bottom: 30px;
            color: #000000;
            font-size: 36px;
            line-height: 40px;
            text-align: center;
            font-weight: lighter;
        }

        .fixed-top {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }

        .productbox{
            border: 1px solid #edeff2;
            border-radius: 2px;
            width: 100%;
            margin-bottom: 30px !important;
        }
        .remove {
            float: right;
            position: absolute;
            right: 0;
            height: 30px;
            width: 30px;
            margin: 0;
            padding: 5px;
            background: hsla(0,0%,100%,.7);
            cursor: pointer;
            margin-bottom:200px;
        }
        .btn-azure, .btn-azure:focus {
            background-color: #FF8A80 !important;
            border-color: #FF8A80;
            color: #fff;
        }

        /*#language footer*/
        .footer {
            padding:20px 0px;
            color: #ccc;
            background-color: #fafafa;
        }

        .footer h3 {
            color: #FFF;
            font-size:15px;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom:20px;
        }

        .footer ul {
            font-size: 13px;
            list-style-type: none;
            margin-left: 0;
            padding-left: 0;
            margin-top: 15px;
            color: #7F8C8D;
        }

        .footer ul li a {
            padding: 10px 0px;
            display: inline;
            color: #000000;
            font-weight: 600;
            font-size: 13px;
        }

        .footer ul li a:hover{
            color:#1e76a8;
        }

        .footer-bottom{
            background-color: #111;
            color: #282c2d;
            font-size: 12px;
            text-align: center;
            height: 50px;
            line-height: 50px;
        }

        .footer-bottom p{
            font-size:13px;
            color: #FFF;
        }

        .footer-top{
            background-color: #f7f7f7;
            text-align: center;
        }

        .footer-top .social-icons{
            padding:50px 0px;
        }

        .footer-top .social-icons i{
            padding:0px 20px;
            font-size:20px;
            color: #aaa;
        }

        .footer-top .social-icons i:hover{
            color:#1e76a8;
        }

        .logo{
            color:#ccc;
            font-size:20px;
            font-weight:600;
        }
        .language{
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 30%;
            cursor: pointer;
        }
        #nav .current a{
            color: #FF8A80;
            /*color:#f2a222;*/
            font-weight: bold;
            background-color: #eeeeee;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
            min-height:58px;
        }

    </style>
    {{--<link href="{{ asset('css/noty.css') }}" rel="stylesheet">--}}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">--}}


</head>
<body>
<div id="app">
    @if(Request::is('login') || Request::is('register') || Request::is('/'))
     @else
        @include('includes.header')
    @endif
     <div style="padding-top:75px">

        <div class="row">
            <div class="col-md-6 text-center">
              @include('layouts/message')
            </div>
        </div>

        @yield('content')
    </div>
       <div>
           @include('includes/footer')
       </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/595a5020bd.js"></script>
    {{--<script src="/js/vue.js"></script>--}}
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    {{----}}
    <script src="{{ asset('js/noty.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetalert2.all.js') }}" type="text/javascript"></script>
        {!! Html::script('js/select2.js') !!}
        <script type="text/javascript">
          $('.select2').select2();
          $(document).ready(function(){
//              $('.sendButton').attr('disabled',true);
              $('.sendButton').hide();
              $('#message').keyup(function(){
                  if($(this).val().length !=0)
                      $('.sendButton').show();
//                      attr('disabled', false);
                  else
                      $('.sendButton').hide();
//                      $('.sendButton').attr('disabled',true);
              })
          });
       </script>
    <script>
        @if(Session::has('success'))
            new Noty({
            type: 'success',
            layout: 'bottomLeft',
            text: '{{ Session::get('success') }}'
        }).show();
        @endif
        $(document).ready(function(e){
            $('.search-panel .dropdown-menu').find('a').click(function(e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#","");
                var concept = $(this).text();
                $('.search-panel span#search_concept').text(concept);
                $('.input-group #search_param').val(param);
            });
        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    @yield('js')
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}

</body>
</html>
