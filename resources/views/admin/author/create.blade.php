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
                            <strong class="card-title"> Create User</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <form action="{{route('admin.user.store')}}" method="post">
                                @csrf
                                {{method_field('POST')}}

                                <div class="form-raw">
                                    <div class="col-md-6 form-group">
                                        <label for="">Name:</label>
                                        <input type="text" name="name"  class="form-control">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Email:</label>
                                        <input type="email" name="email"  class="form-control">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-raw">
                                    <div class="col-md-6 form-group">
                                        <span>Role:</span>
                                        <br>
                                        @foreach($roles as $role)
                                            <div class="form-check form-check-inline" >
                                                <input class="form-check-input " type="checkbox" name="roles[]" value="{{$role->id}}" >
                                                <label for="">{{$role->name}}</label>
                                            </div>
                                        @endforeach
                                        @error('roles')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Password:</label>
                                        <input type="password" name="password"  class="form-control">
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
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




