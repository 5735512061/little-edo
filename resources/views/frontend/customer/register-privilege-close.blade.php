@extends("/frontend/layouts/template/template")

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

@include("/frontend/layouts/navbar")
<section class="contact_area" style="margin-top: 4rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="row contact_form_area">
                    <center><img src="{{ asset('/images/template/logo-2.png')}}" alt="#" width="25%" style="margin-bottom:10px;">
                    <h4 class="contact_title" style="font-size: 26px; margin-bottom:-20px; font-weight: 900; color:red;">ปิด !! ลงทะเบียนรับฟรี<br> Wagyu Miyazaki A4</h4>
                    <h4 class="contact_title" style="font-size: 24px; margin-bottom:-20px; font-weight: 900; color:red;">ลงทะเบียนเต็ม 100 สิทธิ์แล้ว</h4></center>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
@endsection