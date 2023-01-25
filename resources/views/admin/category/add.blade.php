@extends('admin.layouts.layout')

@section('title')

    Add new SubCategory
    |

@endsection

@section('header')

<style>
    article
    {
    width: 80%;
    margin:auto;
    margin-top:10px;
    }


    .thumbnail{

    height: 100px;
    margin: 10px;
    }
</style>

@endsection


@section('content')

    <section class="content-header">
        <h1>
            Add new Category

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/category')}}">Control categories</a></li>
            <li class="active"><a href="{{url('/adminpanel/category/create')}}">Add new category</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add new category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        {!! Form::open( ['url' => '/adminpanel/category' , 'method' => 'post','files'=>true]) !!}
                       {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/adminpanel/category') }}">--}}
                          @include('admin.category.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('footer')
    {!! Html::script('cus/js/select2.js') !!}
    <script type="text/javascript">
        $('.select2').select2();

        window.onload = function(){

            //Check File API support
            if(window.File && window.FileList && window.FileReader)
            {
                var filesInput = document.getElementById("files");

                filesInput.addEventListener("change", function(event){

                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result");

                    for(var i = 0; i< files.length; i++)
                    {
                        var file = files[i];

                        //Only pics
                        if(!file.type.match('image'))
                            continue;

                        var picReader = new FileReader();

                        picReader.addEventListener("load",function(event){

                            var picFile = event.target;

                            var div = document.createElement("div");

                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/> <a href='#' class='remove_pict'>X</a>";

                            output.insertBefore(div,null);
                            div.children[1].addEventListener("click", function(event){
                                div.parentNode.removeChild(div);
                            });

                        });

                        //Read the image
                        picReader.readAsDataURL(file);
                    }

                });
            }
            else
            {
                console.log("Your browser does not support File API");
            }
        }

    </script>

@endsection
