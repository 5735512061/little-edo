@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<!--================Booking Table Area =================-->
<section class="booking_table_area">
    <div class="container">
        <div class="s_white_title top_content">
            <h3>จัดการรูปภาพบนเว็บไซต์</h3>
        </div>
        <form action="{{url('/admin/upload-image')}}" enctype="multipart/form-data" method="post">@csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="party_size">
                        <select class="selectpicker" name="type">
                            <option style="font-family: 'kanit' !important;">ประเภทรูปภาพ</option>
                            <option style="font-family: 'kanit' !important;" value="slide_main_image">รูปสไลด์หลัก</option>
                            <option style="font-family: 'kanit' !important;" value="slide_menu_image">รูปสไลด์เมนู</option>
                            <option style="font-family: 'kanit' !important;" value="menu_image">รูปเมนู</option>
                            <option style="font-family: 'kanit' !important;" value="slide_special_image">รูปสไลด์เมนูพิเศษ</option>
                            <option style="font-family: 'kanit' !important;" value="gallery_image">รูปแกลอรี่</option>
                            <option style="font-family: 'kanit' !important;" value="gallery_menu_image">รูปแกลอรี่เมนู</option>
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
                        <input type="text" name="heading" placeholder="หัวข้อคำอธิบาย (ถ้ามี)">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="detail" placeholder="รายละเอียดเพิ่มเติม (ถ้ามี)">
                    </div>
                </div>
                <div class="col-sm-3" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-default submit_btn">อัพโหลดรูปภาพ</button>
                </div>
            </div>
        </form>
        <div class="col-md-12 col-12 col-sm-12" style="margin-bottom: 5rem;">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>รูปภาพ</th>
                                    <th>ประเภทรูปภาพ</th>
                                    <th>หัวข้อคำอธิบาย</th>
                                    <th>รายละเอียด</th>
                                    <th></th>
                                </tr>
                                @foreach ($images as $image => $value)
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $image+1}}</td>
                                    <td><img src="{{url('/img_upload/img_website')}}/{{$value->image}}" class="img-responsive" width="50px;" height="50px;"></td>
                                    <td>{{$value->type}}</td>
                                    <td>{{$value->heading}}</td>
                                    <td>{{$value->detail}}</td>
                                    <td>       
                                        <a href="{{url('/admin/edit-image')}}/{{$value->id}}">
                                            <i class="fa fa-pencil-square-o" style="color:blue;"></i>
                                        </a>        
                                        <a href="{{url('/admin/delete-image/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                            <i class="fa fa-trash" style="color:red;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{$images->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
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