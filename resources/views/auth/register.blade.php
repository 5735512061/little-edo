@extends("/backend/layouts/admin/template/template-login")

@section("content")
ิ
    <!--================Admin Login=================-->
    <section class="booking_table_area bg-login">
        <div class="container top_content">
            <div class="s_white_title">
                <h3>ลงทะเบียนผู้ดูแลระบบ</h3>
            </div>
            <form method="POST" action="{{ route('register') }}">@csrf
                <div class="form-group row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-4 col-4">
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="font-family:kanit;" name="admin_name" value="{{ old('name') }}" placeholder="ชื่อเข้าใช้งาน" required autofocus>
                    </div>
                    <div class="col-md-4 col-4"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-4 col-4">
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" style="font-family:kanit;" placeholder="รหัสผ่าน" name="password" required>
                    </div>
                    <div class="col-md-4 col-4"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-4 col-4">
                        <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" style="font-family:kanit;" placeholder="ยืนยันรหัสผ่าน" name="password_confirmation" required>
                    </div>
                    <div class="col-md-4 col-4"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-4 col-4">
                        <button type="submit" class="btn btn-default submit_btn" style="font-family: 'kanit";>
                            {{ __('ลงทะเบียนผู้ดูแลระบบ') }}
                        </button>
                    </div>
                    <div class="col-md-4 col-4"></div>
                </div>
            </form>
        </div>
    </section>
    <!--================End Admin Login=================-->
@endsection