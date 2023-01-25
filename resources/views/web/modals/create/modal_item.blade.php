
<!-- Modal -->
<div class="modal fade" id="createitems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            {!! Form::open(['method' => 'POST','url' =>'/addItem/', 'class'=>'form-horizontal','files' => true]) !!}
            <div class="modal-header text-center">
                <b class="modal-title" id="exampleModalLongTitle">Add post</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="m">
                            @include('admin.item.form' , ['user' => 1])
                            <div class="col-md-4">
                                <file></file>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <p>
                    <button meta="submit" class="btn btn-warning">
                        &nbsp;{{ $submitTextButton }}
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </p>
                    {{--<button meta="submit" class="btn btn-warning">--}}
                        {{--<i class="fa fa-btn fa-user" style=".."></i>Cancel--}}
                    {{--</button>--}}

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>