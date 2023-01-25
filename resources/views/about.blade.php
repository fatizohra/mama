@extends('layouts.app')
@section('title')
    Help Center |
@endsection
@section('header')
<style>
    p{
       color:#000000;

    }
</style>
@endsection

@section('content')

    <div class="container">
        <div id="content">
            <div class="container">
                <div class="row" style="background:#FF8A80; padding:20px;">
                    <div class="col-md-12 text-center">
                        <b style="color:#ffffff;font-size: 30px;"> About {{ getSetting() }} </b>
                    </div>
                </div>
                <div class ="clearfix"></div>
                <br>
                <!-- About -->
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="profile-content">
                       <p> The purpose of {{ getSetting() }} is to create a bridge between different users and a means of communication for
                        a beneficial exchange of opportunities in all areas.<br>
                          {{ getSetting() }} Helps people to put the opportunities in all categories they discover at the disposal of the people who matter to them.
                           <br><small>For example: A good deal for sale, A job opportunities, Holidays deals, Multi services deals, Properties deals...etc.</small>

                        <br>
                        {{ getSetting() }} has been designed to serve you and make your life easier, you can use it to connect with millions of people around the world.<br>

                       </p>
                       <h3 style="color:red">
                           NB:  {{ getSetting() }} is intended ONLY for the exchange of information and opportunities and is NOT intended for sales or purchase transactions, so

                           Don't share anything which is your own deal for sale.</h3>


</div>
                </div>
            </div>
        </div>
    </div>

@endsection

