@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-left:30px">
           <b>Hello!</b>
            <div class="clearfix"></div>
            <br>
            Please verify your account email to continue
            <div class="clearfix"></div>
            <br>

            <a href="{{ route('verify',$token)}}" class="btn btn-azure">Verify Account</a>
            <div class="clearfix"></div>
            <br>
            Thank you for using our website<br>
            The In team
            <div class="clearfix"></div>
            <br>

        </div>
        <hr>
        <div class="clearfix"></div>
        <br>
        <small>
            If you’re having trouble clicking the "Verify account" button, copy and paste the URL below into your web browser</small>
        <a href="{{ route('verify',$token)}}">{{ route('verify',$token) }}</a><br>
    </div>
@endsection
