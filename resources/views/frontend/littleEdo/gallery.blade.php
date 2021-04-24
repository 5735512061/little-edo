@extends("/frontend/layouts/template/template")
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<style>
    @media only screen and (max-width: 768px) {
        #mobile {
            display: inline !important;
        }
        #desktop {
            display: none;
        }
    }
</style>
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
    @include("/frontend/layouts/navbar")

    <!--================Our Gallery Area =================-->
    {{-- <div class="container"><br>
        <div class="row">
            @foreach ($gallery_menu_images as $gallery_menu_image => $value)
                <div class="col-md-3 col-sm-6" style="margin-bottom: 10px;">
                    <div class="gallery" id="single-images"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
                        <a href="{{url('/img_upload/img_website')}}/{{$value->image}}" class="singleImage2"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
                            <img src="{{url('/img_upload/img_website')}}/{{$value->image}}" class="img-responsive" style="width:100% !important;">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

    <section class="our_gallery_area" id="desktop">
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

    <section class="our_gallery_area" id="mobile" style="display: none;">
        <div class="container">
            <div class="row">
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