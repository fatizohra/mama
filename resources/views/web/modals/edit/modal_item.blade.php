<!-- Modal -->
<div class="modal fade" id= "edititems{{$itm->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::model( $itm ,['url' => '/editItem/success' , 'method' => 'patch','files' => true]) !!}
            <input type="hidden" name="id" value="{{ $itm->id }}">
            <div class="modal-header text-center">
                <b class="modal-title" id="exampleModalLongTitle">Edit post</b>
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
                                 <file item_image="{{ $itm->image}}"></file>
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
                {!! Form::close() !!}

                <div class="success margin-top-20">
                    @include('layouts/message')
                </div>

            </div>
        </div>
    </div>
</div>