@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<!--================Booking Table Area =================-->
<section class="booking_table_area">
    <div class="container">
        <div class="s_white_title top_content">
            <h3>จัดการรูปภาพบนเว็บไซต์</h3>
        </div>
        <form action="{{url('/admin/edit-image')}}" enctype="multipart/form-data" method="post">@csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="party_size">
                        <select class="selectpicker" name="type">
                            <option style="font-family: 'kanit' !important;" value="{{$image->type}}">{{$image->type}}</option>
                            <option style="font-family: 'kanit' !important;" value="slide_main_image">รูปสไลด์หลัก</option>
                            <option style="font-family: 'kanit' !important;" value="slide_menu_image">รูปสไลด์เมนู</option>
                            <option style="font-family: 'kanit' !important;" value="menu_image">รูปเมนู</option>
                            <option style="font-family: 'kanit' !important;" value="slide_special_image">รูปสไลด์เมนูพิเศษ</option>
                            <option style="font-family: 'kanit' !important;" value="gallery_image">รูปแกลอรี่</option>
                            <option style="font-family: 'kanit' !important;" value="gallery_menu_image">รูปแกลอรี่เมนู</option>
                            <option style="font-family: 'kanit' !important;" value="special_menu">เมนูพิเศษ</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <label for="imageUpload" class="btn btn-default btn-block btn-outlined" style="font-family: 'kanit">อัพโหลดรูปภาพ</label>
                        <input type="file" id="imageUpload" accept="image/*" style="display: none" name="image">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="heading" placeholder="หัวข้อคำอธิบาย (ถ้ามี)" value="{{$image->heading}}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="detail" placeholder="รายละเอียดเพิ่มเติม (ถ้ามี)" value="{{$image->detail}}">
                    </div>
                </div>
                <div class="col-sm-3" style="margin-top: 20px;">
                    <input type="hidden" value="{{$image->id}}" name="id">
                    <button type="submit" class="btn btn-default submit_btn">อัพโหลดรูปภาพ</button>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================Recent Blog Area =================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('#imageUpload').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#imageUpload')[0].files[0].name;
        $(this).prev('label').text(file);
    });
    $('#flagUpload').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#flagUpload')[0].files[0].name;
        $(this).prev('label').text(file);
    });
</script>
@endsection