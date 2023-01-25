


<div class="modal fade" id="deleteitem{{$itm->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Are you sure?
            </div>
            <div class="modal-body">
                Once you delete this opp, you can't undo it!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="{{url('/deleteItem/'.$itm->id)}}" class="btn btn-danger btn-ok">Delete</a>

                {{--<a href="{{url('/deleteItem/'.$itm->id)}}">Edit member {{$user->name}}</a>--}}
            </div>
        </div>
    </div>
</div>