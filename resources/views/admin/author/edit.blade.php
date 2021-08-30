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
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">Basic</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row justify-content-md-center">
                <div class=" col-md-8">
                    <div class="card">
                        <div class="card-header bg-info">
                            <strong class="card-title"> Edit User</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <form action="{{route('admin.user.update',['user'=>$user->id])}}" method="post">
                                @csrf
                                {{method_field('PUT')}}

                                <div class="form-raw">
                                  <div class="col-md-6 form-group">
                                      <label for="">Name:</label>
                                      <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                  </div>
                                  <div class="col-md-6 form-group">
                                      <label for="">Email:</label>
                                      <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                  </div>
                                </div>

                                <div class="form-raw">
                                   <div class="col-md-6 form-group">
                                       <span>Role:</span>
                                       <br>
                                       @foreach($roles as $role)
                                           <div class="form-check form-check-inline" >
                                               <input class="form-check-input " type="checkbox" name="roles[]" value="{{$role->id}}" {{$user->hasAnyRole($role->name)?'checked':''}} >
                                               <label for="">{{$role->name}}</label>
                                           </div>
                                       @endforeach
                                   </div>
                                   <div class="col-md-6 form-group">
                                       <label for="">Password:</label>
                                       <input type="password" name="password" value="" class="form-control">
                                   </div>
                                </div>
                                <div class="form-raw">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div> <!-- .card -->
                </div><!--/.col-->
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection




