@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<section class="booking_table_area" style="height: 220%;">
    <div class="container">
        <div class="s_black_title" style="margin-top: 5rem; margin-bottom: 5rem;">
            <a href="{{url('#')}}"><h3>จัดการโต๊ะอาหารวันที่ {{$date}}</h3></a><br>
            <form action="{{url('/admin/search-reserveTableDate')}}" enctype="multipart/form-data" method="post">@csrf
                <div class="row">
                    <div class="col-sm-3">
                        <div class="input-append">
                            <input style="font-family: kanit !important;" class="form-control js-datepicker" size="16" type="text" name="date" placeholder="เลือกวันที่ที่ต้องการดู"><br>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-default submit_btn" style="height:34px;">ค้นหา</button>
                    </div>
                </div>
            </form>
        </div>
        <form action="{{url('/admin/create-booking')}}" enctype="multipart/form-data" method="post">@csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="party_size" style="font-family: 'kanit' !important;">
                        <select class="selectpicker" name="table_id">
                            @foreach ($selectTables as $selectTable => $value)
                                <option value="{{$value->id}}">โต๊ะที่ {{$value->number}}</option>
                            @endforeach
                        </select>
                    </div><br>
                </div>
                <div class="col-sm-3">
                    <div class="party_size">
                        <select class="selectpicker" name="status">
                            <option style="font-family: 'kanit' !important;" value="ไม่ว่าง">ไม่ว่าง</option>
                            <option style="font-family: 'kanit' !important;" value="ว่าง">ว่าง</option>
                        </select>
                    </div><br>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="seat" placeholder="จำนวนที่นั่ง">
                    </div><br>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input style="font-family: kanit !important;" class="form-control js-datepicker" size="16" type="text" name="date" value="{{$date}}"><br>
                    </div>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-default submit_btn" style="height:34px;">ลงรายการจองโต๊ะ</button>
                </div>
            </div>
        </form><br>
        <div class="row">
            @foreach ($tables as $table)
                @php
                    $number = DB::table('tables')->where('id',$table->table_id)->value('number');
                @endphp
                <div class="col-sm-3">
                    @if($table->status == 'ว่าง')
                        <a href="{{url('/admin/edit-booking')}}/{{$table->id}}" class="btn btn-default submit_btn_success">โต๊ะ {{$number}} จำนวน {{$table->seat}} ท่าน</a>
                    @else 
                        <a href="{{url('/admin/edit-booking')}}/{{$table->id}}" class="btn btn-default submit_btn2">โต๊ะ {{$number}} จำนวน {{$table->seat}} ท่าน</a>
                    @endif
                </div> 
            @endforeach
        </div>
    </div>
</section>
<!-- Jquery JS-->
<script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<!-- Vendor JS-->
<script type="text/javascript" src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script>
<!-- Main JS-->
<script type="text/javascript" src="{{asset('js/global.js')}}"></script>
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
@endsection