@extends("/frontend/layouts/template/template")
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
@section("content")
    <!--================Banner Area =================-->
    <section class="banner_area_menu banner_area">
        <div class="container">
            <div class="banner_content">
                <h4>SPECIAL MENU</h4>
                <a href="{{url('/')}}">HOME</a>
                <a class="active" href="#">SPECIAL MENU</a>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->
    @include("/frontend/layouts/navbar")
    <h3 style="font-family: 'Kanit'; text-align:center;">สุขมื้อพิเศษ ฟินจัดเต็ม<br>“เมนูพิเศษ ที่เปลี่ยนไปในแต่ละวัน”</h3>
    <div class="container"><br>
        <div class="row">
            @foreach ($special_menus as $special_menu => $value)
                <div class="col-md-4 col-xs-6" style="margin-bottom: 10px;">
                    <div class="gallery" id="single-images" style=" border:2px solid rgb(179 179 179 / 32%);"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
                        <a href="{{url('/img_upload/img_website')}}/{{$value->image}}" class="singleImage2"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
                            <img src="{{url('/img_upload/img_website')}}/{{$value->image}}" class="img-responsive" style="width:180px !important; height:140px !important;">
                        </a>
                        <h4 style="font-family: 'Kanit'; text-align:center;">{{$value->heading}}</h4>
                        <h4 style="font-family: 'Kanit'; text-align:center;">{{$value->detail}}</h4><br>
                        @if($value->heading == 'omakase box ราคา 1,990 บาท')
                            <h4 style="font-family: 'Kanit'; text-align:center; color:red;">* วัตถุดิบอาจมีการปรับเปลี่ยนขึ้นอยู่กับเซฟ</h4><br>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--================End Our Gallery Area =================-->
@endsection