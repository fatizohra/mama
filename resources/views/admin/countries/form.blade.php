<div class="text2{{ $errors->has('name')? 'has-error' : '' }}">
    <label class="col-md-2">
        job title
    </label>

    <div class="col-md-10">
        {!! Form::text("job_title" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('job_title'))
            <span class="help-block">
                <strong>{{ $errors->first('job_title') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('company_name')? 'has-error' : '' }}">
    <label class="col-md-2">
        company_name
    </label>

    <div class="col-md-10">
        {!! Form::text("company_name" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('company_name'))
            <span class="help-block">
                <strong>{{ $errors->first('company_name') }}</strong>
            </span>
        @endif
    </div>

</div>

<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('type')? 'has-error' : '' }}">
    <label class="col-md-2">
        type
    </label>

    <div class="col-md-10">
        {!! Form::text("type" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('salary')? 'has-error' : '' }}">
    <label class="col-md-2">
        salary
    </label>

    <div class="col-md-10">
        {!! Form::text("salary" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('salary'))
            <span class="help-block">
                <strong>{{ $errors->first('salary') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

@if(!isset($user))
    <div class="text2{{ $errors->has('status')? 'has-error' : '' }}">
        <label class="col-md-2">
            Item status
        </label>

        <div class="col-md-10">
            {!! Form::select("status" , status(),null , ['class'=> 'form-control']) !!}
            @if($errors->has('status'))
                <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
            @endif
        </div>

    </div>
    <div class="clearfix"></div>
    <br>
@endif

<!--had if bach maybanch f la list-->
<div class="text2{{ $errors->has('location')? 'has-error' : '' }}">
    <label class="col-md-2">
        location
    </label>

    <div class="col-md-10">
        {!! Form::text("location" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('location'))
            <span class="help-block">
                <strong>{{ $errors->first('location') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>


    <div class="text2{{ $errors->has('description')? 'has-error' : '' }}">
        <label class="col-md-2">
            Item full description
        </label>

        <div class="col-md-10">
            {!! Form::textarea("description" , null , ['class'=> 'form-control', 'id'=>'summernote']) !!}
            {{--<textarea id="summernote" name="summernote" class="form-control">--}}

            {{--</textarea>--}}
            @if($errors->has('description'))
                <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>

    </div>
    <div class="clearfix"></div>
    <br>
    <div class="text2">
        <div class="col-md-10">
            <button meta="submit" class="btn btn-warning">
                <i class="fa fa-btn fa-user" style=".."></i>
            </button>
        </div>
    </div>
</div>


