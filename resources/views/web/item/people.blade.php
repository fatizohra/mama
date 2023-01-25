
@if(count($people)>0)
    <div class ="profile-content">
                  @foreach($people as $key => $person)
                      <div class="col-md-3 col-xs-4">
                        <div class="productbox">
                            <div class="row">
                                <div class="col-md-4 col-xs-4">
                                <a href="{{ url ('/profile') }}/{{ $person->profile->username }}">
                                    <img src="{{checkIfImageExists($person->image) }} " width="70px" height="70px"
                                         style="margin-top:10px; margin-left:10px;"
                                         class="img-circle img-user text-center"/>
                                </a>
                                </div>

                                <div class="col-md-8 col-xs-8">
                                    <a href="{{ url ('/profile') }}/{{ $person->profile->username }}" class="post-title text-center">
                                        <h5> {!! str_limit(ucwords( $person->fullName()),15) !!}</h5>
                                    </a>
                                    <div class="user-post text-center">
                                        <follower profile_user_id="{{ $person->id }}"
                                                  user_id="{{Auth::user()->id}}"></follower>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                @endforeach

              <div class="clearfix"></div>
              <br>
    </div>
@else
    <div class="col-md-10" style="margin-left:15px;">
            No results found.
     </div>
@endif
