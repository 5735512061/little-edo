@extends("/backend/layouts/admin/template/template-login")

@section("content")
ิ
    <!--================Admin Login=================-->
    <section class="booking_table_area bg-login">
        <div class="container top_content">
            <div class="s_white_title">
                <h3>เข้าสู่ระบบหลังบ้าน</h3>
            </div>
            <form method="POST" action="{{ route('adminAsst.login.submit') }}" autocomplete="off">@csrf
                <div class="form-group row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-4 col-4">
                        <input type="text" class="form-control{{ $errors->has('adminAsst_name') ? ' is-invalid' : '' }}" name="adminAsst_name" value="{{ old('adminAsst_name') }}" required autofocus placeholder="ชื่อเข้าใช้ระบบ" style="font-family: kanit;">
                        @if ($errors->has('adminAsst_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('adminAsst_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-4 col-4"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-4 col-4">
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="รหัสผ่าน" style="font-family: kanit;">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-4 col-4"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-4 col-4">
                        <button type="submit" class="btn btn-default submit_btn" style="font-family: 'kanit";>
                            {{ __('เข้าสู่ระบบหลังบ้าน') }}
                        </button>
                    </div>
                    <div class="col-md-4 col-4"></div>
                </div>
            </form>
        </div>
    </section>
    <!--================End Admin Login=================-->
@endsection