<div class="category_section design">
    @foreach($square as $key=> $post)
        @if ($key == 0)
            <div class="article_title header_blue">
                <h2><a class="text-capitalize" href="{{route('catpost.list',['catslug'=>$post->catslug])}}" target="_self">{{$post->catname}}</a></h2>
            </div>
        @endif
    @endforeach
<!-- row -->
    <!-- row -->

    <div class="category_article_wrapper">
        <div class="row">
            @foreach($square as $post)
                <div style=" height: 570px;" class="col-md-6">
                    <div class="category_article_body">
                        <div class="top_article_img">
                            <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                <img class="img-responsive" src="{{asset('public/postimage')}}/{{$post->thumb_image}}"
                                     alt="feature-top">
                            </a>
                        </div>
                        <!-- top_article_img -->

                        <span  class="tag blue">
                            <a class="text-capitalize" href="{{route('catpost.list',['catslug'=>$post->catslug])}}" target="_self">{{$post->catname}}</a>
                        </span>

                        <div style="margin-top: 7px !important;"  class="category_article_title">
                            <h3>
                                <a  data-toggle="tooltip" data-placement="top" title="{{$post->title}}"   href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                    {{str_limit($post->title,100)}}
                                </a>
                            </h3>
                        </div>
                        <!-- category_article_title -->

                        <div class="category_article_date">
                            <i style="padding-right: 4px;" class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>,  <i style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$post->authorname}}</a>
                        </div>
                        <!----category_article_date------>
                        <!-- category_article_date -->

                        <div style="text-align: justify !important;" class="category_article_content">

                            {!! str_limit($post->description,200) !!}
                        </div>
                        <!-- category_article_content -->

                        <div class="media_social">
                            <span><i class="fa fa-bars"></i> <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a></span>
                            <span><a ><i class="fa fa fa-eye"></i>{{$post->view_count}}</a> Views</span>
                        </div>
                        <!-- media_social -->

                    </div>
                    <!-- category_article_body -->

                </div>
                <!-- col-md-6 -->
            @endforeach
        </div>
        <!-- row -->

    </div>
    <!-- category_article_wrapper -->


    @foreach($square as $key=> $cpost)
        @if ($key == 0)
                <p style="border-bottom: 1px solid #EEEEEE; width: 100%" class="pull-right">
                    <button  class="btn btn-sm pull-right" onclick="window.location.href='{{route('catpost.list',['catslug'=>$cpost->catslug])}}'" >More News&nbsp;&raquo;</button>
                </p>

        @endif
    @endforeach
</div>
<!-- Design News Section -->
