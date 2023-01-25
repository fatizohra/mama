@extends('layouts.app')
@section('title')

@endsection

@section('content')

    <div class="container">
        <div class="row profile">


            <div class="col-md-9">

                <div class="profile-content">

                    <div class="alert alert-danger">
                            <b>important</b>
                      {{ $messageBody }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

@endsection

@section('footer')
@endsection
