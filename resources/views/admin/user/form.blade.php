
    <div class="text2{{ $errors->has('firstname') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label class="control-label" for="firstname">firstname</label>
            {!! Form::text("firstname" , null , ['class'=> 'form-control']) !!}

            @if ($errors->has('firstname'))
                <span class="help-block">
                       <strong>{{ $errors->first('firstname') }}</strong>
                 </span>
            @endif
        </div>
    </div>
    <div class ="clearfix"></div>
    <br>

    <div class="text2{{ $errors->has('lastname') ? ' has-error' : '' }}">


        <div class="col-md-6">
            <label class="control-label" for="lastname">Lastname</label>
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

<div class="text2{{ $errors->has('admin') ? ' has-error' : '' }}">

    <div class="col-md-12">
        {!! Form::select("admin" , ['0'=>'user' , '1' => 'admin'] , ['class'=> 'form-control']) !!}
        @if ($errors->has('admin'))
            <span class="help-block">
                       <strong>{{ $errors->first('admin') }}</strong>
                 </span>
        @endif
    </div>
</div>
<div class ="clearfix"></div>
<br>
<div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">

    <div class="col-md-6">
        <label class="control-label" for="email">Email</label>
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

<div class="text2{{ $errors->has('country_id') ? ' has-error' : '' }}">

    <div class="col-md-6">
        <label class="control-label" for="country_id">Country</label>
        <select class="form-control" name="country_id" required>
            <option>select country</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}" @if(isset($user))@if($country->id ==$user->country_id ) selected @endif @endif>{{ucwords($country->name)}}</option>
            @endforeach
        </select>
        @if ($errors->has('country_id'))
            <span class="help-block">
                   <strong>{{ $errors->first('country_id') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class ="clearfix"></div>
<br>
    <div class="text2">

        <div class="col-md-6">
            <label class="control-label" for="location">Location</label>
            {!! Form::text("location" , null , ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class ="clearfix"></div>
    <br>

    <div class="text2">

        <div class="col-md-6">
            @if(isset($user))
                @if($user->verified())
                    <label class="control-label alert alert-warning">This account is verified</label>
                @else
                    <label class="control-label alert alert-danger">This account is not Verified</label>
                @endif
            @endif


        </div>
    </div>
    <div class ="clearfix"></div>
    <br>



<div class="text2{{ $errors->has('image') ? ' has-error' : '' }}">

    <div class="col-md-6">
        <label class="control-label" for="image">Image</label>
        @if(isset($user))
            @if($user->image != '')
                <img src="{{ Request::root().'/website/images/'.$user->image }}" width="100px"/>
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


    @if(!isset($user))

        <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="col-md-6">
                <label class="control-label" for="lastname"> Password</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                 </span>
                @endif
            </div>
        </div>
        <div class ="clearfix"></div>
        <br>
        <div class="text2">

            <div class="col-md-6">
                <label  class="control-label" for="lastname">Repeat password</label>
                <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class ="clearfix"></div>
    @endif

    <hr>

    <div class="text2">
        <div class="col-md-12 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
 <div class ="clearfix"></div>

