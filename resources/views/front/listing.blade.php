@section('meta')
    <title>{{$categories->name}} - {{$systemData['websiteName']}}</title>
@endsection
@extends('front.layout.master')

@section('content')
    <section class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a class="text-success" href="{{route('front.home')}}">Home</a></li>
                    <li class="active"><a class="text-secondary">{{$categories->name}}</a></li>
                </ol>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                @foreach($posts as $val => $post)
                    @if ($val == 0)
                        <div class="entity_wrapper">
                            <div class="entity_title header_purple">
                                <h1><a href="category.html" target="_blank">{{$post->catname}}</a></h1>
                            </div>
                            <!-- entity_title -->

                            <div class="entity_thumb">
                                <img class="img-responsive" src="{{asset('public/postimage')}}/{{$post->main_image}}"
                                     alt="feature-top">
                            </div>
                            <!-- entity_thumb -->

                            <div class="entity_title">
                                <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}"
                                   target="_blank">
                                    <h3> {{$post->title}} </h3>
                                </a>
                            </div>
                            <!-- entity_title -->

                            <div class="entity_meta">
                                <i style="padding-right: 4px;"
                                   class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>, <i
                                    style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$post->authorname}}</a>, <i
                                    style="padding-right: 4px;" class="fa fa-eye"></i><a
                                >{{$post->view_count}}</a>
                            </div>
                            <!-- entity_meta -->

                            <div class="entity_content">
                                {!! str_limit($post->description,335,'.......') !!}
                            </div>
                            <!-- entity_content -->

                            <div class="entity_social">
                                <span><i class="fa fa-bars"></i> <a
                                        href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a> </span>
                                <span><i class="fa fa-eye"></i>{{$post->view_count}} <a href="#">Views</a> </span>
                            </div>
                            <!-- entity_social -->

                        </div>
                        <!-- entity_wrapper -->
                    @else
                        @if ($val == 1)
                            <div class="row">
                                @endif

                                <div style="height: 400px;" class="col-md-6">
                                    <div class="category_article_body">
                                        <div class="top_article_img">
                                            <img height="180px" width="350px" class="img-fluid"
                                                 src="{{asset('public/postimage')}}/{{$post->thumb_image}}"
                                                 alt="feature-top">
                                        </div>
                                        <!-- top_article_img -->

                                        <div class="category_article_title">
                                            <h3>
                                                <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}"
                                                   target="_blank">
                                                    {!! str_limit($post->title,100) !!}
                                                </a>
                                            </h3>
                                        </div>
                                        <!--
                                            category_article_title

                                            <span style="margin: 0px !important; padding: 0px !important;">
                                                <b>
                                                    <a style="width: 100%; font-size: 20px;color: dodgerblue" href=""></a>
                                                </b>
                                            </span>
                                             -->


                                        <div class="article_date">
                                            <i style="padding-right: 4px;"
                                               class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>,
                                            <i style="padding-right: 2px;" class="fa fa-user"></i>
                                            <a>{{$post->authorname}}</a>
                                        </div>
                                        <!-- article_date -->

                                        <div class="category_article_content">

                                            {!! str_limit($post->description,150,'.......') !!}
                                        </div>
                                        <!-- category_article_content -->

                                        <div class="article_social">
                                            <span><i class="fa fa-bars"></i> <a
                                                    href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a> </span>
                                            <span><i class="fa fa-eye"></i>{{$post->view_count}} <a href="#">Views</a> </span>
                                        </div>
                                        <!-- article_social -->

                                    </div>
                                    <!-- category_article_body -->

                                </div>
                                <!-- col-md-6 -->
                                @if ($loop -> last)
                            </div>
                            <!-- row -->
                        @endif

                    @endif

                @endforeach
                    <nav aria-label="Page navigation" class="pagination_section text-center">
                       {{$posts->links()}}
                    </nav>
            </div>


            <div class="col-md-4">
                @include('widget')
            </div>
            <!-- col-md-4 -->

        </div>
    </div>


@endsection

<!-- Right Section -->
