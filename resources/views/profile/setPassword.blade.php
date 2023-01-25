@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1><b>Choose a new password</b></h1></div>
                    <div class="panel-body">
                        <form method="get" action="{{url('/setPass')}}" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">{{$data[0]->email}}</label>--}}

                                        <input type="hidden" name="email" value="{{$data[0]->email}}">

                            </div>
                                <div class="row">
                                    <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class=" col-md-6">
                                            <label for="email" class="control-label">New password</label>
                                            <input id="password" type="password" name="pass" class="form-control" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class ="clearfix"></div>
                                <br>

                                <div class="row">
                                    <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class=" col-md-6">
                                            <label for="email" class="control-label">Retype new password</label>
                                            <input id="password" type="password" class="form-control" name="confrim_pass" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            <div class ="clearfix"></div>
                            <br>

                            <div class="form-group">
                                <div class="col-md-6 ">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection