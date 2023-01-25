<header>
    <nav class="navbar navbar-default fixed-top">
        {{--navbar navbar-inverse navbar-fixed-top--}}
        {{--navbar navbar-inverse navbar-fixed-top normal--}}
        <div class="container">
            <div class="navbar-header" style="padding-top:15px">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="" href="{{ url('/home') }}" title="{{getSetting()}}">
                    {{--<link rel="icon" href="{{Request::root()}}/website/slider/"{{getSetting('logo')}}/>--}}
                    <img src="{{checkIfImageExists(getSetting('logo'), '/website/slider/','/website/slider/')}}" width="32px" height="32px" />
                </a>
            </div>


            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right" id="nav">
                    @guest
                    <li><a href="{{ route('login') }}" title="login">Login</a></li>
                    <li><a href="{{ route('register') }}" title="register">Register</a></li>
                    @endguest
                    @auth
                        <li class="{{setActive(['home'],'current')}}"><a href="{{url('/home')}}" title="home"><i class="fa fa-home"></i> <span>Home</span> </a></li>
                        <li class= "{{setActive(['explore'],'current')}}"><a href="{{url('/explore')}}" title="explore"><i class="fa fa-plus-square-o"></i> <span>Discover</span>  </a></li>
                        <li class="{{setActive(['notifications'],'current')}}">
                            <notification :userid="{{ auth()->id() }}"></notification>
                            <unread></unread>
                         </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <img src="{{ checkIfImageExists(Auth::user()->image)}}" width="30px" height="30px"
                                     class="img-circle"  style="cursor:pointer; border:2px solid #FF8A80;"/><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="width:250px;">
                                <li style="margin:10px;">
                                    <div class="row">
                                        <div class="col-md-2 col-xs-2" style="margin-right:15px;">
                                            <img src="{{ checkIfImageExists(Auth::user()->image)}}" width="50px" height="50px"
                                                 class="img-circle"/>
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <span><b>{!! str_limit(ucwords(Auth::user()->fullName()),18) !!}</b></span><br>
                                            <a href="{{ url ('/profile') }}/{{ Auth::user()->profile->username }}" style="color:#8eb4cb">View profile</a>
                                        </div>
                                    </div>


                                </li>
                                <hr style="margin:10px;">
                                <li><a href="{{ url('/MyFavouriteList') }}"> My Favorite oppties</a></li>
                                <li><a href="{{ url('/editSettings') }}"> Settings</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
                @auth
                @if(Request::is('items/search'))
                @else
                    <div class="input-group col-md-6 col-xs-4" style="margin-left:30px;">

                          <form action="{{ url('/all')}}" class="" method="get">
                            {{--<div class="col-md-8">--}}
                            <div class="form-group">

                                     <div class="col-md-12 col-xs-12" style="padding:1px;">
                                         <div class="input-group col-md-12 col-xs-12">
                                    <input type="text" class="form-control" name="search"
                                           placeholder="Search" autocomplete="off" id="message" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>" />

                                    <span class="input-group-btn">
                                        <button class="btn btn-default sendButton" type="submit">
                                           <span class="glyphicon glyphicon-search"></span>
                                         </button>
                                     </span>
                                     </div>


                                </div>

                                {{--<input type="text" class="form-control"--}}
                                {{--placeholder="Search for Products, Brands and more" name="search">--}}

                            </div>
                            {{--</div>--}}
                        </form>
                 </div>
                @endif
                @endauth
            </div>
        </div>
    </nav>
</header>
