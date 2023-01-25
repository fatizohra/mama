@foreach($following as $f)
            <div class="row" style="border-bottom:1px solid #efefef; margin-bottom:10px">
                <div class="col-md-2 pull-left">
                    <a href="{{ url ('/profile') }}/{{$f->username }}">
                            <img src="{{ checkIfImageExists($f->image)  }}"
                                 width="35px" height="35px" style="margin-bottom:5px;" class="img-circle img-user"/>
                    </a>
                </div>

                <div class="col-md-7 pull-left">
                    <h5 style="margin:0px;"><a href="{{ url ('/profile') }}/{{$f->username }}">
                            {{ucwords($f->firstname)}}  {{ucwords($f->lastname)}} </a></h5>
                    <span class="icon"><small><i class="fa fa-map-marker"></i>
                            @if (!empty($f->location))
                                {{ $f->location}},
                            @endif
                            {{ $f->name}}</small>
                     </span>

                </div>
                <div class="col-md-3 pull-right" id="app">
                    <follower profile_user_id="{{ $f->id }}"></follower>
                </div>

            </div>
 @endforeach





