<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Recently Add</a></h2>
    </div>
    @foreach ($recent as $post)
        <div class="media">

            <div class="media-left">
                <a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">
                    <img class="media-object" src="{{asset('public/postimage')}}/{{$post->list_image}}" alt="{{$post->title}}">
                </a>
            </div>

            <div class="media-body">

                <h3 class="media-heading">
                    <a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}"
                       target="_self">{{$post->title}}</a>
                </h3>
                <span
                    class="media-date"><a>{{$post->created_at->diffForHumans()}}</a>,  by: <a>{{$post->author->name}}</a></span>

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
<!-- Recent News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive adv_img" src="{{asset('public/front/assets/img/right_add1.jpg')}}" alt="add_one">
    <img class="img-responsive adv_img" src="{{asset('public/front/assets/img/right_add2.jpg')}}" alt="add_one">
    <img class="img-responsive adv_img" src="{{asset('public/front/assets/img/right_add3.jpg')}}" alt="add_one">
    <img class="img-responsive adv_img" src="{{asset('public/front/assets/img/right_add4.jpg')}}" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{asset('public/front/assets/img/right_add5.jpg')}}" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget reviews m30">
    <div class="widget_title widget_black">
        <h2><a>Popular News</a></h2>
    </div>
    @foreach ($popular as $post)
        <div class="media">

            <div class="media-left">
                <a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">
                    <img class="media-object" src="{{asset('public/postimage')}}/{{$post->list_image}}"
                         alt="{{$post->title}}"></a>
            </div>

            <div class="media-body">

                <h3 class="media-heading">
                    <a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}"
                       target="_self">{{$post->title}}</a>
                </h3>

                <div class="widget_article_social">
                    <span>
                     <a target="_self"><i class="fa fa-eye"></i>{{$post->view_count}}</a> Views
                    </span>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- Popular News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{asset('public/front/assets/img/right_add6.jpg')}}" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Commented</a></h2>
    </div>
    @foreach ($topcomment as $post)
        <div class="media">
            <div class="media-left">
                <a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">
                    <img class="media-object" src="{{asset('public/postimage')}}/{{$post->list_image}}"
                         alt="{{$post->title}}"></a>
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}"
                       target="_self">{{$post->title}}</a>
                </h3>

                <div class="media_social">
                    <span><i class="fa fa-comments-o"></i><a href="{{route('details.full',['category'=>$post->category->catslug,'id'=>$post->id,'slug'=>$post->slug])}}">{{$post->comments->count()}}</a> Comments</span>
                </div>
            </div>
        </div>
    @endforeach

</div>
<!-- Most Commented News -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Editor Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="{{asset('public/front/assets/img/editor.jpg')}}"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!-- Editor News -->
<!--
<div class="widget hidden-xs m30">
    <img class="img-responsive add_img" src="{{asset('public/front/assets/img/right_add7.jpg')}}" alt="add_one">
    <img class="img-responsive add_img" src="{{asset('public/front/assets/img/right_add7.jpg')}}" alt="add_one">
    <img class="img-responsive add_img" src="{{asset('public/front/assets/img/right_add7.jpg')}}" alt="add_one">
    <img class="img-responsive add_img" src="{{asset('public/front/assets/img/right_add7.jpg')}}" alt="add_one">
</div>
-->
<!--Advertisement -->



<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a>Login Here </a></h2>
    </div>
    <div class="widget_body">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <form  method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label>Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                        @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror


                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="checkbox">
                        <label>
                            <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember Me
                        </label>
                        <label class="pull-right">
                            <p>Don't have account ? <a href="{{route('register')}}"> Sign Up Here</a></p>
                        </label>



                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat m-b-30 m-t-30">LOG IN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--  Readers Corner News -->
<!--
<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{asset('public/front/assets/img/podcast.jpg')}}" alt="add_one">
</div>
-->
<!--Advertisement-->

