@extends("/frontend/layouts/template/template")

@section("content")
    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_content">
                <h4>Contact Us</h4>
                <a href="{{url('/')}}">HOME</a>
                <a class="active" href="#">CONTACT US</a>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact_details">
                        <h3 class="contact_title">Contact Info</h3>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4>Phone</h4>
                                <a href="tel:+66634942044"><h5>063 494 2044</h5></a>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <div class="media-body">
                                <h4>Facebook</h4>
                                <a href="https://www.facebook.com/edophuket"><h5>Little Edo 少し江戸</h5></a>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <div class="media-body">
                                <h4>INSTAGRAM</h4>
                                <a href="https://instagram.com/little_edo_th?igshid=k5ik9k8wpasm"><h5>little_edo_th</h5></a>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="media-body">
                                <h4>ADDRESS</h4>
                                <h5>ลิตเติ้ลเอโดะตั้งอยู่ตรงข้าม ตลาดเจ้าฟ้าวาไรตี้</h5>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row contact_form_area">
                        <h3 class="contact_title">Send Message</h3>
                        <form action="{{url('/little-edo/contact-us')}}" enctype="multipart/form-data" method="post">@csrf
                            <div class="form-group col-md-12">
                              <input type="text" class="phone_format form-control" name="tel" placeholder="เบอร์โทรศัพท์">
                            </div>
                             <div class="form-group col-md-12">
                              <input type="text" class="form-control" name="subject" placeholder="หัวข้อเรื่อง">
                            </div>
                            <div class="form-group col-md-12">
                              <textarea class="form-control" name="message" placeholder="ข้อความที่ต้องการส่ง"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button class="btn btn-default submit_btn" type="submit">Send Message</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Contact Area =================-->
   <a href="https://goo.gl/maps/xrXGYLGc18yepk2i8"><img src="{{ asset('/images/map.png')}}" class="img-responsive" width="100%;"></a>
   <script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script>

   <script>
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
   </script>
@endsection