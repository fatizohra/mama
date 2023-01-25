
<div class="text2{{ $errors->has('firstname') ? ' has-error' : '' }}">
    <div class="col-md-6">
        <label class="control-label" for="firstname">First Name<span class="required">*</span></label>
        {!! Form::text("firstname" , null , ['class'=> 'form-control']) !!}

        @if ($errors->has('firstname'))
            <span class="help-block">
                   <strong>{{ $errors->first('firstname') }}</strong>
              </span>
        @endif
    </div>
</div>
<div class="text2{{ $errors->has('lastname') ? ' has-error' : '' }}">
    <div class="col-md-6">
        <label class="control-label" for="lastname">Last Name<span class="required">*</span></label>
        {!! Form::text("lastname" , null , ['class'=> 'form-control']) !!}

        @if ($errors->has('lastname'))
            <span class="help-block">
               <strong>{{ $errors->first('lastname') }}</strong>
             </span>
        @endif
    </div>
</div>
<div class ="clearfix"></div>
<br>

<div class="text2">

    <div class="col-md-12">
        <span class="custom-label"><strong>Gender: </strong></span>
        {!! Form::select("gender" , gender(),null , ['class'=> 'form-control']) !!}
    </div>
</div>
<div class ="clearfix"></div>
<br>

<div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">

    <div class="col-md-12">
        <label class="control-label" for="email">Email<span class="required">*</span></label>
        {!! Form::text("email" , null , ['class'=> 'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                 <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class ="clearfix"></div>
<br>

<div class="text2{{ $errors->has('image') ? ' has-error' : '' }}">


    <div class="col-md-6 col-xs-4">
        <label class="control-label" for="image">Image</label>
        @if(isset($user))
            @if($user->image != '')
                <img src="{{ Request::root().'/website/images/'.$user->image }}" class="avatar img-circle" style="cursor:pointer; width: 30%;"/>
            @endif
        @endif
        {!! Form::file("image" , null , ['class'=> 'form-control']) !!}

        @if ($errors->has('image'))
            <span class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
             </span>
        @endif
    </div>
</div>
<div class ="clearfix"></div>
<br>

<div class="text2{{ $errors->has('country_id')? 'has-error' : '' }}">
    <div class="col-md-12">
    <label> Country</label>
        <select class="form-control country_list" name="country_id" required>
            <option>select country</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}" @if(isset($user))@if($country->id ==$user->country_id ) selected @endif @endif>{{ucwords($country->name)}}</option>
            @endforeach
        </select>
    </div>

</div>
<div class ="clearfix"></div>
<br>
<div class="text2">
    <div class="col-md-12">
        <label class="control-label" for="location">Location</label>
        {!! Form::text("location" , null , ['class'=> 'form-control']) !!}

    </div>
</div>
<div class ="clearfix"></div>
<br>

<div class="text2{{ $errors->has('username') ? ' has-error' : '' }}">

    <div class="col-md-12">
        <label class="control-label" for="username"> username <span class="required">*</span></label>
        <div class="row">
            <div class="col-md-12">
              <div class="col-md-3">
        {{ Request::root().'/'}}
        </div>
             <div class="col-md-6">
        {!! Form::text("username" , null , ['class'=> 'form-control']) !!}
        </div>
        </div>
        </div>
        @if ($errors->has('username'))
            <span class="help-block">
               <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class ="clearfix"></div>
<br>



<div class="text2">
    <div class="col-md-12">
     <label class="control-label" for="about">
        About
     </label>
     {!! Form::textarea("about" , null , ['class'=> 'form-control', 'id'=>'summernote']) !!}
    </div>
</div>
<div class="clearfix"></div>
<br>

<div class="text2">
    <div class="col-md-3 pull-right">
        <a href="{{ url ('/profile') }}/{{ Auth::user()->profile->username }}" class="btn btn-default">
            Cancel
        </a>
        <button meta="submit" class="btn btn-warning">
            <i class="fa fa-btn fa-user"></i> Save
        </button>

    </div>
</div>
<div class ="clearfix"></div>
<br>


