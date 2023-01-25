


<div class="modal fade" id="desactivateaccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Sorry to see you go!
            </div>
            <div class="modal-body">
                You’re welcome back any time―just log in with your email and your password.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="{{url('/desactivateAccount/')}}" class="btn btn-danger btn-ok">Okay</a>

                {{--<a href="{{url('/deleteItem/'.$itm->id)}}">Edit member {{$user->name}}</a>--}}
            </div>
        </div>
    </div>
</div>