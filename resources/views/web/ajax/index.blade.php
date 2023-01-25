@foreach($items as $itm)
    <div class="col-md-3">
        <div class="productbox">
            <a href="{{url('/opp/view/'.$itm->id) }}" title="{{ $itm->title }}">
                <img src="{{ url('/website/thumb/'.$itm->image) }}" style="height:200px;" class="img-responsive">
            </a>

            @if($itm->user_id == Auth::user()->id)
                <a href="{{ url('/editItem/'.$itm->id) }}" class="imgpencil" title="{{ $itm->title }}">
                    <span class="fa fa-pencil"  style="font-size: 23px; color:#ffffff"></span>
                </a>
            @endif
            <a href="{{url('/opp/view/'.$itm->id)}}" class="post-title" title="{{ $itm->title }}">
                <h4> {!! str_limit(ucwords( $itm->title),36) !!}</h4>
            </a>

            <div class="user-post">
                @if($count_items ==0)
                    <span>Suggested Post</span>
                @else

                <a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}">
                  <img src="{{ checkIfImageExists($itm->user->image) }}" alt="" class="user-img" style="cursor:pointer; border:2px solid #FF8A80;">
                </a>
                <span>  <a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}"  style="color: #262626; font-family: Conv_helveticaneuecyr-bold;">
                                 {!! str_limit(ucwords($itm->user->fullName()),20) !!}///
                         </a>
               </span>
                -
                <span><small><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $itm->created_at->diffForHumans() }}</small></span>
                <br>
                <span class="icon" style="margin-left:30px;"><small><i class="fa fa-map-marker"></i>
                        @if (!empty($itm->user->location))
                            {{ $itm->user->location}},
                        @endif
                        {{ $itm->user->country->name}}</small>
                  </span>


                @endif
            </div>

        </div>
    </div>

@endforeach
