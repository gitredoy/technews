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
                        <li><a class="text-primary" href="">{{$breadcrumb1}}</a></li>
                        <li  class="bold active">{{$breadcrumb2}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <div class="animated">
            <div class="rows">
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
                            <strong class="card-title"><a class="text-dark" href="{{route('author.post.index')}}">{{$post->title}}</a></strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Submitted On</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($comments as $key => $list)

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$list->name}}</td>
                                        <td>{{$list->email}}</td>
                                        <td>{{str_limit($list->message,35).'...'}}<a class="text-success" data-toggle="modal" href="#exampleModal{{$list->id}}"> Read More</a> </td>
                                        <td>
                                            {!! Form::open(['route' => ['author.comment.status','id'=>$list->id],'method'=>'post']) !!}
                                            @if($list->status == 1)
                                                {{ Form::submit('Hide',['class'=>'btn btn-danger btn-sm'])  }}
                                            @else
                                                {{ Form::submit('Visible',['class'=>'btn btn-success btn-sm'])  }}
                                            @endif
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            time
                                        </td>
                                        <td>
                                            <form action="{{route('author.comment.destroy',['id'=>$list->id])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Are You Sure ? ')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{$post->title}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <p class="text-justify"> {{$list->message}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::open(['route' => ['author.comment.status','id'=>$list->id],'method'=>'post']) !!}
                                                        @if($list->status == 1)
                                                            {{ Form::submit('Hide',['class'=>'btn btn-danger btn-sm'])  }}
                                                        @else
                                                            {{ Form::submit('Visible',['class'=>'btn btn-success btn-sm'])  }}
                                                        @endif
                                                        {!! Form::close() !!}
                                                        <!--- Comment Delete -->
                                                            <form action="{{route('author.comment.destroy',['id'=>$list->id])}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" onclick="return confirm('Are You Sure ? ')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
