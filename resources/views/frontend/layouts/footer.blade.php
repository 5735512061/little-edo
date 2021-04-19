<style>
.scroll-top-wrapper {
    position: fixed;
    opacity: 0;
    visibility: hidden;
	overflow: hidden;
	text-align: center;
	z-index: 99999999;
    background-color: #777777;
	color: #eeeeee;
	width: 50px;
	height: 48px;
	line-height: 48px;
	right: 30px;
	bottom: 30px;
	padding-top: 2px;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
	border-bottom-left-radius: 10px;
	-webkit-transition: all 0.5s ease-in-out;
	-moz-transition: all 0.5s ease-in-out;
	-ms-transition: all 0.5s ease-in-out;
	-o-transition: all 0.5s ease-in-out;
	transition: all 0.5s ease-in-out;
}
.scroll-top-wrapper:hover {
	background-color: #888888;
}
.scroll-top-wrapper.show {
    visibility:visible;
    cursor:pointer;
	opacity: 1.0;
}
.scroll-top-wrapper i.fa {
	line-height: inherit;
}
</style>
<hr>
<footer class="footer_area">
    <div class="footer_widget_area">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <aside class="f_widget contact_widget">
                        <div class="f_w_title">
                            <h4>CONTACT US</h4>
                        </div>
                        <ul>
                            <li><a href="tel:+66634942044"><i class="fa fa-phone"></i> 063 494 2044</a></li>
                            <li><a href="https://www.facebook.com/edophuket"><i class="fa fa-facebook"></i> Little Edo 少し江戸</a></li>
                            <li><a href="https://instagram.com/little_edo_th?igshid=k5ik9k8wpasm"><i class="fa fa-instagram"></i> little_edo_th</a></li><br>
                        </ul>
                    </aside>
                </div>
                <div class="col-md-5">
                    <aside class="f_widget contact_widget">
                        <div class="f_w_title">
                            <h4>LOCATION</h4>
                        </div>
                        <ul>
                            <li><a href="##"><i class="fa fa-map-marker"></i> ลิตเติ้ลเอโดะตั้งอยู่ตรงข้าม ตลาดเจ้าฟ้าวาไรตี้</a></li>
                            <li><a href="https://goo.gl/maps/xrXGYLGc18yepk2i8"><i class="fa fa-location-arrow"></i>เปิดแผนที่ร้าน</a></li><br>
                        </ul>
                    </aside>
                </div>
                <div class="col-md-2">
                    <aside class="f_widget contact_widget">
                        <div class="f_w_title">
                            <h4>Little Edo</h4>
                        </div>
                        <ul style="padding-left: 0px !important;">
                            <li><a href="{{url('/')}}">HOME</a></li>
                            <li><a href="{{url('/little-edo/menu')}}">MENU</a></li>
                            <li><a href="{{url('/little-edo/gallery')}}">GALLERY</a></li>
                            {{-- <li><a href="{{url('/little-edo/reserve-seat')}}">BOOK A TABLE</a></li> --}}
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="copy_right_area">
        <div class="container">
            <div class="pull-left">
                <h5><p>Copyright &copy;<script>document.write(new Date().getFullYear());</script><a href="#" target="_blank"> Colorlib</a></p></h5>
            </div>
        </div>
    </div> --}}
</footer>

<div class="scroll-top-wrapper ">
    <span class="scroll-top-inner">
      <i class="fa fa-2x fa-arrow-circle-up"></i>
    </span>
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(){

    $(function(){
    
        $(document).on( 'scroll', function(){
    
            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });
    
        $('.scroll-top-wrapper').on('click', scrollToTop);
    });
    
    function scrollToTop() {
        verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = offset.top;
        $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
    }

});

</script>