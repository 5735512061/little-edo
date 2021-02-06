@extends("/frontend/layouts/template/template")

@section("content")
<!--================Slider Area =================-->
<section class="slider_area">
    <div class=slider_inner>
        <div class="rev_slider fullwidthabanner"  data-version="5.3.0.2" id="home-slider">
            <ul> 
                <li data-slotamount="7" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="600" data-rotate="0" data-saveperformance="off" class="tp-rightarrow:none;">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('/images/slide/slide_01.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" data-no-retina>
                    <!-- LAYERS -->
                    <!-- LAYER NR. 1 -->
                    <div class="slider_text_box">
                       <div class="tp-caption bg_box" 
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-x="center" 
                            data-y="['350','350','300','250','0']"
                            data-fontsize="['55']" 
                            data-lineheight="['60']" 
                            data-transform_idle="o:1;"
                            data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:0px;" 
                            data-mask_out="x:inherit;y:inherit;" 
                            data-start="2000" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on">
                        </div>
                        <div class="tp-caption first_text" 
                            data-x="center" 
                            data-y="center" 
                            data-voffset="['-20']"
                            data-Hoffset="['0']"
                            data-fontsize="['42','42','42','42','25']"
                            data-lineheight="['52','52','52','52','35']"
                            data-width="none"
                            data-height="none"
                            data-transform_idle="o:1;"
                            data-whitespace="nowrap"
                            data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1000" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            data-elementdelay="0.05" >รับจองโต๊ะ คุณ{{$reserve->name}}
                        </div>
                        <div class="tp-caption first_text" 
                            data-x="center" 
                            data-y="center" 
                            data-voffset="['45']"
                            data-Hoffset="['0']"
                            data-fontsize="['25']"
                            data-lineheight="['42']"
                            data-width="none"
                            data-height="none"
                            data-transform_idle="o:1;"
                            data-whitespace="nowrap"
                            data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1000" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            data-elementdelay="0.05" >วันที่ {{$reserve->date}} เวลา {{$reserve->time}} น.
                        </div>
                        <div class="tp-caption third_text" 
                            data-x="center" 
                            data-y="center" 
                            data-voffset="['100']"
                            data-Hoffset="['0']"
                            data-fontsize="['16','16','16','16','16']"
                            data-lineheight="['26','26','26','26','26']"
                            data-width="none"
                            data-height="none"
                            data-transform_idle="o:1;"
                            data-whitespace="nowrap"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1200" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            data-elementdelay="0.05" >จำนวนที่จอง {{$reserve->quantity}} ท่าน
                        </div>
                        <div class="tp-caption third_text" 
                            data-x="center" 
                            data-y="center" 
                            data-voffset="['100']"
                            data-Hoffset="['0']"
                            data-fontsize="['14','14','14','14','14']"
                            data-lineheight="['20','20','20','20','20']"
                            data-width="none"
                            data-height="none"
                            data-transform_idle="o:1;"
                            data-whitespace="nowrap"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1200" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on" 
                            data-elementdelay="0.05" style="margin-top: 10rem;">** กรุณาบันทึกภาพหน้าจอ แสดงต่อพนักงานที่ร้าน Little Edo ค่ะ
                        </div>
                    </div>
                </li>
            </ul> 
        </div><!-- END REVOLUTION SLIDER -->
    </div>
</section>
<!--================End Slider Area =================-->
@endsection