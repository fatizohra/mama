@extends('layouts.app')
@section('title')
    Help Center |
@endsection
@section('header')
<style>
    p{
       color:#8eb4cb;
        font-style: oblique;
    }
</style>
@endsection

@section('content')

    <div class="container">
        <div id="content">
            <div class="container">
                <div class="row" style="background:#FF8A80; padding:20px;">
                    <div class="col-md-12 text-center">
                        <b style="color:#ffffff;font-size: 30px;"> Using {{ getSetting() }} </b>
                    </div>
                </div>
                <div class ="clearfix"></div>
                <br>
                <!-- About -->
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-9">

                            <div class="col-md-12">

                            <div class="col-md-1">
                                <p style="font-size: 5em">1</p>
                            </div>
                            <div class="col-md-9" style="margin-top:40px;">
                      <h4>Getting started with {{ getSetting() }}</h4>
                                  First make sure you are signed up and have selected your country where
                                you would like to find great oppties. Once you’ve logged into seize, you will find suggested oppties
                                from your country in your wall , if you like any of your suggested oppties then you can follow the user
                                who added it by clicking follow button.
                                <small>NB: A message will be sent to you to verify your email.</small>
                                <hr>
                            </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <p style="font-size: 5em">2</p>
                                </div>
                                <div class="col-md-9" style="margin-top:40px;">

                                   <h4>Complete your profile</h4>
                                    Check out your profile settings and share some general
                                    information about yourself , and add your location so other people can find you. 

                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <p style="font-size: 5em">3</p>
                                </div>
                                <div class="col-md-9" style="margin-top:40px;">

                                   <h4>Add, Edit or delete an oppty</h4>
                                    To add an oppty, click the plus  (+) button in you profile. A screen will pop up asking you to select the image  and to fill the information
                                    plus the website (if exists) related to your oppty  and then click save.<br>
                                    In your profile , you will find all your oppties that you have added, down each oppty there is a settings icon,
                                    when you click on it ,you will see two options which allow you to edit  or delete your oppty.
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <p style="font-size: 5em">4</p>
                                </div>
                                <div class="col-md-9" style="margin-top:40px;">
                                    <h4> Like and comment an oppties</h4>
                                    Assuming You liked someone's oppty , and you want to save
                                    it so you can see it later , you will find heart icon in each oppty details ,
                                    press it and it will be saved in your favourite list.
                                    You can also add comments to your oppties or your friends' oppties by clicking
                                    on the comment button.

                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <p style="font-size: 5em">5</p>
                                </div>
                                <div class="col-md-9" style="margin-top:40px;">
                                    <h4> Following and followers</h4>
                                    You can see who is following you and who you do following by clicking followings or followers buttons on your profile page
                                    when you follow other users , you will see their oppties in your wall , and anytime your followings add new oppty ,you will receive a notification.
                                    Other users can follow you and see your oppties in their wall.
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <p style="font-size: 5em">6</p>
                                </div>
                                <div class="col-md-9" style="margin-top:40px;">
                                    <h4> Search for people  using Seizop living in the same country so you can follow them</h4>
                                    You can find other seize users to follow using several ways:
                                    go to search in the header of the website , and use keywords (first name, last name, location)
                                    Search for opts in your country using keywords .
                                    check the opts suggested in explore page .
                                    view your following or followers profiles and look at their followers or following.
                                    <hr>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <p style="font-size: 5em">7</p>
                                </div>
                                <div class="col-md-9" style="margin-top:40px;">
                                    <h4>  Deactivate account</h4>
                                    To deactivate your account, head to your Settings page and click 'Deactivate my account.'
                                    <br>
                                    When you deactivate your account, all your oppties will be deactivated till you log in again.
                                    <hr>

                                    <small><b style="color:red">NB:</b> Oppty is the abbreviation of opportunity</small>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

