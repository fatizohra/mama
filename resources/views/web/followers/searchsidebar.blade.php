<div class="col-md-3">
    <form method="get" action="{{url('FilterAllProducts')}}">
        {{csrf_field()}}
        <a href="#demo1" class="list-group-item list-group-item-success strong" style="background: #f7f7f7;"
           data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-photo"></i> Keywords <i
                    class="fa fa-caret-down"></i></a>
        <div class="collapse list-group-submenu" id="demo1" style="width: 250px;">
            <br>
            <div class="row">
                <div class="text2">
                    <div class="col-md-12">
                        <input id="firstname" type="text" class="form-control" placeholder="First name"
                               name="firstname">
                    </div>
                </div>
            </div>
            {{--<div class ="clearfix"></div>--}}
            <br>
            <div class="row">
                <div class="text2">
                    <div class="col-md-12">

                        <input id="lastname" type="text" class="form-control" placeholder="Last name" name="lastname">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
        </div>

        <br>
        <a href="#demo5" class="list-group-item list-group-item strong" style="background: #f7f7f7;"
           data-toggle="collapse" data-parent="#MainMenu">
            <i class="fa fa-book"></i> Interest <i class="fa fa-caret-down"></i></a>
        <div class="collapse list-group-submenu" id="demo5">
            <br>
            <div class="row">
                <div class="text2">
                    <div class="col-md-12">
                        <input id="firstname" type="text" class="form-control" placeholder="First name"
                               name="firstname">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="row">
                <div class="text2">
                    <div class="col-md-12">
                        <input id="lastname" type="text" class="form-control" placeholder="Last name" name="lastname">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
        </div>
        <br>
        <button type="submit">Search</button>
    </form>
    <br>
    <br>
</div>























            {{--<div class="row">--}}
            {{--<div class="text2">--}}
            {{--<div class="col-md-12">--}}
            {{--<Select class="form-control" name="country" required>--}}
            {{--<option>select country</option>--}}
            {{--@foreach($countries as $country)--}}
            {{--<option value="{{$country->id}}" @if(isset($profile))@if($country->id ==$profile->country ) selected @endif @endif>{{ucwords($country->name)}}</option>--}}
            {{--@endforeach--}}
            {{--</Select>--}}

            {{--</div>--}}
            {{--</div>--}}


            {{--</div>--}}



{{--EndPrice--}}

{{--<div class="profile-sidebar">--}}

{{--<h2 style="margin-left:10px;"> Advanced search</h2>--}}
{{--<div class="profile-usermenu" style="padding:10px;">--}}
{{--{!! Form::open(['url' => 'search', 'method'=> 'get']) !!}--}}
{{--<ul class="nav" style="margin-left:0px;">--}}
{{--<li class="itemsearch">--}}
{{--{!! Form::text("bu_price_from", null, ['class'=> 'form-control' , 'placeholder'=> 'Price From']) !!}--}}
{{--</li>--}}
{{--<li class="itemsearch">--}}
{{--{!! Form::text("bu_price_to", null, ['class'=> 'form-control' , 'placeholder'=> 'Price To']) !!}--}}
{{--</li>--}}
{{-- <li class="itemsearch">--}}

{{--{!! Form::select("bu_type", bu_type(), null, ['class'=> 'form-control select2' , 'placeholder'=> 'Categories']) !!}--}}
{{--</li>--}}
{{--<li class="itemsearch">--}}

{{--{!! Form::select("ville", ville() , null, ['class'=> 'form-control select2' , 'placeholder'=> 'City']) !!}--}}
{{--</li>--}}
{{--<li class="itemsearch">--}}
{{--{!! Form::submit("search", ['class'=> 'banner_btn' ]) !!}--}}
{{--</li>--}}


{{--</ul>--}}
{{--{!! Form::close() !!}--}}
{{--</div>--}}
{{--<!-- END MENU -->--}}
{{--</div>--}}



<!---->
