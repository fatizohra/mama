
<div class="text2{{ $errors->has('subject')? 'has-error' : '' }}">
    <label class="col-md-2">
        Subject
    </label>

    <div class="col-md-10">
        {!! Form::text("subject" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('subject'))
            <span class="help-block">
                <strong>{{ $errors->first('subject') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('contact_name')? 'has-error' : '' }}">
    <label class="col-md-2">
        Your Name
    </label>

    <div class="col-md-10">
        {!! Form::text("contact_name" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('contact_name'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_name') }}</strong>
            </span>
         @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('contact_email')? 'has-error' : '' }}">
    <label class="col-md-2">
       Your Email
    </label>

    <div class="col-md-10">
        {!! Form::text("contact_email" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('contact_email'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_email') }}</strong>
            </span>
        @endif
    </div>

</div>

<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('country_id') ? ' has-error' : '' }}">
    <label class="col-md-2">
       Your Country
    </label>
    <div class="col-md-10">
        <select class="form-control" name="country_id" required>
            <option>select country</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}" @if(isset($contact))@if($country->id ==$contact->country_id ) selected @endif @endif>{{ucwords($country->name)}}</option>
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
<div class="text2{{ $errors->has('contact_message')? 'has-error' : '' }}">
    <label class="col-md-2">
         Message
    </label>

    <div class="col-md-10">
        {!! Form::text("contact_message" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('contact_message'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_message') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>



<div class="text2">
    <div class="col-md-10">
        <button type="submit" class="btn btn-warning">
            <i class="fa fa-btn fa-user" style="..."></i>
        </button>
    </div>
</div>
