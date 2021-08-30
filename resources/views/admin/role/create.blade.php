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
                                        {!! Form::model($role,['route' => ['role.update',$role->id],'method'=>'post']) !!}
                                        <div class="form-group has-success">
                                            <label for="permission" class="control-label mb-1">Select Permission</label>
                                            {{Form::select('permission[]',$permission,$selectedPermission, ['class' => 'form-control standardSelect','data-placeholder'=>'Select Permission','multiple'])}}
                                            @error('permission')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @else
                                        {!! Form::open(['route' => 'role.store','method'=>'post']) !!}
                                        <div class="form-group has-success">
                                            <label for="permission" class="control-label mb-1">Select Permission</label>
                                            {{Form::select('permission[]',$permission,null, ['class' => 'form-control standardSelect','data-placeholder'=>'Select Permission','multiple'])}}
                                            @error('permission')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
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
                                                <span id="payment-button-amount">Set Role</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Multi Select</strong>
                            </div>
                            <div class="card-body">

                                <select data-placeholder="Choose a country..." multiple class="standardSelect">
                                    <option value=""></option>
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Aland Islands">Aland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                </select>

                            </div>
                        </div>
                </div><!--/.col-->
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->




@endsection



