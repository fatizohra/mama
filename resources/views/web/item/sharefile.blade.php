
@if(count($item)>0)
    <div class ="profile-content">

      @foreach($item as $key => $itm)
            @if($key % 4 ==0 && $key!=0)
            <div class="clearfix">
            </div>

            @endif

            <div class="col-md-3 col-xs-6">
            <div class="productbox">



                <a href="{{ url('/oppty/view/'.$itm->id) }}" title="{{ $itm->title }}">
                    <img src="{{ url('/website/thumb/'.$itm->image) }}" class="img-responsive" height="200px">
                </a>


                <a href="{{ url('/oppty/view/'.$itm->id)}}" class="post-title" title="{{ $itm->title }}">
                    <h4> {!! str_limit(ucwords( $itm->title),36) !!}</h4>
                </a>



                <div class="user-post">
                    <a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}">
                        <img src="{{ checkIfImageExists($itm->user->image) }}" alt="" class="user-img" style="cursor:pointer; border:2px solid #FF8A80;"></a>



                    <span>  <a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}" style="color: #262626; font-family: Conv_helveticaneuecyr-bold;">
                             {!! str_limit(ucwords($itm->user->fullName()),36) !!}
                        </a></span> -


                    <span style="font-family: Conv_helveticaneuecyr-bold;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $itm->created_at->diffForHumans()  }}</span>
                    <br>


                    <span class="icon" style="margin-left:30px;"><small><i class="fa fa-map-marker"></i>
                            @if (!empty($itm->user->location))
                                {{ $itm->user->location}},
                            @endif
                            {{ $itm->user->country->name}}</small>
                     </span>


                </div>

            </div>
        </div>
       @endforeach

          <div class="clearfix"></div>
          <br>


    </div>
@else
        <div class="col-md-3" style="margin-left:15px;">
            No results found.
        </div>
@endif
