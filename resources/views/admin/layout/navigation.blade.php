<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('public/systemimage')}}/{{$systemData['backLogo']}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{route('home')}}"><img src="{{asset('public/admin/images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li style="border-radius: 10px;"  class=" {{ request()->is('back') ? 'active bg-primary' : '' }}">
                    <a class="pl-3" href="{{route('home')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                @hasrole(['admin'])
                <li style="border-radius: 10px;"  class=" {{ request()->is('admin/user*') ? 'active bg-primary' : '' }}">
                    <a  class="pl-3" href="{{route('admin.user.index')}}"> <i class="menu-icon fa fa-paint-brush"></i>User </a>
                </li>
                <li style="border-radius: 10px;" class="{{ request()->is('admin/categories*') ? 'active bg-primary' : '' }} ">
                    <a class="pl-3" href="{{route('admin.categories.index')}}"> <i class="menu-icon fa fa-cc-amex"></i>Category</a>
                </li>
                <li style="border-radius: 10px;" class="{{ request()->is('admin/system*') ? 'active bg-primary' : '' }} ">
                    <a class="pl-3" href="{{route('admin.system.index')}}"> <i class="menu-icon fa fa-warning"></i>Setting</a>
                </li>
                <li style="border-radius: 10px;" class="{{ request()->is('admin/style*') ? 'active bg-primary' : '' }} ">
                    <a class="pl-3" href="{{route('admin.style.index')}}"> <i class="menu-icon fa fa-sellsy"></i>Style</a>
                </li>
                <li style="border-radius: 10px;" class="{{ request()->is('admin/menu*') ? 'active bg-primary' : '' }} ">
                    <a class="pl-3" href="{{route('admin.menu.index')}}"> <i class="menu-icon fa fa-medium"></i>Menu</a>
                </li>
                @endhasrole

                @hasrole(['author','admin'])
                <li style="border-radius: 10px;" class="{{ request()->is('author/tag*') ? 'active bg-primary' : '' }}">
                    <a class="pl-3" href="{{route('author.tag.index')}}"> <i class="menu-icon fa fa-tags"></i>Tag</a>
                </li>
                <li style="border-radius: 10px;" class="{{ request()->is('author/post*') ? 'active bg-primary' : '' }}">
                    <a class="pl-3" href="{{route('author.post.index')}}"> <i class="menu-icon fa fa-dashcube"></i>Post</a>
                </li>
                <li>
                  <!--  <a href=""> <i class="menu-icon fa fa-user-o"></i>Author </a> -->
                </li>
                @endhasrole
                @hasrole(['user','admin'])
                <li>
                 <!--   <a href="{{route('user.user.test')}}"> <i class="menu-icon fa fa-user-o"></i>Test User </a> -->
                </li>
                @endhasrole

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
