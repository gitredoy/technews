@extends('admin.layout.master')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        @if(session('message'))
            <div class="col-sm-12">
            <div id="mydiv" class="alert  alert-success alert-dismissible fade show " role="alert">
                <span class="badge badge-pill badge-success">Success</span> {{Session('message')}}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </div>
        @endif

        <!-- Post Search Query -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Post Query </strong>

                </div>
                <div class="card-body">

                    <form  action="" method="post" >
                        @csrf
                        @method('POST')
                        <div class="form-row">
                            <div  class="col-md-12">
                                <input style="border: 2px solid cornflowerblue" type="text" id="postSearch" name="search" class="form-control" placeholder="Search Here">
                            </div>

                            <div   class="col-md-12 mt-2">
                                <style>
                                    table tr #td1 {
                                        width: 80%;
                                    }
                                    table tr #td2 {
                                        width: 20%;
                                    }
                                    table tr td img{
                                        float: right;
                                    }
                                </style>
                                <table class="table table-bordered">
                                    <thead>

                                    </thead>
                                    <tbody  id="SearchResult">


                                    </tbody>
                                </table>




                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Post Search Query -->

        <div class="col-lg-3 col-md-6">
            <div class="social-box facebook">
                <i class="fa fa-dashcube"></i>
               <h5 class="mt-2"> <b>POST</b></h5>
                <span class="count text-primary"><b>{{$allPost->count()}}</b></span>
                <ul style="margin-top: -10px !important;">
                    <li>
                        <strong><span class="count">{{$publishPost->count()}}</span></strong>
                        <span>Publish</span>
                    </li>
                    <li>
                        <strong><span class="count">{{$UnpublishPost->count()}}</span></strong>
                        <span>Unpublish</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div><!--/.col-->


        <div class="col-lg-3 col-md-6">
            <div class="social-box twitter">
                <i class="fa fa-feed"></i>
                <h5 class="mt-2"> <b>CATEGORY</b></h5>
                <span class="count text-primary"><b>{{$allCat->count()}}</b></span>
                <ul style="margin-top: -10px !important;">
                    <li>
                        <strong><span class="count">{{$publishCat->count()}}</span></strong>
                        <span>Publish</span>
                    </li>
                    <li>
                        <strong><span class="count">{{$UnpublishCat->count()}}</span></strong>
                        <span>Unpublish</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div><!--/.col-->


        <div class="col-lg-3 col-md-6">
            <div class="social-box linkedin">
                <i class="fa fa-gavel"></i>
                <h5 class="mt-2"> <b>COMMENT</b></h5>
                <span class="count text-primary"><b>{{$allCom->count()}}</b></span>
                <ul style="margin-top: -10px !important;">
                    <li>
                        <strong><span class="count">{{$publishCom->count()}}</span></strong>
                        <span>Publish</span>
                    </li>
                    <li>
                        <strong><span class="count">{{$UnpublishCom->count()}}</span></strong>
                        <span>Unpublish</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div><!--/.col-->


        <div class="col-lg-3 col-md-6">
            <div class="social-box google-plus">
                <i class="fa fa-tags"></i>
                <h5 class="mt-2"> <b>TAG</b></h5>
                <span class="count text-primary"><b>{{$allTag->count()}}</b></span>
                <ul style="margin-top: -10px !important;">
                    <li>
                        <strong><span class="count">{{$allTag->count()}}</span></strong>
                        <span>Total</span>
                    </li>
                    <li>
                        <strong><span class="count">0</span></strong>
                        <span>Unpublish</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div><!--/.col-->

        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <strong class="card-title">Most Popular Post</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">View</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($viewPost as $key => $post)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td><a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">{{$post->title}} <i class="fa fa-link"></i></a></td>
                                    <td>{{$post->view_count}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <strong class="card-title text-light">Most Commented Post</strong>

                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Comments</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($topcomment as $key => $post)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td><a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">{{$post->title}} <i class="fa fa-link"></i></a></td>
                                        <td>{{$post->comments->count()}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
