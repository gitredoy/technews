<section id="subscribe_section" class="subscribe_section">
    <div class="row">
        <form class="form-horizontal">
            <div class="form-group form-group-lg">
                <label class="col-sm-6 control-label" for="formGroupInputLarge">
                    <h1><span class="red-color">Sign up</span> for the latest news</h1>
                </label>

                <div class="col-sm-3">
                    <input type="text" id="subscribe" name="subscribe" class="form-control input-lg">
                </div>
                <div class="col-sm-1">
                    <input type="submit" value="Sign Up" class="btn btn-large pink">
                </div>
                <div class="col-sm-2"></div>
            </div>
        </form>
    </div>
</section>
<section id="footer_section" class="footer_section">
    <div class="container">
        <hr class="footer-top">
        <div class="row">
            <div class="col-md-3">
                <div ><h3 style="border-bottom: 2px solid deepskyblue;"><b><a>About Tech</a></b></h3></div>
                <div class="logo footer-logo">
                    <a title="fontanero" href="{{route('front.home')}}">
                        <img src="{{asset('public/systemimage')}}/{{$systemData['fontLogo']}}"
                             alt="{{$systemData['websiteName']}}">
                    </a>

                    <p class=" text-justify">
                        Competently conceptualize go forward testing procedures and B2B expertise. Phosfluorescently cultivate principle-centered methods.of empowerment through fully researched. Competently conceptualize go forward testing procedures and B2B expertise. Phosfluorescently cultivate principle-centered methods.of empowerment through fully researched. Competently conceptualize go forward testing procedures and B2B expertise. Phosfluorescently cultivate principle-centered methods.of empowerment through fully researched.
                    </p>
                </div>
            </div>
            <div class="col-md-1">
                <div>
                    <h3 style="border-bottom: 2px solid deepskyblue;"><b><a>Discover</a></b></h3>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="list-unstyled left">
                            @foreach ($menucat as $item)
                                <li>
                                    <a href="{{route('catpost.list',['catslug'=>$item->catslug])}}">{{$item->catname}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <h3 style="border-bottom: 2px solid deepskyblue;"><b><a>Editor Picks</a></b></h3>
                </div>
                @foreach($recent as $post)
                    <div class="media">

                        <div class="media-left">
                            <a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">
                                <img style="height: 66px !important; width: 66px !important;" class="media-object"
                                     src="{{asset('public/postimage')}}/{{$post->list_image}}" alt="{{$post->title}}">
                            </a>
                        </div>

                        <div class="media-body">

                            <h3 class="media-heading">
                                <a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}"
                                   target="_self">{{$post->title}}</a>
                            </h3>
                            <div class="widget_article_social">
                                <span>
                                    <a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}"
                                       target="_self"> <i class="fa fa-eye"></i>Read More</a>
                                </span>
                                <span>
                                    <a target="_self"><i class="fa fa-eye"></i>{{$post->view_count}}</a> Views
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="">
                    <h3 style="border-bottom: 2px solid deepskyblue;"><b><a >Random Post By Photo</a></b></h3>
                </div>
                <div class="widget_photos">
                    @foreach ($random as $post)
                        <a href="{{route('details.full',['category'=>$post->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">
                            <img style="height: 83px !important; width: 62px !important;" class="img-thumbnail" src="{{asset('public/postimage')}}/{{$post->list_image}}"
                                 alt="Tech Photos">
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="footer_bottom_Section">
        <div class="container">
            <div class="row">
                <div class="footer">
                    <div class="col-sm-3">
                        <div class="social">
                            <a href="https://facebook.com/nasim.redoy" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic"><i class="fa fa-instagram"> </i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic"><i class="fa fa-tumblr"> </i></a>
                            <!--Pinterest-->
                            <a class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p>&copy; Copyright {{date('Y')}}-Tech News . Developed by: <a href="https://facebook.com/nasim.redoy">Nasim Redoy</a>
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <p>{{$systemData['websiteName']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
