@extends('admin.layouts.layout')

@section('title')

    Add new Item
    |

@endsection

@section('header')
    {!! Html::style('css/select2.css') !!}

@endsection


@section('content')

    <section class="content-header">
        <h1>
            Add member

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/bu')}}">Control items</a></li>
            <li class="active"><a href="{{url('/adminpanel/bu/create')}}">Add new item</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add new item</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open( ['url' => '/adminpanel/bu' , 'method' => 'post','files' =>true]) !!}
                          @include('admin.item.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('footer')

@endsection
