@extends("/frontend/layouts/template/template")
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<style>
@media only screen and (max-width: 768px) {
    #mobile {
      width: 100% !important;
    }
}
</style>
@section("content")
    <!--================Banner Area =================-->
    <section class="banner_area_menu banner_area">
        <div class="container">
            <div class="banner_content">
                <h4>MENU</h4>
                <a href="{{url('/')}}">HOME</a>
                <a class="active" href="#">MENU</a>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->
    <section class="most_popular_item_area menu_list_page">
        <div class="container">
            <div class="popular_filter">
                <ul>
                    <li class="active" data-filter="*"><a href="">All MENU</a></li>
                    <li data-filter=".SHABUYAKINIKU"><a href="">SHABU & YAKINIKU</a></li>
                    <li data-filter=".SUSHISASHIMI"><a href="">SUSHI & SASHIMI</a></li>
                    <li data-filter=".SPECIALMENU"><a href="">SPECIAL MENU</a></li>
                    <li data-filter=".APPITIZER"><a href="">APPITIZER</a></li>
                    <li data-filter=".YUMSALAD"><a href="">YUM & SALAD</a></li>
                    <li data-filter=".DONS"><a href="">RICE & DONS</a></li>
                    <li data-filter=".DRINKSDESSERT"><a href="">DRINKS & DESSERT</a></li>
                </ul>
            </div>
            <div class="p_recype_item_main">
                <div class="row p_recype_item_active">
                    @foreach ($menus as $menu => $value)
                        <div class="col-md-3 col-sm-6 {{$value->group}}">
                            <div class="feature_item">
                                <div class="gallery" id="single-images"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
                                    <a href="{{url('/img_upload/menu/')}}/{{$value->image}}" class="singleImage2"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
                                        <div class="feature_item_inner">
                                            <img id="mobile" src="{{url('/img_upload/menu/')}}/{{$value->image}}" style="width:230px; height:150px;">
                                        </div>
                                    </a>
                                    <div class="title_text">
                                        <div class="feature_left"><span>{{$value->engName}}</span></div>
                                        <div class="feature_left"><span>{{$value->japName}}</span></div><br>
                                        <div class="feature_left"><span>{{$value->thaiName}}</span></div>
                                        <div class="restaurant_feature_dots"></div>
                                        <div class="feature_right">{{$value->price}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--================End Our feature Area =================-->
@endsection