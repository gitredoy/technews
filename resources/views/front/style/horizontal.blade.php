<div class="category_section mobile">

    @foreach($horizontal as $key=> $post)
        @if ($key == 0)
            <div class="article_title header_purple">
                <h2><a href="{{route('catpost.list',['catslug'=>$post->catslug])}}" target="_self">{{$post->catname}}</a></h2>
            </div>
        @endif

    <!----article_title------>
        @if ($key == 0)
            <div class="category_article_wrapper">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top_article_img">
                            <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                <img class="img-responsive" src="{{'public/postimage'}}/{{$post->main_image}}"
                                     alt="{{$post->title}}">
                            </a>
                        </div>
                        <!----top_article_img------>
                    </div>
                    <div class="col-md-6">
                        <span class="tag purple"><a href="{{route('catpost.list',['catslug'=>$post->catslug])}}">{{$post->catname}}</a></span>

                        <div class="category_article_title">
                            <h3>
                                <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                    {{$post->title}}
                                </a>
                            </h3>
                        </div>
                        <!----category_article_title------>
                        <div class="category_article_date">
                            <i style="padding-right: 4px;" class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>,  <i style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$post->authorname}}</a>

                        </div>
                        <!----category_article_date------>
                        <div class="category_article_content">
                            {!! str_limit($post->description,190) !!}
                        </div>
                        <!----category_article_content------>
                        <div class="media_social">
                            <span><i class="fa fa-bars"></i> <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a></span>
                            <span><a ><i class="fa fa fa-eye"></i>{{$post->view_count}}</a> Views</span>
                        </div>
                        <!----media_social------>
                    </div>
                </div>
            </div>
        @else
            @if ($key == 1)
                <div class="category_article_wrapper">
                    <div class="row">
                        @endif
                        <div class="col-md-6">
                            <div style="margin-bottom: 20px !important;" class="media">
                                <div class="media-left">
                                    <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" ><img class="media-object"
                                                     src="{{'public/postimage'}}/{{$post->list_image}}"
                                                     alt="{{$post->title}}"></a>
                                </div>
                                <div class="media-body">
                                    <span class="tag purple"><a href="{{route('catpost.list',['catslug'=>$post->catslug])}}">{{$post->catname}}</a></span>

                                    <h3 class="media-heading">
                                        <a data-toggle="tooltip" data-placement="top" title="{{$post->title}}" href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}" target="_self">
                                            {!! str_limit($post->title,60) !!}
                                        </a>
                                    </h3>
                                    <span class="media-date">
                                       <i style="padding-right: 4px;" class="fa fa-calendar"></i><a>{{date('F j Y',strtotime($post->created_at))}}</a>,  <i style="padding-right: 2px;" class="fa fa-user"></i> <a>{{$post->authorname}}</a>
                                    </span>

                                    <div class="media_social">
                                        <span><i class="fa fa-bars"></i> <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">Read More</a></span>
                                        <span><a href="#"><i class="fa fa fa-eye"></i>{{$post->view_count}}</a> Views</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @if ($loop -> last)
                    </div>
                </div>
            @endif
        @endif



    @endforeach



    @foreach($horizontal as $key=> $post)
        @if ($key == 0)
                <p style="border-bottom: 1px solid #EEEEEE; width: 100%" class="pull-right">
                    <button  class="btn btn-sm pull-right" onclick="window.location.href='{{route('catpost.list',['catslug'=>$post->catslug])}}'" >More News&nbsp;&raquo;</button>
                </p>
        @endif
    @endforeach

</div>
