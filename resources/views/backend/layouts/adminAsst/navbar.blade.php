<!--================End Footer Area =================-->
<header class="main_menu_area">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <img src="{{ asset('/images/template/logo.png')}}" width="10%">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/adminAsst/list-menu')}}">จัดการเมนูอาหาร</a></li>
                    <li><a href="{{url('/adminAsst/contact')}}">ข้อมูลการติดต่อ</a></li>
                    <li><a href="{{ route('adminAsst.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ออกจากระบบ</a></li>
                    <form id="logout-form" action="{{ 'App\AdminAsst' == Auth::getProvider()->getModel() ? route('adminAsst.logout') : route('adminAsst.logout') }}" method="POST" style="display: none;">@csrf</form>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<!--================End Footer Area =================-->