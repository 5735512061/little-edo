@extends("/frontend/layouts/template/template")

@section("content")
    <!--================Banner Area =================-->
    <section class="banner_area_gallery banner_area">
        <div class="container">
            <div class="banner_content">
                <h4>Gallery</h4>
                <a href="{{url('/')}}">HOME</a>
                <a class="active" href="#">GALLERY</a>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Our Gallery Area =================-->
    <div class="container"><br>
        <div class="row">
            @foreach ($gallery_menu_images as $gallery_menu_image => $value)
                <div class="col-md-3 col-sm-6" style="margin-bottom: 10px;">
                    <img src="{{url('/img_upload/img_website')}}/{{$value->image}}" class="img-responsive">
                </div>
            @endforeach
        </div>
    </div>
    
    <section class="our_gallery_area">
        <div class="container">
            <div class="row our_gallery_ms_inner">
                @foreach ($gallery_images as $gallery_image => $value)
                    <div class="col-md-4 col-sm-6">
                        <div class="our_gallery_item">
                            <img src="{{url('/img_upload/img_website')}}/{{$value->image}}" alt="">
                            <div class="our_gallery_hover">
                                <p>{{$value->heading}}</p>
                                <p>{{$value->detail}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================End Our Gallery Area =================-->
@endsection