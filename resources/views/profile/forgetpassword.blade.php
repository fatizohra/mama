@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h1 class="flow-h1">Let’s find your account</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="reg-form-container">
                     <div class="panel panel-default">
                    <div class="panel-heading">Please enter your email</div>
                    <div class="panel-body">
                        <form method="post" action="{{url('/request-password')}}" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="submit" value="Reset Password" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
@endsection