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
                        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                        <li><a class="text-primary" href="{{route('permission.create')}}">{{$breadcrumb1}}</a></li>
                        <li  class="bold active">{{$breadcrumb2}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row justify-content-md-center">
                <div class=" col-md-8">
                    @if(session('message'))

                    <div class="alert  alert-success alert-dismissible fade show " role="alert">
                       <span class="badge badge-pill badge-success">Success</span> {{Session('message')}}.
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    @endif
                    <div class="card mt-3">
                        <div class="card-header bg-info">
                            <strong class="card-title">{{$breadcrumb2}}</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Permission</h3>
                                    </div>
                                    <hr>
                                    @if ($mode == 'edit')
                                        {!! Form::model($permissions,['route' => ['permission.update',$permissions->id],'method'=>'post']) !!}
                                    @else
                                        {!! Form::open(['route' => 'permission.store','method'=>'post']) !!}
                                    @endif


                                        <div class="form-group has-success">
                                            <label for="name" class="control-label mb-1">Name</label>
                                            {{Form::text('name',null, ['class' => 'form-control','id' =>'name','placeholder'=>'Name'])}}
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group has-success">
                                            <label for="display_name" class="control-label mb-1">Display Name</label>
                                            {{Form::text('display_name',null, ['class' => 'form-control','id' =>'display_name','placeholder'=>'Display Name'])}}
                                            @error('display_name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group has-success">
                                            <label for="description" class="control-label mb-1">Description</label>
                                            {{Form::textarea('description',null, ['class' => 'form-control','id' =>'description','placeholder'=>'Description'])}}
                                            @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Set Permission</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->
                </div><!--/.col-->
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection



