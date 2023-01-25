<div class="col-md-3">
    <div class="productbox">
        <div class="profile-sidebar">

            <div class="profile-usermenu">
                <ul class="nav">
                    <form method="get" action="{{url('FilterAllProducts')}}">
                        {{csrf_field()}}

                            @foreach($categories as $category)
                                <li class="active">
                                    <a href="{{url('ShowAllBuilding?byCategory='.$category->id)}}" class="list-group-item">
                                        <i class="glyphicon glyphicon-home"></i>
                                         {{ucwords($category->name)}}
                                        <span class="pull-right">({{App\Item::where('category_id',$category->id)->count()}})</span>
                                    </a>
                                </li>
                            @endforeach
                            <li class="active">
                                <a href="{{ url('/user/editSetting') }}">
                                    <i class="glyphicon glyphicon-home"></i>
                                    Account Settings </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/setting') }}">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Change Password </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    Notifications </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    Help </a>
                            </li>
                    </form>
                </ul>
            </div>
            <!-- END MENU -->
        </div>
    </div>
</div>





