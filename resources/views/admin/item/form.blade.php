
      <div class="col-md-8">
          <div class="text2{{ $errors->has('title')? 'has-error' : '' }}">
                 <label class="col-md-4">
                        title
                </label>
               <div class="col-md-12">
                        {!! Form::text("title" , null ,['class'=> 'form-control','placeholder'=> 'Add title']) !!}
                        @if($errors->has('title'))
                            <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
                @if(!isset($user))
                    <div class="text2{{ $errors->has('status')? 'has-error' : '' }}">
                        <label class="col-md-4">
                            Item status
                        </label>
                        <div class="col-md-12">
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
          <div class="text2{{ $errors->has('category_id')? 'has-error' : '' }}">
              <div class="col-md-12">
                  <label> Category</label>
                  <select class="form-control" name="category_id" required>
                      <option>select Category</option>
                      @foreach($categories as $category)
                          <option value="{{$category->id}}" @if(isset($item))@if($category->id ==$item->category_id ) selected @endif @endif>{{ucwords($category->name)}}</option>
                      @endforeach

                  </select>
              </div>
          </div>
          <div class ="clearfix"></div>
          <br>
          <div class="text2">
              <label class="col-md-4">
                  Website
              </label>
              <div class="col-md-12">
                  {!! Form::text("site" , null ,['class'=> 'form-control','placeholder'=> 'Add the URL related to this offer']) !!}
              </div>
          </div>
          <div class="clearfix"></div>
          <br>
          <div class="text2{{ $errors->has('description')? 'has-error' : '' }}">
                <label class="col-md-10">
                    Item full description
                 </label>
                 <div class="col-md-12">
                        {!! Form::textarea("description" , null , ['class'=> 'form-control', 'required' => 'required','placeholder'=> 'Say more about the offer']) !!}
                        @if($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
          @if(!isset($user))
          <div class="col-md-4">
              <div class="text2{{ $errors->has('image') ? ' has-error' : '' }}">

                  <div class="col-md-6">
                      <label class="control-label" for="image">Image</label>
                      @if(isset($item))
                          @if($item->image != '')
                              <img src="{{ Request::root().'/website/images/'.$item->image }}" width="100px"/>
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


      @endif
 </div>