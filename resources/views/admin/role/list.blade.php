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
                        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                        <li><a class="text-primary" href="{{route('role.create')}}">{{$breadcrumb1}}</a></li>
                        <li  class="bold active">{{$breadcrumb2}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row justify-content-md-center">

                <div class="col-md-10">
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
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($role as $key => $list)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->display_name}}</td>
                                    <td>{{$list->description}}</td>
                                    <td>
                                        @if ($list->perms())
                                            <ul>
                                                @foreach($list->perms()->get() as $permission)
                                                    <li style="list-style: none"><a>{{$permission->name}}</a></li>
                                                @endforeach
                                            </ul>

                                        @endif
                                    </td>
                                    <td>

                                        <form action="{{route('role.delete',['id' => $list->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a class="btn btn-sm btn-success" href="{{ route('role.edit',['id' => $list->id])}}"><i class="fa fa-pencil-square"></i></a>
                                            <button type="submit" onclick="return confirm('Are You Sure ')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>

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
