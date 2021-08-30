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
                        <li><a class="text-primary" href="{{route('admin.style.index')}}">{{$breadcrumb1}}</a></li>
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
                                        {!! Form::model($style,['route' => ['admin.style.update','style' => $style->id],'method'=>'PUT']) !!}

                                    @else
                                        {!! Form::open(['route' => 'admin.style.store','method'=>'post']) !!}

                                    @endif

                                    <div class="rows">
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <label for="category" class="control-label mb-1">Select Category:<span class="text-danger">*</span></label>
                                                {{Form::select('category',$categories,null, ['class' => 'form-control','data-placeholder'=>'Select Category'])}}
                                                @error('category')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <label for="limit" class="control-label mb-1">Post Limit:<span class="text-danger">*</span></label>
                                                {{Form::number('limit',null, ['class' => 'form-control','id' =>'limit','placeholder'=>'Post Limit'])}}
                                                @error('limit')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>





                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Set Style</span>
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



