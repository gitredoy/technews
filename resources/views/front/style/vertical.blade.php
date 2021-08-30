<div class="category_section camera">
    @foreach($vertical as $key=> $cpost)
        @if ($key == 0)
            <div class="article_title header_orange">
                <h2><a class="text-capitalize" href="{{route('catpost.list',['catslug'=>$cpost->catslug])}}" target="_self">{{$cpost->catname}}</a></h2>
            </div>
        @endif
    @endforeach


    <!-- article_title -->
        @foreach($vertical as $post)
            <div style="margin-bottom: 10px !important;" class="category_article_wrapper">
                <div class="row">

                        <div class="col-md-5">
                            <div class="top_article_img">
                                <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                    <img class="img-responsive" src="{{asset('public/postimage')}}/{{$post->thumb_image}}" alt="feature-top">
                                </a>
                            </div>
                            <!-- top_article_img -->

                        </div>
                        <div class="col-md-7">
                            <span class="tag orange"><a href="{{route('catpost.list',['catslug'=>$post->catslug])}}">{{$post->catname}}</a></span>

                            <div class="category_article_title">
                                <h3><a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">{{$post->title}} </a></h3>
                            </div>
                            <!-- category_article_title -->

                            <div class="article_date">
                                <i style="padding-right: 4px;" class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>,  <i style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$post->authorname}}</a>
                            </div>
                            <!----article_date------>
                            <!-- category_article_wrapper -->

                            <div class="category_article_content">
                               {!! str_limit($post->description,150) !!}
                            </div>
                            <!-- category_article_content -->

                            <div class="media_social">
                                <span><i class="fa fa-bars"></i> <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a></span>
                                <span><a ><i class="fa fa fa-eye"></i>{{$post->view_count}}</a> Views</span>
                            </div>
                            <!-- media_social -->

                        </div>
                        <!-- col-md-7 -->


                </div>
                <!-- row -->
            </div>
        @endforeach

    <!-- category_article_wrapper -->


        @foreach($vertical as $key=> $cpost)
            @if ($key == 0)
                <p style="border-bottom: 1px solid #EEEEEE; width: 100%" class="pull-right">
                    <button  class="btn btn-sm pull-right" onclick="window.location.href='{{route('catpost.list',['catslug'=>$post->catslug])}}'" >More News&nbsp;&raquo;</button>
                </p>
            @endif
        @endforeach
</div>
