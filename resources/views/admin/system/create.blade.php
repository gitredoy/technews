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
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li><a class="text-primary" href="{{route('admin.system.index')}}">{{$breadcrumb1}}</a></li>
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
                                        <h3 class="text-center">{{$breadcrumb1}}</h3>
                                    </div>
                                    <hr>
                                    @if ($mode == 'edit')
                                        {!! Form::model($system,['route' => ['admin.system.update','system' => $system->id],'method'=>'PUT']) !!}

                                    @else
                                        {!! Form::open(['route' => 'admin.system.store','method'=>'post']) !!}

                                    @endif

                                        <div class="form-group has-success">
                                            <label for="name" class="control-label mb-1">Site Name:<span class="text-danger">*</span></label>
                                            {{Form::text('value',null, ['class' => 'form-control','id' =>'name','placeholder'=>'Name'])}}
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    <div class="form-group has-success">
                                        <label for="name" class="control-label mb-1">Site Name:<span class="text-danger">*</span></label>
                                        {{Form::text('value',null, ['class' => 'form-control','id' =>'name','placeholder'=>'Name'])}}
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group has-success">
                                        <label for="name" class="control-label mb-1">Site Name:<span class="text-danger">*</span></label>
                                        {{Form::text('value',null, ['class' => 'form-control','id' =>'name','placeholder'=>'Name'])}}
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group has-success">
                                        <label for="name" class="control-label mb-1">Site Name:<span class="text-danger">*</span></label>
                                        {{Form::text('value',null, ['class' => 'form-control','id' =>'name','placeholder'=>'Name'])}}
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>



                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Create Category</span>
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



