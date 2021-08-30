@extends('admin.layout.master')
@section('extra-css')
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
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
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li><a class="text-primary" href="{{route('author.post.create')}}">{{$breadcrumb1}}</a></li>
                        <li  class="bold active">{{$breadcrumb2}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row ">

                <div class="col-md-12">
                    @if(session('message'))

                        <div id="mydiv" class="alert  alert-success alert-dismissible fade show " role="alert">
                            <span class="badge badge-pill badge-success">Success</span> {{Session('message')}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{$breadcrumb2}}</strong>
                            <a  class="btn btn-primary float-right" href="{{route('author.post.create')}}">Create Post</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Comment</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Hot News</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $key => $list)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        @if (file_exists(public_path('/postimage/').$list->thumb_image))
                                            <img height="100px" width="130px" src="{{asset('public/postimage')}}/{{$list->thumb_image}}" alt="Post Thumb Image" class="img img-responsive">
                                        @endif
                                    </td>
                                    <td>{{$list->title}}</td>
                                    <td>
                                      {{optional($list->author)->name}}
                                    </td>
                                    <td>{{optional($list->category)->name}}</td>
                                    <td>
                                        <ul class="pl-2">
                                        @foreach($list->tags as $tag)
                                        <li >{{$tag->name}}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td><a class="text-dark"  href="{{route('author.comment.post',['author'=>$list->created_by,'post'=>$list->id])}}"><i  class="fa fa-envelope fa-lg"> </i><span style="background-color: white; border-radius: 50%; font-size: 23px;padding: 5px" >{{$list->comments->count()}}</span></a></td>
                                    <td>{{$list->view_count}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['author.post.status','id'=>$list->id],'method'=>'post']) !!}
                                        @if($list->status == 1)
                                            {{ Form::submit('Unpublish',['class'=>'btn btn-danger btn-sm'])  }}
                                        @else
                                            {{ Form::submit('Publish',['class'=>'btn btn-success btn-sm'])  }}
                                        @endif
                                        {!! Form::close() !!}

                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['author.hotnews','id'=>$list->id],'method'=>'post']) !!}
                                        @if($list->hot_news == 0)
                                            {{ Form::submit('Active',['class'=>'btn btn-success btn-sm'])  }}
                                        @else
                                            {{ Form::submit('Deactive',['class'=>'btn btn-danger btn-sm'])  }}
                                        @endif
                                        {!! Form::close() !!}

                                    </td>

                                    <td>

                                        <form action="{{route('author.post.destroy',['post' => $list->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a class="btn btn-sm btn-success" href="{{ route('author.post.edit',['post' => $list->id])}}"><i class="fa fa-pencil-square"></i></a>
                                            <button type="submit" onclick="return confirm('Are You Sure ? ')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                        {{$list->created_at->toFormattedDateString()}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div>
@endsection

@section('extra-js')
    <script src="{{asset('public/admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/lib/data-table/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
@endsection
