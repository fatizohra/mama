@extends('admin.layouts.layout')

@section('title')
    Edit comment
@endsection

@section('header')
@endsection
@section('content')
    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="content-header">
        <h1>
            Edit comment of
            {{$comment->user->fullName()}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/comment')}}">Control comments</a></li>
            <li class="active"><a href="{{url('/adminpanel/comment/'.$comment->id.'edit')}}">Edit comment  {{$comment->user->fullName()}}</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit comment of {{$comment->user->fullName()}}</h3>
                    </div>
                    <div class="box-body">
                        {!!Form::model($comment,array('url'=>'/adminpanel/comment/'.$comment->id, 'method' => 'PATCH','files' =>true))!!}
                            @include('admin.comment.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
@endsection