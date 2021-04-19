<!--================Slider Area =================-->
{{-- <section class="slider_area"> --}}
    {{-- <div class=slider_inner> --}}
        {{-- <div class="rev_slider fullwidthabanner"  data-version="5.3.0.2" id="home-slider"> --}}
        {{-- <div class="fullwidthabanner"  data-version="5.3.0.2" id="home-slider"> --}}
            {{-- <ul>  --}}
                @foreach ($slide_main_images as $slide_main_images => $value)
                    {{-- <li data-slotamount="7" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="600" data-rotate="0" data-saveperformance="off"> --}}
                        {{-- <div class="col-md-12"> --}}
                            <img src="{{url('/img_upload/img_website')}}/{{$value->image}}" width="100%;" style="margin-top: 100px;">
                        {{-- </div> --}}
                        
                    {{-- </li> --}}
                @endforeach
            {{-- </ul>  --}}
        {{-- </div><!-- END REVOLUTION SLIDER --> --}}
    {{-- </div> --}}
{{-- </section> --}}
<!--================End Slider Area =================-->