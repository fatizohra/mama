@extends('layouts.app')
@section('title')
    Edit item {{ $itemInfo ->job_title }}
@endsection
@section('header')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="m">

                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Edit this Item </b></div>

                        <div class="panel-body">
                            {{--{!! Form::model( $user, ['url' => '/user/editSetting/' , 'method' => 'patch','files' =>true]) !!}--}}
                            {!! Form::model( $itemInfo ,['url' => '/editItem/success' , 'method' => 'patch','files'=>true]) !!}
                            {{--why --}}
                            <input type="hidden" name="id" value="{{ $itemInfo->id }}">
                                @include('admin.item.form' , ['user' => 1])
                            <div class="col-md-1 pull-left">
                                <button  class="btn btn-warning">Delete</button>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- photos-ad -->
@endsection

@section('footer')
@endsection
