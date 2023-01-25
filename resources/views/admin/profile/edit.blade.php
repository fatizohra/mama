@extends('admin.layouts.layout')

@section('title')

    Edit profile
    |

@endsection

@section('header')

@endsection


@section('content')

    <section class="content-header">
        <h1>
            Edit member
{{$profile->user->fullName()}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/profile')}}">Control Profile</a></li>
            <li class="active"><a href="{{url('/adminpanel/profile/'.$profile->id.'edit')}}">Edit profile of {{$profile->user->fullName()}}</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit member {{$profile->user->fullName()}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        {{--{!! Form::model( $profile,array ('url' => '/adminpanel/profile/' , 'method' => 'PATCH','files'=>true)) !!}--}}
                        {!! Form::model( $profile, ['url' => '/adminpanel/profile/'.$profile->id , 'method' => 'patch','files' =>true]) !!}
                            @include('admin.profile.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('footer')

@endsection

