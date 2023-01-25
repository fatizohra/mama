@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h1><b>Congratulations! You've successfully changed your password.</b></h1>
                    <div class="col-xs-6">
                        <a href="{{ url('/home') }}" class="btn btn-azure btn-block"> Continue to LinkedIn</a>
                    </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection