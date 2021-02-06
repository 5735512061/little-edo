@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<!--================Booking Table Area =================-->
<section class="booking_table_area" style="height: 100%;">
    <div class="container">
        <div class="s_white_title top_content">
            <h3>จัดการโต๊ะอาหาร</h3>
        </div>
        <form action="{{url('/admin/edit-table')}}" enctype="multipart/form-data" method="post">@csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="number" placeholder="หมายเลขโต๊ะ" value="{{$table->number}}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="seat" placeholder="จำนวนที่นั่ง" value="{{$table->seat}}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <input type="hidden" value="{{$table->id}}" name="id">
                    <button type="submit" class="btn btn-default submit_btn">จัดการโต๊ะอาหาร</button>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================Recent Blog Area =================-->
@endsection