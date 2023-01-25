<div class="text2{{ $errors->has('name')? 'has-error' : '' }}">
    <label class="col-md-2">
     Category name
    </label>

    <div class="col-md-10">
        {!! Form::text("name" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
         @endif
    </div>

</div>

<div class="clearfix"></div>
<br>
<div class="text2{{ $errors->has('image')? 'has-error' : '' }}">
    <label class="col-md-2">
        Image
    </label>
    @if(isset($category))
        @if($category->image != '')
            <img src="{{ Request::root().'/website/images/'.$category->image }}" width="100px"/>
        @endif
    @endif

    <input type="file" name="image">
    @if($errors->has('image'))
        <span class="help-block">
            <strong>{{$errors->first('image')}}</strong>
        </span>
    @endif
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



