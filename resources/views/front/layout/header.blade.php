<section id="header_section_wrapper" class="header_section_wrapper">

    <div class="container">
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                        <span class="date">{{date("l")}} .</span>
                        <!-- Date -->
                        <span class="time">{{date("j F").' . '.date("Y")}} </span>
                        <!-- Time -->
                        <div class="social">
                            <a href="" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic"><i class="fa fa-instagram"> </i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic"><i class="fa fa-tumblr"> </i></a>
                            <!--Pinterest-->
                            <a class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
                        </div>
                        <!-- Top Social Section -->
                    </div>
                    <!-- Left Header Section -->
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <a href="{{route('front.home')}}">
                            <img  src="{{asset('public/systemimage')}}/{{$systemData['fontLogo']}}" alt="{{$systemData['websiteName']}}">
                        </a>
                    </div>
                    <!-- Logo Section -->
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('login')}}">Login</a></li>
                            <li><a href="{{route('register')}}">Register</a></li>


                            <li style=""  class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul   class="dropdown-menu">
                                    <li>
                                        <div  class="head-search">
                                            <form role="form" method="get" action="{{route('front.search')}}">
                                                <!-- Input Group -->
                                                <div class="input-group">
                                                    <input type="text" name="fontquery" class="form-control" placeholder="Type Something">
                                                    <span style="margin-top: -2px;" class="input-group-btn">
                                                        <button style="margin-top: -1px;" type="submit" class="btn btn-primary">
                                                            Search
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                            <table class="table">
                                                <thead>

                                                </thead>
                                                <tbody id="fontSearch">

                                                </tbody>
                                            </table>

                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <!-- Language Section -->

                        <!-- Search Section -->
                    </div>
                    <!-- Right Header Section -->
                </div>
            </div>
        </div>
        <!-- Header Section -->

        <div style="" class="navigation-section">

            <nav style="" class="navbar m-menu navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav">
                            <li ><a class="{{request()->is('/') ? 'bg-info' : '' }}" href="{{route('front.home')}}">Home</a></li>
                            @foreach ($menucat as $key => $pst)
                                <li class="dropdown m-menu-fw  ">
                                    <a class="{{request()->is('listing/'.$pst->catslug) ? 'bg-info' : '' }} {{request()->is('details/'.$pst->catslug.'*') ? 'bg-info' : '' }}" style=" cursor: pointer " href="{{route('catpost.list',['catslug'=>$pst->catslug])}}">
                                    {{$pst->catname}}
                                    @if ($pst->limit > 0)
                                            <span style="margin-left: -4px"><i class="{{request()->is('listing/'.$pst->catslug) ? 'fa fa-angle-down' : 'fa fa-angle-up' }} {{request()->is('details/'.$pst->catslug.'*') ? 'fa fa-angle-down' : 'fa fa-angle-up' }}   "></i></span>
                                    @endif
                                    </a>
                                    <p   data-toggle="dropdown" class="dropdown-toggle">
                                    </p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="m-menu-content">
                                                @php
                                                $catpost = DB::table('posts')
                                                          ->where('category_id',$pst->catid)
                                                          ->where('status',0)
                                                          ->orderBy('id','desc')
                                                          ->limit($pst->limit)
                                                          ->get();
                                                @endphp
                                                @foreach ($catpost as $key => $post)
                                                    @if ($key == 0)
                                                        <ul class="col-sm-4">
                                                            <li>
                                                                <img style="cursor: pointer" onclick="window.location.href='{{route('details.full',['category'=>$pst->catslug,'id'=>$post->id,'slug'=>$post->slug])}}'" height="210px" width="350px"  src="{{asset('public/postimage')}}/{{$post->main_image}}" alt="">
                                                                <h3 style="color: darkslategray; text-transform: capitalize;" class="card-text">
                                                                    <b style="cursor: pointer" onclick="window.location.href='{{route('details.full',['category'=>$pst->catslug,'id'=>$post->id,'slug'=>$post->slug])}}'">
                                                                        {{$post->title}}
                                                                    </b>
                                                                </h3>
                                                                <p style="margin-top: -8px !important;color: darkslategray;"> <i class="fa fa-clock-o"></i> {{date('F j Y',strtotime($post->created_at))}}</p>

                                                            </li>
                                                        </ul>
                                                    @else
                                                        @if ($key == 1)
                                                            <ul class="col-sm-8">
                                                                <li>
                                                                    <div class="row">
                                                                        @endif
                                                                        <div style="margin-bottom: 5px" class="col-md-6">
                                                                            <div class="card">
                                                                                <div class="row no-gutters">
                                                                                    <div class="col-md-3">
                                                                                        <img style="cursor: pointer" onclick="window.location.href='{{route('details.full',['category'=>$pst->catslug,'id'=>$post->id,'slug'=>$post->slug])}}'" class="img-responsive" src="{{asset('public/postimage')}}/{{$post->list_image}}" alt="{{$post->title}}">
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="card-body">
                                                                                            <p style="color: darkslategray; text-transform: capitalize;" class="card-text"><b style="cursor: pointer" onclick="window.location.href='{{route('details.full',['category'=>$pst->catslug,'id'=>$post->id,'slug'=>$post->slug])}}'" >{{$post->title}}</b></p>
                                                                                            <p style="margin-top: -8px !important;color: darkslategray;"> <i class="fa fa-clock-o"></i> {{date('F j Y',strtotime($post->created_at))}}</p>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        @if ($loop->last)

                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        @endif


                                                    @endif
                                                @endforeach



                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- .navbar-collapse -->
                </div>
                <!-- .container -->
            </nav>
            <!-- .nav -->

        </div>

        <!-- .navigation-section -->
    </div>
    <!-- .container -->

    <!-- Mobile Scroll Horizontal Menu -->
    <style>
        @media only screen and (min-width: 992px) {
            #mobileHorizontal{
                display: none;
            }
        }
        @media only screen and (min-width: 768px) {
            #mobileHorizontal{
                display: none;
            }
        }
        @media only screen and (min-width: 1200px) {
            #mobileHorizontal{
                display: none;
            }
        }
    </style>
    <div id="mobileHorizontal" class="horizontal-menu  container">
        <style>
            div.scrollmenu {
                background-color: #333;
                overflow: auto;
                white-space: nowrap;
            }

            .horiA {
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px;
                text-decoration: none;
            }
            .horiAactive{
            background: cadetblue;
            padding: 14px;
            }


        </style>
        <div class="scrollmenu">
            <a style="cursor: none" class="horiA" ><i class="fa fa-arrow-left"></i></a>
            <a  class=" horiA {{request()->is('/') ? 'horiAactive' : '' }}" href="{{route('front.home')}}">Home</a>

            @foreach ($menucat as $key => $pst)
                <a class="horiA {{request()->is('listing/'.$pst->catslug) ? 'horiAactive' : '' }} {{request()->is('details/'.$pst->catslug.'*') ? 'horiAactive' : '' }} " href="{{route('catpost.list',['catslug'=>$pst->catslug])}}"> {{$pst->catname}}</a>
            @endforeach
            <a style="cursor: none" class="horiA" ><i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
</section>
