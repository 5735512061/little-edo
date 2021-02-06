@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<!--================Booking Table Area =================-->
<section class="booking_table_area" style="height: 100%;">
    <div class="container">
        <div class="s_white_title top_content">
            <h3>แก้ไขเมนูอาหาร</h3>
        </div>
        <form action="{{url('/admin/edit-menu')}}" enctype="multipart/form-data" method="post">@csrf
            <div class="row" style="margin-bottom:80px;">
                <div class="col-sm-3">
                    <div class="party_size">
                        <select class="selectpicker" name="group">
                            <option value="{{$menu->group}}">{{$menu->group}}</option>
                            <option style="font-family: 'kanit' !important;" value="SHABUYAKINIKU">SHABU & YAKINIKU</option>
                            <option style="font-family: 'kanit' !important;" value="SUSHISASHIMI">SUSHI & SASHIMI</option>
                            <option style="font-family: 'kanit' !important;" value="SPECIALMENU">SPECIAL MENU</option>
                            <option style="font-family: 'kanit' !important;" value="APPITIZER">APPITIZER</option>
                            <option style="font-family: 'kanit' !important;" value="DONS">DONS</option>
                            <option style="font-family: 'kanit' !important;" value="DRINKS">DRINKS</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="thaiName" placeholder="ชื่อเมนูภาษาไทย" value="{{$menu->thaiName}}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="engName" placeholder="ชื่อเมนูภาษาอังกฤษ" value="{{$menu->engName}}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="japName" placeholder="ชื่อเมนูภาษาญี่ปุ่น (ถ้ามี)" value="{{$menu->japName}}">
                    </div>
                </div>
                <div class="col-sm-3" style="margin-top: 20px;">
                    <div class="input-append">
                        <input type="text" name="price" placeholder="ราคา" value="{{$menu->price}}">
                    </div>
                </div>
                <div class="col-sm-3" style="margin-top: 20px;">
                    <div class="input-append">
                        <label for="imageUpload" class="btn btn-default btn-block btn-outlined" style="font-family: 'kanit">อัพโหลดรูปภาพอาหาร</label>
                        <input type="file" id="imageUpload" accept="image/*" style="display: none" name="image">
                    </div>
                </div>
                <div class="col-sm-3" style="margin-top: 20px;">
                    <div class="input-append">
                        <label for="flagUpload" class="btn btn-default btn-block btn-outlined" style="font-family: 'kanit">อัพโหลดรูปภาพธงชาติ (ถ้ามี)</label>
                        <input type="file" id="flagUpload" accept="image/*" style="display: none" name="flag">
                    </div>
                </div>
                <div class="col-sm-3" style="margin-top: 20px;">
                    <div class="input-append">
                        <input type="text" name="detail" placeholder="รายละเอียดเมนู (ถ้ามี)" value="{{$menu->detail}}">
                    </div>
                </div>
                <div class="col-sm-3" style="margin-top: 20px;">
                    <input type="hidden" name="admin_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="id" value="{{$menu->id}}">
                    <button type="submit" class="btn btn-default submit_btn">อัพเดตเมนูอาหาร</button>
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