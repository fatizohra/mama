<div class="text2{{ $errors->has('comment')? 'has-error' : '' }}">
    <label class="col-md-2">
        Comment
    </label>

    <div class="col-md-10">
        {!! Form::text("comment" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('comment'))
            <span class="help-block">
                <strong>{{ $errors->first('comment') }}</strong>
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



