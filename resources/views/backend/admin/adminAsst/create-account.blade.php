@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<!--================Booking Table Area =================-->
<section class="booking_table_area" style="height: 100%;">
    <div class="container">
        <div class="s_white_title top_content">
            <h3>สร้างบัญชีผู้ใช้ใหม่</h3>
        </div>
        <form action="{{url('/admin/create-adminAsst')}}" enctype="multipart/form-data" method="post">@csrf
            <div class="row" style="margin-bottom:80px;">
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="adminAsst_name" placeholder="ชื่อผู้ใช้">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="password" name="password" placeholder="รหัสผ่าน">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="role" placeholder="บทบาท">
                    </div>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-default submit_btn">สร้างบัญชีผู้ใช้ใหม่</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection