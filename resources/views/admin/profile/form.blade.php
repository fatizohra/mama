
    <div class="text2{{ $errors->has('username') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label class="control-label" for="username">username</label>
            {!! Form::text("username" , null , ['class'=> 'form-control']) !!}

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
            <span class="custom-label"><strong>Gender: </strong></span>
            {!! Form::select("gender" , gender(),null , ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class ="clearfix"></div>
    <br>
    <div class="text2">

        <div class="col-md-6">
            <label class="control-label" for="about">about</label>
            {!! Form::text("about" , null , ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class ="clearfix"></div>
    <br>


    <div class="text2">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>



