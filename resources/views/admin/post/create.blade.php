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
                <div class=" col-md-12">
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
                                    <form action="">

                                    </form>
                                    <hr>
                                    @if ($mode == 'edit')
                                        {!! Form::model($posts,['route' => ['author.post.update','post' => $posts->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                                    @else
                                        {!! Form::open(['route' => 'author.post.store','method'=>'post','enctype'=>'multipart/form-data']) !!}

                                    @endif
                                    <div class="row">
                                        <div class="col-md-9">
                                            <!-- Title -->
                                            <div class="card">
                                                <div class="card-header bg-flat-color-5">
                                                    <b>Title</b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group has-success">
                                                        {{Form::text('title',null, ['class' => 'form-control','id' =>'title','placeholder'=>'Title'])}}
                                                        @error('title')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                       <span style="display: none">
                                                            {{Form::textarea('slugUrl',null, ['rows'=>'1','class' => 'form-control','id' =>'slugUrl','placeholder'=>''])}}
                                                       </span>
                                                       <p style="color: blueviolet;padding: 5px;text-align: center;" id="showUrl"></p>


                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Short Description -->
                                            <div class="card">
                                                <div class="card-header bg-flat-color-5">
                                                    <b>Short Description</b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group has-success">
                                                        {{Form::textarea('short_description',null, ['rows'=>'3','class' => 'form-control','id' =>'short_description','placeholder'=>'Short Description'])}}
                                                        @error('short_description')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  Description -->
                                            <div class="card">
                                                <div class="card-header bg-flat-color-5">
                                                    <b>Description</b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group has-success">
                                                        {{Form::textarea('description',null, ['class' => 'form-control postTextArea','id' =>'postTextArea','placeholder'=>'Description'])}}
                                                        @error('description')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <!-- Category -->
                                            <div class="card">
                                                <div class="card-header bg-secondary">
                                                    <b>Category</b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group has-success">
                                                        {{Form::select('category_id',$categories,null, ['class' => 'form-control standardSelect','data-placeholder'=>'Select Category'])}}
                                                        @error('category_id')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tags -->
                                            <div class="card">
                                                <div class="card-header bg-primary">
                                                  <b>Tags</b>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-group has-success">

                                                        {{Form::select('tags[]',$tags,null, ['class' => 'form-control standardSelect','data-placeholder'=>'Select Category','multiple'])}}
                                                        @error('category_id')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- Image -->
                                            <div class="card">
                                                <div class="card-header bg-success">
                                                    <b>Featured Image</b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group has-success">
                                                        <label for="file" class="control-label mb-1"><span style="color: blue; text-decoration: underline; cursor: pointer" >Set Featured Image:</span><span class="text-danger">*</span></label>
                                                        {{Form::file('image', ['class' => 'form-control','accept'=>'image/*','onchange'=>'loadFile(event)','style'=>'display:none' ,'id' =>'file','placeholder'=>'Image'])}}
                                                        @error('image')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group">
                                                        <p class="mt-2 mb-3" ><img id="output" width="200" /></p>
                                                        @if ($mode == 'edit')
                                                            <img  src="{{asset('public/postimage')}}/{{$posts->thumb_image}}" alt="Post Thumb Image" class="img img-responsive">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-9">
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Publish Post</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </div>

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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="{{asset('public/admin/assets/tinymce/tinymce.js')}}"></script>

    <!-- TinyMCE my-editor -->

    <script type="text/javascript">
        $(document).ready(function() {
            tinymce.init({
                selector: "textarea#postTextArea",
                height: 450,
                relative_urls: false,
                paste_data_images: true,
                image_title: true,
                automatic_uploads: true,
                images_upload_url: "/postimage",
                file_picker_types: "image",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar1:
                    "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                // override default upload handler to simulate successful upload
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement("input");
                    input.setAttribute("type", "file");
                    input.setAttribute("accept", "image/*");
                    input.onchange = function() {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function() {
                            var id = "blobid" + new Date().getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(",")[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                    };
                    input.click();
                }
            });
        });
    </script>
    <script>
        $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor');
            CKEDITOR.config.height = 300;

            //TinyMCE
            tinymce.init({
                selector: "textarea#postTextArea",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";

            tinyMCE.baseURL = '{{asset('public/admin/assets/tinymce')}}';
        });
    </script>


<!-- Image View Before Upload -->
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<!-- Post Slug Url Generate and Show -->
<script>
    $(document).ready(function (){
        $('#title').on('keyup',function (){
            var text1 = $(this).val();
            var text2 = text1.split(' ');
            var url = text2.join('-');
            document.getElementById("slugUrl").innerHTML = url;
            document.getElementById("showUrl").innerHTML = url;
            console.log(text1);
        });
    });
</script>

