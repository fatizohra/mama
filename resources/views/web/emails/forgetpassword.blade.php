@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

           <b> Hi
               @if(isset($name)){{ $name->firstname }}@endif </b>
            <div class ="clearfix"></div>
            <br>

            You submitted a request to reset your password<br>
            <div class ="clearfix"></div>
            <br>
            <div class="col-md-4">

                <a href="{{ $baseUrl }}" class="btn btn-azure"> Reset your password</a>
            </div>
            <div class ="clearfix"></div>
            <br>
            Thank you for using {{getSetting()}}<br>
            The {{getSetting()}} team

        </div>
        <div class ="clearfix"></div>
        <br>
        <div class="row" style="background:#f6f7f8;">

            The link will remain active for 48 hours. After that, you'll have to submit a  <a href="{{ url('/forgetPassword') }}">new request</a> .
             If you didn’t request this change or if you believe an unauthorized person has accessed your account, please <a href="{{ url('/contact us') }}">contact us</a>.
        </div>

     </div>
@endsection
