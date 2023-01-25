<div class="col-md-3 col-xs-3">
    <div class="productbox">
        <div class="profile-sidebar">
            <div class="profile-user text-center">
                <a href="{{ url ('/profile') }}/{{ Auth::user()->profile->username }}"  title="Profile">
                    <img src="{{ checkIfImageExists(Auth::user()->image)  }}" alt="User name" class="img-circle img-user"
                         style="cursor:pointer; width: 120px; height:120px; border:10px solid #FF8A80;">
                </a>
            </div>
            <div class="profile-usertitle">
                <a href="{{ url ('/profile') }}/{{Auth::user()->profile->username }}" title="Profile" style="font-size:20px; margin:20px ;color:#000000;"><b>{!! str_limit(ucwords(Auth::user()->fullName()),30) !!}</b></a>
            </div>


            <div class="profile-usermenu">
                <ul class="nav">
                    <li class="{{setActive(['editSettings'])}}">
                        <a href="{{ url('/editSettings') }}">
                            <i class="glyphicon glyphicon-home"></i>
                            Account Settings </a>
                    </li>
                    <li class="{{setActive(['settings'])}}">
                        <a href="{{ url('/settings') }}">
                            <i class="glyphicon glyphicon-user"></i>
                            Change Password </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="glyphicon glyphicon-ok"></i>
                            Notifications </a>
                    </li>
                    <li class="{{setActive(['contactus'])}}">
                        <a href="{{ url('/contactus') }}">
                            <i class="glyphicon glyphicon-flag"></i>
                            Contact Us </a>
                    </li>
                </ul>
            </div>
            <!-- END MENU -->
        </div>
    </div>
</div>