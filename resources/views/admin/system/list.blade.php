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
                        <li><a class="text-primary" href="{{route('admin.system.index')}}">{{$breadcrumb1}}</a></li>
                        <li  class="bold active">{{$breadcrumb2}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated">
            <div class="rows ">

                <div class="col-md-12">
                    @if(session('message'))

                        <div id="mydiv" class="alert  alert-success alert-dismissible fade show " role="alert">
                            <span class="badge badge-pill badge-success">Success</span> {{Session('message')}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>

               <div class="card">
                   <div class="card-header">
                       Website Basic Information

                       {{$systemData['websiteName']}}
                   </div>
                   <div class="card-body">
                       <div class="col-md-6">
                           <form   action="{{route('admin.system.update',['id'=>$name->id])}}" method="post">
                               @csrf
                               @method('PUT')
                               <div class="rows">
                                   <div class="col-md-2">
                                       <label>Website Name</label>
                                   </div>
                                   <div class="col-md-8">
                                       <input required type="text" value="{{$name->value}}" name="name" class="form-control">
                                   </div>
                                   <div class="col-md-2 ">
                                       <button type="submit" class="btn btn-primary ">Save</button>
                                   </div>
                               </div>
                           </form>

                       </div>

                       <div class="col-md-6">
                           <form   action="{{route('admin.system.update',['id'=>$favicon->id])}}" method="post" enctype="multipart/form-data">
                               @csrf
                               @method('PUT')
                               <div class="rows">
                                   <div class="col-md-2">
                                       <label>Favicon</label>
                                   </div>
                                   <div class="col-md-8">
                                       <input type="file" name="value" required onchange="loadFile(event)" id="file"  class="form-control">
                                       <div class="rows ">
                                           <div class="col-md-6">
                                               <img class="img-responsive mt-2 mb-2" src="{{asset('public/systemimage')}}/{{$favicon->value}}" alt="">
                                           </div>
                                           <div class="col-md-6">
                                               <p class="mt-2 mb-2" ><img id="output" class="img-responsive" /></p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-2 ">
                                       <button type="submit" class="btn btn-primary ">Save</button>
                                   </div>
                               </div>
                           </form>

                       </div>

                       <div class="col-md-6">
                           <form   action="{{route('admin.system.update',['id'=>$font->id])}}" method="post" enctype="multipart/form-data">
                               @csrf
                               @method('PUT')
                               <div class="rows">
                                   <div class="col-md-2">
                                       <label>Frontend Logo</label>
                                   </div>
                                   <div class="col-md-8">
                                       <input required onchange="loadFile2(event)" id="file" type="file" name="value" class="form-control">
                                      <div class="rows">
                                          <div class="col-md-6">
                                              <img class="img-responsive mt-2 mb-2" src="{{asset('public/systemimage')}}/{{$font->value}}" alt="">
                                          </div>
                                          <div class="col-md-6">
                                              <p class="mt-2 mb-2" ><img id="output2" class="img-responsive" /></p>
                                          </div>
                                      </div>
                                   </div>
                                   <div class="col-md-2 ">
                                       <button type="submit" class="btn btn-primary ">Save</button>
                                   </div>
                               </div>
                           </form>

                       </div>

                       <div class="col-md-6">
                           <form   action="{{route('admin.system.update',['id'=>$back->id])}}" method="post" enctype="multipart/form-data">
                               @csrf
                               @method('PUT')
                               <div class="rows">
                                   <div class="col-md-2">
                                       <label> Backend Logo</label>
                                   </div>
                                   <div class="col-md-8">
                                       <input required onchange="loadFile3(event)" id="file" type="file" name="value" class="form-control">
                                       <div class="rows">
                                           <div class="col-md-6">
                                               <img class="img-responsive mt-2 mb-2" src="{{asset('public/systemimage')}}/{{$back->value}}" alt="">
                                           </div>
                                           <div class="col-md-6">
                                               <p class="mt-2 mb-2" ><img id="output3" class="img-responsive" /></p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-2 ">
                                       <button type="submit" class="btn btn-primary ">Save</button>
                                   </div>
                               </div>
                           </form>

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

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFile2 = function(event) {
            var image = document.getElementById('output2');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFile3 = function(event) {
            var image = document.getElementById('output3');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
