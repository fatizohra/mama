@foreach($users as $user)
    <li class="{{url('/profile')}}/">
        <a href="#">
            <div class="row">
                <div class="col-md-2 pull-left">
                    <img src="{{ checkIfImageExists($user->pic) }}"
                         width="48px" height="48px"
                         style="margin-bottom:5px;"
                         class="img-circle img-user"/>
                </div>
                <div class="col-md-7">
                    {!! str_limit(ucwords($user->fullName()),10) !!}
                    {{--{{ucwords($user->fullName())}}--}}
                </div>
                <div class="col-md-2">
                    <follower profile_user_id="{{ $user->id }}"
                              user_id="{{Auth::user()->id}}"></follower>
                </div>
            </div>
        </a>
    </li>
@endforeach