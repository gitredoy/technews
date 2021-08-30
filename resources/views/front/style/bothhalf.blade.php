<div class="category_section gadget">

    <div class="category_article_wrapper">

        <div class="row">
            <div class="col-md-6">
                @foreach($firsthalf as $key => $post)
                    @if ($key == 0)
                        <div class="article_title header_pink">
                            <h2>
                                <a class="text-success text-capitalize" href="{{route('catpost.list',['catslug'=>$post->catslug])}}" target="_self">
                                    {{$post->catname}}
                                </a>

                            </h2>
                        </div>
                    @endif
                    @if ($key == 0)
                        <div class="category_article_body">
                            <div class="top_article_img">
                                <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                    <img class="img-responsive" src="{{asset('public/postimage')}}/{{$post->thumb_image}}" alt="{{$post->title}}">
                                </a>
                            </div>
                            <!-- top_article_img -->

                            <span style="background: lightseagreen !important;" class="tag">
                                <a class="text-capitalize" href="{{route('catpost.list',['catslug'=>$post->catslug])}}" target="_self">
                                    {{$post->catname}}
                                </a>

                            </span>

                            <div class="category_article_title">
                                <h3>
                                    <a   href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                        {{$post->title}}
                                    </a>
                                </h3>
                            </div>
                            <!-- category_article_title -->

                            <div class="article_date">
                                <i style="padding-right: 4px;" class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>,  <i style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$post->authorname}}</a>
                            </div>
                            <!----article_date------>
                            <div class="category_article_content">
                                {!! str_limit($post->description,120).'...' !!}
                            </div>
                            <!-- category_article_content -->

                            <div class="media_social">
                                <span><i class="fa fa-bars"></i> <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a></span>
                                <span><a ><i class="fa fa fa-eye"></i>{{$post->view_count}}</a> Views</span>
                            </div>
                            <!-- media_social -->

                        </div>
                        <!-- category_article_body -->
                    @else
                        @if ($key == 1)
                            <div class="category_article_list">
                                @endif

                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">
                                            <img class="media-object" src="{{asset('public/postimage')}}/{{$post->list_image}}" alt="{{$post->title}}">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="media-heading">
                                            <a data-toggle="tooltip" data-placement="top" title="{{$post->title}}"  href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                                {{$post->title}}
                                            </a>
                                        </h3>
                                        <span class="media-date">
                                           <i style="padding-right: 4px;" class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>,  <i style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$post->authorname}}</a>
                                        </span>

                                        <div class="media_social">
                                            <span><i class="fa fa-bars"></i> <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a></span>
                                            <span><a ><i class="fa fa fa-eye"></i>{{$post->view_count}}</a> Views</span>
                                        </div>
                                    </div>
                                </div>
                                @if ($loop->last)
                            </div>
                        @endif

                    @endif
                <!-- category_article_list -->
                @endforeach

                <div>
                    @foreach($firsthalf as $key => $post)
                        @if ($key == 0)
                            <p style="border-bottom: 1px solid #EEEEEE; width: 100%" class="pull-right">
                                <button class="btn btn-sm pull-right"
                                        onclick="window.location.href='{{route('catpost.list',['catslug'=>$post->catslug])}}'">More News&nbsp;&raquo;
                                </button>

                            </p>
                        @endif
                    @endforeach
                </div>

            </div>
            <!-- col-md-6 -->
            <style>
                @media only screen and (max-width: 600px) {
                    .mobilemergin{
                        margin-top: 30px;
                    }
                }

            </style>
            <div  class="col-md-6 mobilemergin">
                @foreach($secondhalf as $key => $post)
                    @if ($key == 0)
                        <div class="article_title header_blue">
                            <h2>
                                <a class="text-primary text-capitalize" href="{{route('catpost.list',['catslug'=>$post->catslug])}}" target="_self">
                                    {{$post->catname}}
                                </a>

                            </h2>
                        </div>
                    @endif
                    @if ($key == 0)
                        <div class="category_article_body">
                            <div class="top_article_img">
                                <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                    <img class="img-responsive" src="{{asset('public/postimage')}}/{{$post->thumb_image}}" alt="{{$post->title}}">
                                </a>
                            </div>
                            <!-- top_article_img -->

                            <span style="background: dodgerblue !important;" class="tag">
                                <a class="text-capitalize" href="{{route('catpost.list',['catslug'=>$post->catslug])}}" target="_self">
                                    {{$post->catname}}
                                </a>
                            </span>

                            <div class="category_article_title">
                                <h3>
                                    <a  href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">{{$post->title}}</a>
                                </h3>
                            </div>
                            <!-- category_article_title -->

                            <div class="article_date">
                                <i style="padding-right: 4px;" class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>,  <i style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$post->authorname}}</a>
                            </div>
                            <!----article_date------>
                            <div class="category_article_content">
                                {!! str_limit($post->description,120).'...' !!}
                            </div>
                            <!-- category_article_content -->

                            <div class="media_social">
                                <span><i class="fa fa-bars"></i> <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a></span>
                                <span><a ><i class="fa fa fa-eye"></i>{{$post->view_count}}</a> Views</span>
                            </div>
                            <!-- media_social -->

                        </div>
                        <!-- category_article_body -->
                    @else
                        @if ($key == 1)
                            <div class="category_article_list">
                                @endif

                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">
                                            <img class="media-object" src="{{asset('public/postimage')}}/{{$post->list_image}}" alt="{{$post->title}}">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="media-heading">
                                            <a data-toggle="tooltip" data-placement="top" title="{{$post->title}}"  href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                                {{$post->title}}
                                            </a>
                                        </h3>
                                        <span class="media-date">
                                           <i style="padding-right: 4px;" class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>,  <i style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$post->authorname}}</a>
                                        </span>

                                        <div class="media_social">
                                            <span><i class="fa fa-bars"></i> <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a></span>
                                            <span><a ><i class="fa fa fa-eye"></i>{{$post->view_count}}</a> Views</span>
                                        </div>
                                    </div>
                                </div>
                                @if ($loop->last)
                            </div>
                        @endif

                    @endif
                <!-- category_article_list -->
                @endforeach
                @foreach($secondhalf as $key => $post)
                    @if ($key == 0)
                        <p style="border-bottom: 1px solid #EEEEEE; width: 100%" class="pull-right">
                            <button class="btn btn-sm pull-right" onclick="window.location.href='{{route('catpost.list',['catslug'=>$post->catslug])}}'">
                                More News&nbsp;&raquo;
                            </button>
                        </p>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- row -->

    </div>
    <!-- category_article_wrapper -->

</div>
