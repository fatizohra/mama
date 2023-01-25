@if(count($myItems)>0)

        @foreach($myItems as $key => $itm)
            {{--@if($key % 4 ==0 && $key!=0)--}}
            {{--<div class="clearfix">--}}
            {{--</div>--}}

            {{--@endif--}}
            <div class="col-md-3">
                <div class="productbox">
                    <a href="{{ url('/opp/view/'.$itm->id)}}" title="{{ $itm->title }}">
                        <img id="newProfileImg" src="{{ url('/website/thumb/'.$itm->image) }}" class="img-responsive">
                    </a>

                    <a href="{{ url('/opp/view/'.$itm->id)}}" class="post-title" title="{{ $itm->title }}">
                        <h4> {!! str_limit(ucwords( $itm->title),36) !!}</h4>
                    </a>

                    <div class="user-post">
                        <a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}">
                            <img src="{{ checkIfImageExists($itm->user->image) }}" alt=""
                                 class="user-img" style="cursor:pointer; border:2px solid #FF8A80;">
                        </a>
                        <span><a href="{{ url ('/profile') }}/{{$itm->user->profile->username }}"
                                 style="color: #262626; font-family: Conv_helveticaneuecyr-bold;">
                                                                      {!! str_limit(ucwords($itm->user->fullName()),15) !!}
                                                    </a></span>-
                        <span><small><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $itm->created_at->diffForHumans()  }}</small></span>
                        <br>
                        <br>
                        <span class="icon" style="margin-left:30px;"><small><i class="fa fa-map-marker"></i>
                                @if (!empty($itm->user->location))
                                    {{ $itm->user->location}},
                                @endif
                                {{ $itm->user->country->name}}</small>
                                                         </span>
                        @if($itm->user_id == Auth::user()->id)
                            <div class="col-md-1 pull-right">

                                <!-- delete button goes here -->
                                <a href="#" data-toggle="dropdown" style="font-size:15px"><i class="fa fa-cog"></i></a>
                                <div class="dropdown-menu">
                                    <li>
                                        <a role="button" data-toggle="modal"
                                           data-target="#edititems{{$itm->id}}">
                                            Edit
                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <li>
                                        <a role="button" data-toggle="modal"
                                           data-target="#deleteitem{{$itm->id}}">
                                            Delete
                                        </a>
                                    </li>
                                </div>
                            </div>
                            @include('web.modals.edit.modal_item',['submitTextButton' => 'Save'])
                            @include('web.modals.delete.modal_item')
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    <div class="clearfix"></div>
    <br>
    <div class="loading" style="text-align:center">
        <img src="{{ url('images/loading.gif') }}" style="width:100px;height:100px">
    </div>
@else
    No results found.
@endif