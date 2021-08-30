@section('meta')
    <title>{{$systemData['websiteName']}}</title>
@endsection
@extends('front.layout.master')

@section('preloader')
    <style>
        @media only screen and (max-width: 600px) {
            #mypreloader{
                display: none;
            }
        }
    </style>
    <div class="mypreloader" id="mypreloader">
        <img  src="https://miro.medium.com/max/1600/1*CsJ05WEGfunYMLGfsT2sXA.gif" class="img-responsive  center-block">
        <!-- <p class="text-center loadText">Loading...</p> -->
    </div>
@endsection
@section('content')


    <!-- Feature News Section -->
    <section id="feature_news_section" class="feature_news_section">

        <div style="margin-top: -27px; margin-bottom: 0px;" class="container">
            <div class="row">
                <div class="col-md-2">
                    <img height="24px" src="{{asset('public/systemimage/breakingnews.png')}}" alt="breakingnews">
                </div>
                <div class="col-md-10">
                    <style>
                        #marA{
                            font-size: 16px;
                            font-weight: bold;
                            font-family: FontAwesome;
                            text-transform: capitalize;
                        }

                    </style>
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                        <div class="example1">
                            @php
                                $last_key =  end($recent);
                            @endphp
                            @foreach ($recent as $key => $post)
                              <a id="marA" href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">{{$post->title}}</a>
                              @if ($last_key != $loop->last)
                                    <span style="padding: 0px 5px 0px 5px" class="text-primary"> <i class="fa fa-exchange"></i> </span>
                              @else
                                 {{' '}}
                              @endif
                            @endforeach
                        </div>
                    </marquee>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="feature_article_wrapper">
                        <div class="feature_article_img">
                            <style>
                                @media only screen and (min-width: 992px) {
                                    #hotimg{
                                        height: 570px !important;
                                        width: 753px !important;
                                    }
                                }
                            </style>
                            <img id="hotimg" class="img-responsive top_static_article_img" src="{{asset('public/postimage')}}/{{$hotnews->main_image}}"
                                 alt="{{$hotnews->title}}">
                        </div>
                        <!-- feature_article_img -->

                        <div class="feature_article_inner">
                            <div class="tag_lg red"><a>Hot News</a></div>
                            <div class="feature_article_title">
                                <h1><a href="{{route('details.full',['category'=>$hotnews->category->catslug,'id'=>$hotnews->id,'slug'=>$hotnews->slug])}}" target="_self">{{$hotnews->title}} </a></h1>
                            </div>
                            <!-- feature_article_title -->

                            <div class="feature_article_date">

                                <i style="padding-right: 4px;" class="fa fa-calendar"></i><a>{{$hotnews->created_at->diffForHumans()}}</a>,  <i style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$hotnews->author->name}}</a>, <i style="padding-right: 4px;" class="fa fa-eye"></i><a
                                >{{$hotnews->view_count}}</a>
                            </div>
                            <!-- feature_article_date -->

                            <div style="text-align: justify;color: black" class="feature_article_content">
                                {!! str_limit($hotnews->description,180) !!}
                            </div>
                            <!-- feature_article_content -->

                            <div class="article_social">
                                <span><i class="fa fa-eye-slash"></i><a href="{{route('details.full',['category'=>$hotnews->category->catslug,'id'=>$hotnews->id,'slug'=>$hotnews->slug])}}">Read More</a></span>
                                <span><i class="fa fa-comments-o"></i><a href="{{route('details.full',['category'=>$hotnews->category->catslug,'id'=>$hotnews->id,'slug'=>$hotnews->slug])}}">{{$hotnews->comments->count()}}</a>Comments</span>
                            </div>
                            <!-- article_social -->

                        </div>
                        <!-- feature_article_inner -->

                    </div>
                    <!-- feature_article_wrapper -->
                </div>
                <!-- col-md-7 -->
                @foreach($toptwo as $top)
                <div class="col-md-5" style="margin-bottom: 3%">
                    <div class="feature_static_wrapper">
                        <div class="feature_article_img">
                            <img class="img-responsive" style="height: 270px !important; width: 460px !important;"  src="{{asset('public/postimage')}}/{{$top->thumb_image}}" alt="{{$top->title}}">
                        </div>
                        <!-- feature_article_img -->

                        <div class="feature_article_inner">
                            <div class="tag_lg purple"><a>Top Viewed</a></div>
                            <div class="feature_article_title">
                                <h1 style="line-height: 0.9em; !important;" ><a style="font-size: 15px !important;" href="{{route('details.full',['category'=>$top->category->catslug,'id'=>$top->id,'slug'=>$top->slug])}}" target="_self">{{$top->title}}</a></h1>
                            </div>
                            <!-- feature_article_title -->

                            <div class="feature_article_date">
                                <i style="padding-right: 4px;" class="fa fa-calendar"></i><a style="margin-right: 2px !important ;">{{$top->created_at->toFormattedDateString()}}</a>, <i style="padding-right: 2px;" class="fa fa-user"></i> <a >{{optional($top->author)->name}}</a> , <i style="padding-right: 4px;" class="fa fa-eye"></i><a>{{$top->view_count}}</a>
                            </div>
                            <!-- feature_article_date -->

                            <div class="feature_article_content">
                                {!! str_limit($top->description,130) !!}
                            </div>
                            <!-- feature_article_content -->

                            <div class="article_social">
                                <span><i class="fa fa-eye-slash"></i><a href="{{route('details.full',['category'=>$top->category->catslug,'id'=>$top->id,'slug'=>$top->slug])}}">Read More</a></span>
                                <span><i class="fa fa-comments-o"></i><a href="{{route('details.full',['category'=>$top->category->catslug,'id'=>$top->id,'slug'=>$top->slug])}}">{{$top->comments->count()}}</a>Comments</span>
                            </div>
                            <!-- article_social -->

                        </div>
                        <!-- feature_article_inner -->

                    </div>
                    <!-- feature_static_wrapper -->

                </div>
                @endforeach
                <!-- col-md-5 -->

                <!-- col-md-5 -->
            </div>
            <!-- Row -->
        </div>
        <!-- container -->

    </section>
    <!-- Feature News Section -->

    <section id="category_section" class="category_section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    @include('front.style.horizontal')
                    <!-- Mobile News Section -->

                    @include('front.style.bothhalf')
                    <!-- Gadget News Section -->

                    @include('front.style.square')
                    <!-- Design News Section -->

                    @include('front.style.vertical')
                    <!-- Camera News Section -->

                </div>


                <!-- Left Section -->
                 <div class="col-md-4">
                     @include('widget')
                 </div>
                <!-- Right Section -->

            </div>
            <!-- Row -->

        </div>
        <!-- Container -->

    </section>
    <!-- Category News Section -->

    <section id="video_section" class="video_section">
        <div class="container">
            <div class="well">
                <div class="row">
                    <div class="col-md-6">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MJ-jbFdUPns"
                                    frameborder="0" allowfullscreen></iframe>
                        </div>
                        <!-- embed-responsive -->

                    </div>
                    <!-- col-md-6 -->

                    <div class="col-md-3">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/h5Jni-vy_5M"></iframe>
                        </div>
                        <!-- embed-responsive -->

                        <div class="embed-responsive embed-responsive-4by3 m16">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wQ5Gj0UB_R8"></iframe>
                        </div>
                        <!-- embed-responsive -->

                    </div>
                    <!-- col-md-3 -->

                    <div class="col-md-3">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UPvJXBI_3V4"></iframe>
                        </div>
                        <!-- embed-responsive -->

                        <div class="embed-responsive embed-responsive-4by3 m16">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTCtj5Wz6BM"></iframe>
                        </div>
                        <!-- embed-responsive -->

                    </div>
                    <!-- col-md-3 -->

                </div>
                <!-- row -->

            </div>
            <!-- well -->

        </div>
        <!-- Container -->

    </section>
    <!-- Video News Section -->
@endsection
