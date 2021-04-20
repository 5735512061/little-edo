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
                    <li><a href="{{url('/admin/list-menu')}}">จัดการเมนูอาหาร</a></li>
                    <li><a href="{{url('/admin/list-adminAsst')}}">จัดการบัญชีผู้ใช้</a></li>
                    <li><a href="{{url('/admin/manage-image')}}">จัดการรูปภาพเว็บไซต์</a></li>
                    <li><a href="{{url('/admin/manage-table')}}">จัดการโต๊ะอาหาร</a></li>
                    <li><a href="{{url('/admin/customer-privilege')}}">รับสิทธิพิเศษ</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ออกจากระบบ</a></li>
                    <form id="logout-form" action="{{ 'App\User' == Auth::getProvider()->getModel() ? route('logout') : route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<!--================End Footer Area =================-->