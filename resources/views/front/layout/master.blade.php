<!DOCTYPE html>
<html>
<head>
    @include('front.layout.top')

</head>

<body  id="page-top" data-spy="scroll" data-target=".navbar">

<!-- Preloader  -->

<!-- -->

<div id="main-wrapper">
    <!-- Page Preloader -->
    @yield('preloader')
    <!-- preloader -->

    <div class="uc-mobile-menu-pusher">
        <div class="content-wrapper">
            <!-- header_section_wrapper -->
             @include('front.layout.header')
            <!-- header_section_wrapper -->

            <!-- body_section -->
           @yield('content')
            <!-- body_section_-->

            <!-- Subscriber Section -->
            @include('front.layout.footer')
            <!-- Footer Section -->
        </div>
        <!-- #content-wrapper -->

    </div>
    <!-- .offcanvas-pusher -->

    <a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

    <div class="uc-mobile-menu uc-mobile-menu-effect">
        <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
                id="uc-mobile-menu-close-btn">&times;</button>
        <div>
            <div>
                <ul id="menu">
                    <li ><a class="{{request()->is('/') ? 'bg-info' : '' }}" href="{{route('front.home')}}">Home</a></li>
                    @foreach ($menucat as $key => $pst)
                        <li ><a class="{{request()->is('listing/'.$pst->catslug) ? 'bg-info' : '' }} {{request()->is('details/'.$pst->catslug.'*') ? 'bg-info' : '' }}" href="{{route('catpost.list',['catslug'=>$pst->catslug])}}"> {{$pst->catname}}</a></li>
                    @endforeach

                    <!--
                    <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">More
                            <span><i class="fa fa-angle-down"></i></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="m-menu-content">
                                    <ul class="col-sm-3">
                                        <li class="dropdown-header">Widget Haeder</li>
                                        <li><a href="#">Awesome Features</a></li>
                                        <li><a href="#">Clean Interface</a></li>
                                        <li><a href="#">Available Possibilities</a></li>
                                        <li><a href="#">Responsive Design</a></li>
                                        <li><a href="#">Pixel Perfect Graphics</a></li>
                                    </ul>
                                    <ul class="col-sm-3">
                                        <li class="dropdown-header">Widget Haeder</li>
                                        <li><a href="#">Awesome Features</a></li>
                                        <li><a href="#">Clean Interface</a></li>
                                        <li><a href="#">Available Possibilities</a></li>
                                        <li><a href="#">Responsive Design</a></li>
                                        <li><a href="#">Pixel Perfect Graphics</a></li>
                                    </ul>
                                    <ul class="col-sm-3">
                                        <li class="dropdown-header">Widget Haeder</li>
                                        <li><a href="#">Awesome Features</a></li>
                                        <li><a href="#">Clean Interface</a></li>
                                        <li><a href="#">Available Possibilities</a></li>
                                        <li><a href="#">Responsive Design</a></li>
                                        <li><a href="#">Pixel Perfect Graphics</a></li>
                                    </ul>
                                    <ul class="col-sm-3">
                                        <li class="dropdown-header">Widget Haeder</li>
                                        <li><a href="#">Awesome Features</a></li>
                                        <li><a href="#">Clean Interface</a></li>
                                        <li><a href="#">Available Possibilities</a></li>
                                        <li><a href="#">Responsive Design</a></li>
                                        <li><a href="#">Pixel Perfect Graphics</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    -->

                </ul>
            </div>
        </div>
    </div>
    <!-- .uc-mobile-menu -->

</div>
<!-- #main-wrapper -->

@include('front.layout.bottom')

</body>
</html>
