@extends("/frontend/layouts/template/template")

@section("content")
    
    @include("/frontend/layouts/slide")

    <!--================Our Chefs Area =================-->
    {{-- <section class="our_chefs_area">
        <div class="container">
            <div class="chefs_slider_active">
                @foreach ($slide_menu_images as $slide_menu_image => $value)
                    <div class="item">
                        <div class="chef_item_inner">
                            <div class="chef_img">
                                <img src="{{url('/img_upload/img_website')}}/{{$value->image}}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!--================End Our Chefs Area =================-->
        
    <!--================Booking Table Area =================-->
    {{-- <section class="booking_table_area">
        <div class="container">
            <div class="s_white_title">
                <h3>สำรองที่นั่ง</h3>
                <p>*เพื่อความสะดวกและไม่เสียเวลาของคุณลูกค้า ทางร้านแนะนำให้สำรองที่นั่งล่วงหน้าจะดีที่สุดครับ</p>
            </div>
            <form action="{{url('/little-edo/reserve-seat')}}" enctype="multipart/form-data" method="post">@csrf
                <div class="row" style="margin-bottom:80px;">
                    <div class="col-sm-3">
                        <div class="input-append">
                            <input type="text" name="name" placeholder="ชื่อคุณลูกค้า">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-append">
                            <input class="phone_format" type="text" name="tel" placeholder="เบอร์โทรติดต่อ">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-append">
                            <input class="input--style-1 js-datepicker" size="16" type="text" name="date" placeholder="วันที่">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                    </div>
                    <div class="col-sm-3 ui">
                        <div class="input-append ui calendar" id="time" >
                            <input class="input--style-1 calendar" type="text" name="time" placeholder="เวลา">
                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-top: 20px;">
                        <div class="input-append">
                            <input type="text" name="quantity" placeholder="จำนวนคน">
                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-top: 20px;">
                        <div class="input-append">
                            <input type="text" name="comment" placeholder="หมายเหตุ (ถ้ามี)">
                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-default submit_btn">สำรองที่นั่ง</button>
                    </div>
                </div>
            </form>
        </div>
    </section> --}}
    <!--================Recent Blog Area =================-->
    {{-- <section class="recent_bloger_area">
        <div class="container">
            <div class="row">
                @foreach ($menu_images as $menu_images => $value)
                    <div class="col-md-4">
                        <div class="recent_blog_item">
                            <div class="blog_img">
                                <img src="{{url('/img_upload/img_website')}}/{{$value->image}}" alt="">
                            </div>
                            <div class="recent_blog_text">
                                <div class="recent_blog_text_inner">
                                    <h5>{{$value->heading}}</h5>
                                    <p>{{$value->detail}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!--================End Recent Blog Area =================-->
    <!--================End Our Chefs Area =================-->
    {{-- <section class="next_event_area">
        <div class="container">
            <div class="next_event_slider">
                @foreach ($slide_special_images as $slide_special_image => $value)
                    <div class="item">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="left_event_img">
                                    <img src="{{url('/img_upload/img_website')}}/{{$value->image}}" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="right_event_text">
                                    <h3>{{$value->heading}}</h3>
                                    <p>{{$value->detail}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!--================End Our Chefs Area =================-->

    <!-- Jquery JS-->
    {{-- <script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script> --}}
    <!-- Vendor JS-->
    {{-- <script type="text/javascript" src="{{asset('vendor/select2/select2.min.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{asset('vendor/datepicker/moment.min.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script> --}}
    <!-- Main JS-->
    {{-- <script type="text/javascript" src="{{asset('js/global.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-2.1.4.js"></script> --}}
    {{-- <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script> --}}
    
    {{-- <script>

        var minDate = new Date();
        var maxDate = new Date();
        minDate.setHours(11);
        maxDate.setHours(21);
        minDate.setMinutes(30);
        maxDate.setMinutes(00);

        $('#time').calendar({
            type: 'time',
            ampm: false,
            minDate: minDate,
            maxDate: maxDate
        });

        // number phone
        function phoneFormatter() {
            $('input.phone_format').on('input', function() {
                var number = $(this).val().replace(/[^\d]/g, '')
                    if (number.length >= 5 && number.length < 10) { number = number.replace(/(\d{3})(\d{2})/, "$1-$2"); } else if (number.length >= 10) {
                        number = number.replace(/(\d{3})(\d{3})(\d{3})/, "$1-$2-$3"); 
                    }
                $(this).val(number)
                $('input.phone_format').attr({ maxLength : 12 });    
            });
        };
        $(phoneFormatter);

    </script> --}}

@endsection